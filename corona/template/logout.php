<?php

session_start();

if(isset($_SESSION['id'])&& isset($_SESSION['username'])&& isset($_SESSION['location'])) {
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['location']);

}
header("location:admin_login.php");
?>
