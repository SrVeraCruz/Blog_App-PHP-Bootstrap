<?php 
  include('authentication.php');
  $categories_query = "SELECT * FROM categories WHERE status != '2'";
  $categories_result = mysqli_query($con,$categories_query);

  include('includes/header.php');
?>
    
<div class="container-fluid px-4 my-2">

  <h4 class="mt-4">Categories</h4>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item active">Category</li>
  </ol>
  <div class="row">
    
    <div class="col-md-12">

      <?php include('message.php') ?>

      <div class="card">
        <div class="card-header">
          <h4>
            Registered Categories
            <a href="Category-add.php" class="btn btn-primary float-end">Add Categories</a>
          </h4>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-bordered table-stipe">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php if(mysqli_num_rows($categories_result) == 0): ?>
                  <tr>
                    <th colspan="8">No Record Found</th>
                  </tr>
                <?php else: ?>
                  <?php while($category = mysqli_fetch_assoc($categories_result)): ?>
                    <tr>
                      <td><?= $category['id'] ?></td>
                      <td><?= $category['name'] ?></td>
                      <td><?= $category['status'] == '1' ? 'Hidden' : 'Visible'?></td>
                      <td><a href="category-edit.php?id=<?=$category['id']?>" class="btn btn-primary" >Edit</a></td>
                      <td>
                        <form action="category-code.php" method="post">
                          <button type="submit" class="btn btn-danger" value="<?= $category['id']?>" name="category_delete">Delete</button>
                        </form>
                      </td>
                    </tr>
                  <?php endwhile ?>
                <?php endif ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    
  </div>
</div>

<?php 
  include('./includes/footer.php');
  include('./includes/script.php')
?> 