<?php 

  session_start();
  include('includes/config.php');

  if(isset($_POST['register_btn'])) {
    $fname = mysqli_real_escape_string($con,$_POST['fname']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $confirm_password = mysqli_real_escape_string($con,$_POST['cpassword']);

    if($password == $confirm_password) {
      // Check Email
      $checkemail = "SELECT email FROM users WHERE email = '$email'";
      $checkemail_run = mysqli_query($con,$checkemail);
      
      if(mysqli_num_rows($checkemail_run) > 0) {
        // Already Email Existe
        $_SESSION['message'] = "Email Already Existe";
        header("Location: register.php");
        exit(0);

      } else {
        $pass_hash = password_hash($password,PASSWORD_DEFAULT);

        $user_query = "INSERT INTO users (fname,lname,email,password) 
        VALUES ('$fname','$lname','$email','$pass_hash')";
        $user_query_run = mysqli_query($con,$user_query);

        if($user_query_run) {
          $_SESSION['message'] = 'Registered Successfully';
          header('Location: login.php');
          exit(0);

        } else {
          $_SESSION['message'] = 'Something Went Wrong!';
          header('Location: register.php');
          exit(0);
        }
      }
      
    } else {
      $_SESSION['message'] = "Password and Confirm Password does not Match";
      header('Location: register.php');
      exit(0);
    }

  } else {
    header('Location: register.php');
    exit(0);
  }

?>