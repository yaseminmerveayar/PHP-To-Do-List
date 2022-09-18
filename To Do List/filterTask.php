<?php

if(!empty($_POST['process']) && !empty($_POST['users'])){
             
    $process = $_POST['process'];

    $user = $_POST['users'];
    $q = $db->prepare("SELECT * FROM users where username=:username");
    $q->execute(array('username'=>$user));
    $db_user = $q->fetch();

    $select = $db->prepare("SELECT * FROM tasks where status=:process AND userId =:userId ");
    $select->execute(array('process'=>$process , 'userId'=>$db_user["id"]));
    $db_tasks = $select->fetchAll();

}
elseif (!empty($_POST['process']) && empty($_POST['users'])){
             
    $process = $_POST['process'];

    $q = $db->prepare("SELECT * FROM tasks where status=:process ");
    $q->execute(array('process'=>$process));
    $db_tasks = $q->fetchAll();

}
elseif (!empty($_POST['users']) && empty($_POST['process'])){
             
    $user = $_POST['users'];
    $q = $db->prepare("SELECT * FROM users where username=:username");
    $q->execute(array('username'=>$user));
    $db_user = $q->fetch();

    $select = $db->prepare("SELECT * FROM tasks where userId=:userId ");
    $select->execute(array('userId' => $db_user["id"]));
    $db_tasks = $select->fetchAll();

}
elseif(empty($_POST['process']) && empty($_POST['users'])){
    
    $d = $db->prepare("SELECT * FROM tasks");
    $d->execute();
    $db_tasks = $d->fetchAll();
}

?>