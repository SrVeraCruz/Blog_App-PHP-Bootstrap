<?php 

  session_start();
  include('config/dbcon.php');

  if(isset($_SESSION['auth'])) {
    if($_SESSION['auth_role'] != '1') {
      $_SESSION['message'] = 'No Permission to Access Dashboard';
      header('Location: ../index.php');
      exit();
    }

  } else {
    $_SESSION['message'] = 'Login to Access Dashboard';
    header('Location: ../login.php');
    exit();
    
  }

?>