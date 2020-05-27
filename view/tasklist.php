<form name="taskForm" action="router.php" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="email">Task Title:</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="pwd">Task Description:</label>
        <input type="textarea" class="form-control" name="description">
    </div>
   
    <input type="hidden" value="createTask" name="action">
    <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php
?>

<form action="router.php">
    <input type="hidden" value="logout" name="action">
    <button type="submit" class="btn btn-default">Sign OUT!</button>
</form>

<div>
<button id="hide_undone"class="btn btn-default">Show Completed!</button>
<button id="hide_done" class="btn btn-default">Show Pending!</button>
<button id="all" class="btn btn-default">Show All!</button>
    <?php
    require "controller/taskController.php";
    require "database/executioner.php";
    $arrayOfTasks = taskController::showTasks($_SESSION['userID']);
    
    $keys = array_keys($arrayOfTasks);
    for ($i = 0; $i < count($arrayOfTasks); $i++) {
        //echo $keys[$i] . "{<br>";
        echo '<div id="'.$arrayOfTasks[$i]["id"].'" class="panel '.$arrayOfTasks[$i]["state"].'"> <div class="panel-body">';
            // probably not nescessary
        ($arrayOfTasks[$i]["state"] == 1) ? ($resp = "Task Done!"):($resp = "Task Unfinished");
        echo $resp;
        echo "<h1>".$arrayOfTasks[$i]["title"]."</h1>";
        echo "<p>".$arrayOfTasks[$i]["description"]."</p>";
        // foreach ($arrayOfTasks[$keys[$i]] as $key => $value) {

        //     echo $key . " : " . $value . "<br>";
        // }
        $taskID = $arrayOfTasks[$i]["id"];
        $taskStatus = $arrayOfTasks[$i]["state"];
        echo '<form action="router.php"><input type="hidden" value="updateTaskStatus" name="action"><input type="hidden" value="'.$taskID.'" name="taskID"><input type="hidden" value="'.$taskStatus.'" name="taskStatus"><button id="stateChange" type="submit" class="btn btn-success">Finished/ReActivate!</button></form>';
        echo '<form action="router.php"><input type="hidden" value="deleteTask" name="action"><input type="hidden" value="'.$taskID.'" name="taskID"><button id="deleteTask" class="btn btn-danger">Delete!</button></form>';
        echo "<button class='btn btn-warning'>Change!</button>";
        echo '<form class="updateForm" name="taskUpdateForm" action="router.php" ><div class="form-group"><label for="email">Task Title:</label><input type="hidden" value="'.$taskID.'" name="taskID"><input type="text" class="form-control" name="title"></div><div class="form-group"><label for="pwd">Task Description:</label><input type="textarea" class="form-control" name="description"></div><input type="hidden" value="changeTask" name="action"><button type="submit" class="btn btn-default">Edit</button></form>' ;
        echo "</div></div>";
        //echo "}<br>";
    }




    ?>
    <form action="router.php">
        <input type="hidden" value="exportTasks" name="action" id="action">
        <button id="exportJSON" type="submit" class="btn btn-default">Export my tasks as JSON</button>
    </form>


</div>