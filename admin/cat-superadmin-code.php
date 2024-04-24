<?php 

  include('authentication.php');
  include('middleware/superadminAuth.php');

  if (isset($_POST['category_delete'])) {
    // Delete Category
    echo 'delete category code here';
    $category_id = mysqli_real_escape_string($con,$_POST['category_delete']);
    
    $delete_category_query = "UPDATE categories SET status = '2' WHERE id = '$category_id'";
    $delete_category_result = mysqli_query($con,$delete_category_query);

    if($delete_category_result) {
      $_SESSION['message'] = 'Category Deleted Successfully';
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