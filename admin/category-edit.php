<?php 
  include('authentication.php');
  if(isset($_GET['id'])) {
    $category_id = $_GET['id'];
  }
  $category_query = "SELECT * FROM categories WHERE id = '$category_id'";
  $category_result = mysqli_query($con,$category_query);
  $category_data = mysqli_fetch_assoc($category_result);

  include('includes/header.php');
?>
    
<div class="container-fluid px-4 my-2">

  <?php include('../message.php') ?>

  <h4 class="mt-4">Categories</h4>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
      <li class="breadcrumb-item active">Category</li>
      <li class="breadcrumb-item active">Edit</li>
  </ol>
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>
            Edit User
            <a href="category-view.php" class="btn btn-danger float-end">Back</a>
          </h4>
        </div>
        <div class="card-body">

          <form action="category-code.php" method="post">

            <input type="hidden" name="category_id" value="<?= $category_id ?>">

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" value="<?= $category_data['name']?>" required name="name" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Slug (URL)</label>
                <input type="text" value="<?= $category_data['slug']?>" required name="slug" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Description</label> 
                <textarea name="description" required maxlength="191" class="form-control" rows="4"><?= $category_data['description']?></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label>Meta Title</label>
                <input type="text" value="<?= $category_data['meta_title']?>" required name="meta_title" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Meta Description</label>
                <textarea name="meta_description" required maxlength="191" class="form-control" rows="4"><?= $category_data['meta_description']?></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label>Meta Keyword</label>
                <textarea name="meta_keyword" required maxlength="191" class="form-control" rows="4"><?= $category_data['meta_keyword']?></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label>Navbar Status</label>
                <input type="checkbox" <?= $category_data['navbar_status'] == '1' ? 'checked' : '' ?> name="navbar_status" width="4rem" height="4rem" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Status</label>
                <input type="checkbox" <?= $category_data['status'] == '1' ? 'checked' : '' ?> name="status" width="4rem" height="4rem" >
              </div>
              <div class="col-md-6 mb-3">
                <button type="submit" name="update_category_btn" class="btn btn-primary">Update Category</button>
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