<?php
session_start();
if(!$_SESSION['LOGGED'])
{
  header("Location: login.php"); 
  exit();
}

require("database.php");
include("addTask.php");
include("editTask.php");
include("filterTaskProfile.php");
 
$q = $db->prepare("SELECT * FROM users");
$q->execute();
$db_users = $q->fetchAll(); 

include("modal.php");
include("navbar.php");

?>

<!DOCTYPE html>
<html lang="tr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <title>Document</title>
  </head>
  <body>
    <div class="mx-auto w-75">
      <div class="mt-3" >
      <h3><?php echo $_SESSION['USERNAME'];?>'s Tasks</h3>
      </div>
      <div >
          <button  type="button" class="btn btn-dark m-3 " data-bs-toggle="modal" data-bs-target="#myFilterModalProfile"><i class="fa-solid fa-filter"></i></button>
          <button name="addSubmit" type="button" class="btn btn-dark m-3 float-end" data-bs-toggle="modal" data-bs-target="#myModal">Add New Task</button>
      </div>
      
      <div class="todo-list">
        <table class="table table-striped table-hover">

        <tbody>
        <?php

        foreach ($db_tasks as $key) {
          $q = $db->prepare("SELECT username FROM users where id=:userId");
          $q->execute(array('userId' => $key["userId"]));
          $db_user = $q->fetch(); 
          

        echo "<tr><th scope='row'>".$key["id"]."</th>
        <td>".$key["taskName"]."</td>
        <td>".$key["status"]."</td>
        <td>".$key["date"]."</td>
        <td>".$db_user["username"]."</td>
        <td><input id='taskId' type='hidden' value='".$key['id']."'></td>

        <td><div class='float-end' style='margin-right: 20px;'>
        <button class='btn btn-outline-dark btn-sm' id='editSubmit' type='button' title='Edit' data-bs-toggle='modal' data-bs-target='#myEditModal'onmouseenter='getCurrentTaskId(this)'>
        <i class='fa-solid fa-pen'></i>
        </button>
        <button class='btn btn-outline-dark btn-sm' style='margin-left: 40px;' id='deleteSubmit' type='button' title='Sil' onclick=location.href='deleteTask.php?id=".$key['id']."'>
        <i class='far fa-trash-alt' ></i>
        </button></div>
        </td></tr>";
        }
        ?>
            
        </tbody>
        </table>
      </div>
    </div>
  </body>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="script.js"></script>
</html>