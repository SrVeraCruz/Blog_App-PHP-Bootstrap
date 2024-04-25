<?php 
  include('authentication.php');
  include('includes/header.php');
?>

<div class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">

        <?php include('message.php') ?>

        <div class="card">
          <div class="card-header">
            <h3>Current Login Page</h3>
          </div>
          <div class="card-body">

          <form action="index.php" method="post">
            <div class="form-group mb-3">
              <label>Email</label>
              <input type="email" required placeholder="Email Adderess" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label>Password</label>
              <input type="password" required placeholder="Password" class="form-control">
            </div>
            <div class="form-group mb-3">
              <button type="submit" class="btn btn-primary">Login Now</button>
            </div>
          </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include('includes/footer.php');
  include('includes/script.php')
?>