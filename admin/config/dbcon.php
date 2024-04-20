<?php 

$host = 'localhost';
$username = 'root';
$password = '';
$batabase = 'blog';

$con = mysqli_connect("$host","$username","$password","$batabase");

if(!$con) {
  header("Location: ../errors/dberror.php");
  die();
}

?>