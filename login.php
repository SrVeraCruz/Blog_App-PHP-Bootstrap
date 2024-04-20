<?php 
  session_start();
  include('redirectuser.php');
  include('includes/header.php');
  include('includes/navbar.php')
?>

<div class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">

        <?php include('message.php') ?>

        <div class="card">
          <div class="card-header">
            <h3>Hello</h3>
          </div>
          <div class="card-body">

          <form action="logincode.php" method="post">
            <div class="form-group mb-3">
              <label>Email</label>
              <input type="email" name="email" required placeholder="Email Adderess" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label>Password</label>
              <input type="password" name="password" required placeholder="Password" class="form-control">
            </div>
            <div class="form-group mb-3">
              <button type="submit" name="login_btn" class="btn btn-primary">Login Now</button>
            </div>
          </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include('includes/footer.php')
?>