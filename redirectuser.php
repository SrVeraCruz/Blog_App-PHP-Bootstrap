<?php 

  if(isset($_SESSION['auth'])) {
    if($_SESSION['auth_role'] == '0') {
      $_SESSION['message'] = 'You are already logged in';
      header('Location: index.php');
      exit();
    
    } elseif ($_SESSION['auth_role'] == '1') {
      $_SESSION['message'] = 'You are already logged in';
      header('Location: admin/index.php');
      exit();
  
    }
  }

?>