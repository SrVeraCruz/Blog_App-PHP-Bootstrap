<?php 

  session_start();
  include('includes/config.php');

  if(isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query = "SELECT * FROM users 
    WHERE email = '$email' LIMIT 1";
    $login_query_run = mysqli_query($con,$login_query);

    if(mysqli_num_rows($login_query_run) > 0) {
      $user_data = mysqli_fetch_assoc($login_query_run);
      $pass_hash = $user_data['password'];

      if(!password_verify($password,$pass_hash)) {
        $_SESSION['message'] = "Invalid Email or Password";
        header('Location: login.php');
        exit(0);

      } else {
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = $user_data['role_as']; // 0=user, 1=admin, 2=super_admin
        $_SESSION['auth_user'] = [
          'user_id' => $user_data['id'],
          'user_name' => $user_data['fname'].' '.$user_data['lname'],
          'user_email' => $user_data['email'],
        ];
        
        if($_SESSION['auth_role'] == '1' || $_SESSION['auth_role'] == '2') {
          $_SESSION['message'] = "Welcome to Dashboard";
          header('Location: admin/index.php');
          exit(0);
          
        } elseif($_SESSION['auth_role'] == '0') {
          $_SESSION['message'] = "You are Logged In";
          header('Location: index.php');
          exit(0);
        }
      }
        
    } else {
      $_SESSION['message'] = "Invalid Email or Password";
      header('Location: login.php');
      exit(0);
    }
  
  } else {
    $_SESSION['message'] = "You are not allow to access this file";
    header('Location: login.php');
    exit(0);
  }

?>