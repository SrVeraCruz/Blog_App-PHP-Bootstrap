<?php 
  include('authentication.php');

  $posts_query = "SELECT p.*, c.name AS cname
  FROM posts p INNER JOIN categories c ON c.id = p.category_id";

  $posts_result = mysqli_query($con,$posts_query);

  include('includes/header.php');
?>
    
<div class="container-fluid px-4 my-2">

  <h4 class="mt-4">Posts</h4>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item active">Post</li>
  </ol>
  <div class="row">
    
    <div class="col-md-12">

      <?php include('message.php') ?>

      <div class="card">
        <div class="card-header">
          <h4>
            Registered Posts
            <a href="post-add.php" class="btn btn-primary float-end">Create Post</a>
          </h4>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table id="myDataTable" class="table table-bordered table-stipe">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php if(mysqli_num_rows($posts_result) == 0): ?>
                  <tr>
                    <th colspan="7">No Record Found</th>
                  </tr>
                <?php else: ?>
                  <?php while($post = mysqli_fetch_assoc($posts_result)): ?>
                    <tr>
                      <td><?= $post['id'] ?></td>
                      <td><?= $post['name'] ?></td>
                      <td><?= $post['cname'] ?></td>
                      <td>
                        <img src="../uploads/posts/<?= $post['image'] ?>" alt="<?= $post['name'] ?>" width="30px"  >
                      </td>
                      <td><?= $post['status'] == '1' ? 'Hidden' : 'Visible'?></td>
                      <td><a href="post-edit.php?id=<?=$post['id']?>" class="btn btn-primary" >Edit</a></td>
                      <td>
                        <form action="post-code.php" method="post">
                          <button type="submit" class="btn btn-danger" value="<?= $post['id']?>" name="post_delete">Delete</button>
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