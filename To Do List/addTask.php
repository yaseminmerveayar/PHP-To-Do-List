<?php

if(isset($_POST['AddTaskName']) && isset($_POST['AddUsers']) && isset($_POST['AddProcess'])){
             
    $process = $_POST['AddProcess'];
    $taskName = $_POST['AddTaskName'];

    $user = $_POST['AddUsers'];
    $q = $db->prepare("SELECT * FROM users where username=:username ");
    $q->execute(array('username'=>$user));
    $db_user = $q->fetch();

    $date = date("d/m/Y");

    $insert = $db->prepare("INSERT INTO tasks (taskName, status, date , userId ) VALUES (?,?,?,?)");    
    $insert -> execute([$taskName,$process,$date,$db_user["id"]]);

}

?>