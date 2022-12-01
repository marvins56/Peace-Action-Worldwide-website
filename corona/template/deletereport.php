<?php
include('database.php');
session_start();

$id = $_GET['deleteid'];
$query = "DELETE from reports where id = '$id' ";
$result = mysqli_query($conn,$query);
if($result){
  if(isset($_SESSION['url'])){
  $backlink =  $_SESSION['url'];
  header("location:$backlink");
}else{
  header("index.php");
}
}
 else{
   die(mysqli_error($conn));
 }
