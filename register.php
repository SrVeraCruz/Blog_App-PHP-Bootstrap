<?php 
  include('redirectuser.php');

  $page_title = "Register Page";
  $meta_description = "Register page description bloggin website";
  $meta_keywords = "html, php, laravel, react js, vue js";

  include('includes/config.php');
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
            <h3>Register</h3>
          </div>
          <div class="card-body">

            <form action="registercode.php" method="post" >
              <div class="form-group mb-3">
                <label>Firt Name</label>
                <input type="text" name="fname" required placeholder="Firt Name" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Last Name</label>
                <input type="text" name="lname" required placeholder="Last Name" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" required placeholder="Email" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Password" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Confirm Password</label>
                <input type="password" name="cpassword" required placeholder="Confirm Password" class="form-control">
              </div>
              <div class="form-group mb-3">
                <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
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