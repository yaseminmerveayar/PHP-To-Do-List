<?php
    session_start();
    unset($_SESSION['USERNAME']);
    unset($_SESSION['PASSWORD']);
    unset($_SESSION['LOGGED']);

    session_destroy();

    header("Location: login.php");
    exit;
?>
