<?php 
  include('authentication.php');
  if(isset($_GET['id'])) {
    $post_id = $_GET['id'];
  }

  $post_query = "SELECT * FROM posts WHERE id = '$post_id'";

  $post_result = mysqli_query($con,$post_query);
  $post_data = mysqli_fetch_assoc($post_result);
  
  $category_query = "SELECT * FROM categories";
  $category_result = mysqli_query($con,$category_query);
  
  include('includes/header.php');
?>
    
<div class="container-fluid px-4 my-2">

  <?php include('../message.php') ?>

  <h4 class="mt-4">Posts</h4>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
      <li class="breadcrumb-item active">Post</li>
      <li class="breadcrumb-item active">Edit</li>
  </ol>
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>
            Edit Post
            <a href="post-view.php" class="btn btn-danger float-end">Back</a>
          </h4>
        </div>
        <div class="card-body">

          <form action="post-code.php" enctype="multipart/form-data" method="post">

            <input type="hidden" value="<?= $post_data['id'] ?>" name="post_id" class="form-control" >

            <div class="col-md-12 mb-3">
              <label>Category List</label>
              <?php if(mysqli_num_rows($category_result) == 0): ?>
                <h5>No Category Available</h5>
              <?php else : ?>
                <select name="category_id" required class="form-control">
                  <option value="">--Select Category--</option>
                  <?php while($category = mysqli_fetch_assoc($category_result)): ?>
                    <option <?= $post_data['category_id'] == $category['id'] ? 'selected' : '' ?> value="<?= $category['id'] ?>"><?=$category['name']?></option>
                  <?php endwhile ?>     
                </select>
              <?php endif ?>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" required value="<?= $post_data['name'] ?>" name="name" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Slug (URL)</label>
                <input type="text" required value="<?= $post_data['slug'] ?>" name="slug" class="form-control" >
              </div>
              <div class="col-md-12 mb-3">
                <label>Description</label>
                <textarea name="description" required maxlength="191" class="form-control" rows="4"><?= $post_data['description'] ?></textarea>
              </div>
              <div class="col-md-12 mb-3">
                <label>Meta Title</label>
                <input type="text" required value="<?= $post_data['meta_title'] ?>" name="meta_title" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Meta Description</label>
                <textarea name="meta_description" required maxlength="191" class="form-control" rows="4"><?= $post_data['meta_description'] ?></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label>Meta Keyword</label>
                <textarea name="meta_keyword" required maxlength="191" class="form-control" rows="4"><?= $post_data['meta_keyword'] ?></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label>Image</label>
                <input type="hidden" value="<?= $post_data['image'] ?>" name="old_filename" class="form-control" >
                <input type="file" name="image" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Status</label>
                <input type="checkbox" <?= $post_data['status'] == '1' ? 'checked' : '' ?> name="status" width="4rem" height="4rem" >
              </div>
              <div class="col-md-6 mb-3">
                <button type="submit" name="update_post_btn" class="btn btn-primary">Update Post</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
    
  </div>
</div>

<?php 
  include('./includes/footer.php');
  include('./includes/script.php')
?>