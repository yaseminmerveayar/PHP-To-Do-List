<?php
if(isset($_POST['EditTaskName']) && isset($_POST['EditProcess']) && isset($_POST['EditUsers'])){
             
    $process = $_POST['EditProcess'];
    $taskName = $_POST['EditTaskName'];
    $taskId = $_POST['taskId'];

    $user = $_POST['EditUsers'];
    $q = $db->prepare("SELECT * FROM users where username=:username ");
    $q->execute(array('username'=>$user));
    $db_user = $q->fetch();


    $insert = $db->prepare("UPDATE tasks SET taskName=?, status=?, userId=? WHERE id = $taskId");    
    $insert -> execute([$taskName,$process,$db_user["id"]]);

}

?>