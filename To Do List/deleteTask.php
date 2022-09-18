<?php
require("database.php");

$taskId= $_GET["id"];

$insert = $db->prepare("DELETE FROM tasks WHERE id = :id");    
$insert -> execute(array('id' => $taskId));

header("Location: index.php"); 
exit();
?>