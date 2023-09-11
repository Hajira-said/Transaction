<?php 
session_start();

if($_SESSION['loggedIn']!=true){
  header('location:login.php');
  exit();
}
?>