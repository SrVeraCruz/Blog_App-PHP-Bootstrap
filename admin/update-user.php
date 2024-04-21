<?php 

  include('authentication.php');

  if(isset($_POST['update_user_btn'])) {
    $user_id = mysqli_real_escape_string($con,$_POST['user_id']);
    $fname = mysqli_real_escape_string($con,$_POST['fname']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $role_as = mysqli_real_escape_string($con,$_POST['role_as']);
    $status = mysqli_real_escape_string($con,$_POST['status'] ?? false) == true ? '1' : '0';

    $user_query = "SELECT password FROM users WHERE id = '$user_id' LIMIT 1";
    $user_result = mysqli_query($con,$user_query);
    $user_data = mysqli_fetch_assoc($user_result);

    if($password == $user_data['password']) {
      $update_query = "UPDATE users 
      SET fname = '$fname',lname = '$lname',email = '$email',
      role_as = '$role_as',status = '$status'
      WHERE id = '$user_id' LIMIT 1";

    } else {
      $pass_hash = password_hash($password,PASSWORD_DEFAULT);
      
      $update_query = "UPDATE users 
      SET fname = '$fname',lname = '$lname',email = '$email',
      password = '$pass_hash',role_as = '$role_as',status = '$status'
      WHERE id = '$user_id' LIMIT 1";
      
    }

    $update_result = mysqli_query($con,$update_query);

    if($update_result) {
      $_SESSION['message'] = 'Updated with success';
      header('Location: view-register.php');
      exit();

    } else {
      $_SESSION['message'] = 'Something Went Wrong';
      header('Location: view-register.php');
      exit();
    }
  
  } else {
    $_SESSION['message'] = 'No Permission to Access';
    header('Location: index.php');
    exit();

  }

?>