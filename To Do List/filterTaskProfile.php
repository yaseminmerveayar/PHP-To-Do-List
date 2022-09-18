<?php
if(!empty($_POST['ProfilProcess'])){
    $process = $_POST['ProfilProcess']; 
    $d = $db->prepare("SELECT * FROM tasks where userId=:id AND status= :status");
    $d->execute(array('id'=>$_SESSION['ID'],'status' => $process));
    $db_tasks = $d->fetchAll(); 
}
elseif(empty($_POST['ProfilProcess']) ){
    
    $d = $db->prepare("SELECT * FROM tasks where userId=:id");
    $d->execute(array('id'=>$_SESSION['ID']));
    $db_tasks = $d->fetchAll(); 
}
?>