<?php 

  include('authentication.php');

  if(isset($_POST['add_post_btn'])) {
    // Create Post
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $category_id = mysqli_real_escape_string($con,$_POST['category_id']);
    $slug = mysqli_real_escape_string($con,$_POST['slug']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $meta_title = mysqli_real_escape_string($con,$_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($con,$_POST['meta_description']);
    $meta_keyword = mysqli_real_escape_string($con,$_POST['meta_keyword']);
    $image = mysqli_real_escape_string($con,$_FILES['image']['name']);
    $status = mysqli_real_escape_string($con,$_POST['status'] ?? false) == true ? '1' : '0';
    
    // Rename image
    $image_extention = pathinfo($image,PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extention;

    $add_post_query = "INSERT INTO posts (category_id,name,slug,description,image,meta_title,meta_description,meta_keyword) 
    VALUES ('$category_id','$name','$slug','$description','$filename','$meta_title','$meta_description','$meta_keyword')";
    
    $add_post_result = mysqli_query($con,$add_post_query);

    if($add_post_result) {
      move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/posts/'.$filename);
      $_SESSION['message'] = 'Post Created Successfully';
      header('Location: post-view.php');
      exit();
    
    } else {
      $_SESSION['message'] = 'Something Went Wrong';
      header('Location: post-view.php');
      exit();
    }

  } elseif (isset($_POST['update_post_btn'])) {
    // Update Post
    $post_id = mysqli_real_escape_string($con,$_POST['post_id']);
    $category_id = mysqli_real_escape_string($con,$_POST['category_id']);
    
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $slug = mysqli_real_escape_string($con,$_POST['slug']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $meta_title = mysqli_real_escape_string($con,$_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($con,$_POST['meta_description']);
    $meta_keyword = mysqli_real_escape_string($con,$_POST['meta_keyword']);
    $image = mysqli_real_escape_string($con,$_FILES['image']['name']);
    $old_filename = mysqli_real_escape_string($con,$_POST['old_filename']);
    $status = mysqli_real_escape_string($con,$_POST['status'] ?? false) == true ? '1' : '0';
  
    // Rename Image
    if($image != '' || $image != NULL) {
      $image_extention = pathinfo($image,PATHINFO_EXTENSION);
      $update_filename = time().'.'.$image_extention;
    
    } else {
      $update_filename = $old_filename;

    }

    $update_post_query = "UPDATE posts 
    SET category_id = '$category_id', name = '$name',slug = '$slug',description = '$description',meta_title = '$meta_title',meta_description = '$meta_description',meta_keyword = '$meta_keyword',image = '$update_filename',status = '$status'
    WHERE id = '$post_id' LIMIT 1";
    
    $update_post_result = mysqli_query($con,$update_post_query);

    if($update_post_result) {
      if($image != '' || $image != NULL) {
        if(file_exists('../uploads/posts/'.$old_filename)) {
          unlink('../uploads/posts/'.$old_filename);
        }
        move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/posts/'.$update_filename);
      }

      $_SESSION['message'] = 'Post Updated Successfully';
      header('Location: post-view.php');
      exit();

    } else {
      $_SESSION['message'] = 'Something Went Wrong';
      header('Location: post-view.php');
      exit();
    }
    
  } elseif (isset($_POST['post_delete'])) {
    // Delete Post
    $post_id = mysqli_real_escape_string($con,$_POST['post_delete']);
    
    $check_img_query = "SELECT image FROM posts WHERE id = '$post_id' LIMIT 1";
    $check_img_result = mysqli_query($con,$check_img_query);
    $res_data = mysqli_fetch_assoc($check_img_result);
    $image = $res_data['image'];

    $delete_post_query = "DELETE FROM posts WHERE id = '$post_id' LIMIT 1";
    $delete_post_result = mysqli_query($con,$delete_post_query);

    if($delete_post_result) {
      if(file_exists('../uploads/posts/'.$image)) {
        unlink('../uploads/posts/'.$image);
      }

      $_SESSION['message'] = 'Post Deleted Successfully';
      header('Location: post-view.php');
      exit();
    
    } else {
      $_SESSION['message'] = 'Something Went Wrong';
      header('Location: post-view.php');
      exit();
    }
  } else {
    // No Permission
    $_SESSION['message'] = 'No Permission to Access';
    header('Location: index.php');
    exit();
    
  }

?>