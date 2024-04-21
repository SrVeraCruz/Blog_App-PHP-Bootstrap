<?php 

  include('authentication.php');
  
  if(isset($_POST['add_category_btn'])) {
    // Add Category
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $slug = mysqli_real_escape_string($con,$_POST['slug']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $meta_title = mysqli_real_escape_string($con,$_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($con,$_POST['meta_description']);
    $meta_keyword = mysqli_real_escape_string($con,$_POST['meta_keyword']);
    $navbar_status = mysqli_real_escape_string($con,$_POST['navbar_status'] ?? false) == true ? '1' : '0';
    $status = mysqli_real_escape_string($con,$_POST['status'] ?? false) == true ? '1' : '0';
  
    $add_category_query = "INSERT INTO categories 
    (name,slug,description,meta_title,meta_description,meta_keyword,navbar_status,status) 
    VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";

    $add_category_result = mysqli_query($con,$add_category_query);

    if($add_category_result) {
      $_SESSION['message'] = 'Category Added Successfully';
      header('Location: category-view.php');
      exit();
    
    } else {
      $_SESSION['message'] = 'Something Went Wrong';
      header('Location: category-view.php');
      exit();
    }
    
  } else {
    // No Permission
    $_SESSION['message'] = 'No Permission to Access';
    header('Location: index.php');
    exit();

  }

?>