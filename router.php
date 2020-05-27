<?php 

require "controller/userController.php";
require "model/user.php";
require "model/task.php";
require "controller/taskController.php";
//$_SESSION['user'] = "Admin";

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'register')
        {
            $username = htmlspecialchars($_GET['username']);
            $password = htmlspecialchars($_GET['password']);
            $registeredUser = new User($username,$password);
            $pass = userController::register($registeredUser->getUsername(),$registeredUser->getPassword());
            echo "User Created!";
            sleep(5);
            header("Location: index.php");
            //exit();
        }
    if ( $_GET['action'] == 'login')
        {
            $pass = userController::isLoginValid($_GET['username'],$_GET['password']);
            if ($pass) {
                header("Location: index.php");
            } else {
                echo "BAD USERNAME or PASSWORD";
            }
            

        }
    if ( $_GET['action'] == 'logout')
    {
        unset($_SESSION['user']);
        header("Location: index.php");
    }


    if ( $_GET['action'] == 'createTask') {
        $newTask = new Task($_GET['title'],$_GET['description'],0);
        taskController::saveTask($newTask->getTitle(),$newTask->getDescription());
        header("Location: index.php");
    }
    if ( $_GET['action'] == 'deleteTask') {
        echo $_GET['taskID'];
        taskController::deleteTask($_GET['taskID']);
        header("Location: index.php");
    }
    if ( $_GET['action'] == 'changeTask') {
        echo $_GET['taskID'];
        taskController::updateTask($_GET['taskID'],$_GET['title'],$_GET['description']);
        header("Location: index.php");
    }
    if ( $_GET['action'] == 'updateTaskStatus') {
        echo $_GET['taskID'];
        taskController::updateTaskStatus($_GET['taskID'],$_GET['taskStatus']);
        header("Location: index.php");
        
        
    }
    
    if ( $_GET['action'] == 'exportTasks') {
       // echo $_SESSION['userID'];
        $arrayOfTasks = taskController::showTasks($_SESSION['userID']);
       // echo print_r($arrayOfTasks);
        $myJSON = json_encode($arrayOfTasks);
        echo $myJSON;

        $handle = fopen("tasks.JSON", "w");
    fwrite($handle,$myJSON);
    fclose($handle);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename('tasks.JSON'));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('tasks.JSON'));
    readfile('tasks.JSON');
    //exit;
    }
    
}



?>