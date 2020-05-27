<?php 
//require "database/executioner.php";
class taskController {

    public static  function saveTask ($title, $description) {
        echo $title;
        echo $description;
        //XSS prevention;
        $title = htmlspecialchars($title);
        $description = htmlspecialchars($description);
        $executioner = new Executioner($description);
        $taskStatus = 0;
        $stmt = $executioner->establishConnection();
        $stmt = $stmt->prepare('INSERT INTO task (user_id, state, title, description) VALUES (?,?,?,?)');

        $stmt->bind_param("iiss",$_SESSION['userID'],$taskStatus, $title, $description);
        $return = $stmt->execute();
        $stmt->close();
        echo $return;
    }
    public static function showTasks ($userID) {
        $executioner = new Executioner();
        $stmt = $executioner->establishConnection();
        $stmt = $stmt->prepare('SELECT id, user_id, state, title, description from TASK where user_id =?');
        $stmt->bind_param('i', $userID);
        //echo $stmt->error;
        $return = $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $user = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        //print_r($user);
        return $user;
    }
    public static function deleteTask ($taskID) {
        $executioner = new Executioner();
        //$taskStatus = 0;
        $stmt = $executioner->establishConnection();
        $stmt = $stmt->prepare('DELETE FROM task where id = ? and user_id = ?');

        $stmt->bind_param("ii",$taskID,$_SESSION['userID']);
        $return = $stmt->execute();
        $stmt->close();
        echo $return;
    }
    public static function updateTask ($taskID, $title, $description) {
        $title = htmlspecialchars($title);
        $description = htmlspecialchars($description);
        $executioner = new Executioner();
        $taskStatus = 0;
        $stmt = $executioner->establishConnection();
        $stmt = $stmt->prepare('UPDATE task SET title = ? , description = ? WHERE id = ? and user_id = ?');

        $stmt->bind_param("ssii", $title, $description,$taskID,$_SESSION['userID']);
        $return = $stmt->execute();
        $stmt->close();
        echo $return;
    }
    public static function updateTaskStatus ($taskID,$taskStatus) {
        $executioner = new Executioner();
        // (Condition) ? (Statement1) : (Statement2);
        ($taskStatus == 0) ? ($taskStatus = 1) : ($taskStatus = 0);
        $stmt = $executioner->establishConnection();
        $stmt = $stmt->prepare('UPDATE task SET state = ? WHERE id = ? and user_id = ?');

        $stmt->bind_param("iii",$taskStatus,$taskID,$_SESSION['userID']);
        $return = $stmt->execute();
        $stmt->close();
        echo $return;

    }

    public static function gereateJSON ($tasksArray) {


    }

}

?>