<?php 
  include('authentication.php');
  include('includes/header.php');
?>
    
<div class="container-fluid px-4 my-2">

  <div class="row">
    
    <div class="col-md-12">
      
      <?php include('message.php') ?>

      <h4 class="mt-3">Categories</h4>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Dashboard</li>
          <li class="breadcrumb-item active">Category</li>
          <li class="breadcrumb-item active">Add</li>
      </ol>
      
      <div class="card">
        <div class="card-header">
          <h4>
            Add Category
            <a href="category-view.php" class="btn btn-danger float-end">Back</a>
          </h4>
        </div>
        <div class="card-body">

          <form action="category-code.php" method="post">

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" required name="name" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Slug (URL)</label>
                <input type="text" required name="slug" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Description</label>
                <textarea name="description" required maxlength="191" class="form-control" rows="4"></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label>Meta Title</label>
                <input type="text" required name="meta_title" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Meta Description</label>
                <textarea name="meta_description" required maxlength="191" class="form-control" rows="4"></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label>Meta Keyword</label>
                <textarea name="meta_keyword" required maxlength="191" class="form-control" rows="4"></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label>Navbar Status</label> <br>
                <input type="checkbox" name="navbar_status" width="4rem" height="4rem" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Status</label> <br>
                <input type="checkbox" name="status" width="4rem" height="4rem" >
                Checked = Hidden, Unchecked = Visible
              </div>
              <div class="col-md-6 mb-3">
                <button type="submit" name="add_category_btn" class="btn btn-primary">Save Category</button>
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