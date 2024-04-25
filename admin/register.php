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
            <h3>Register</h3>
          </div>
          <div class="card-body">

            <form action="login.php" method="post" >
              <div class="form-group mb-3">
                <label>Firt Name</label>
                <input type="text" required placeholder="Firt Name" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Last Name</label>
                <input type="text" required placeholder="Last Name" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" required placeholder="Email" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Password</label>
                <input type="password" required placeholder="Password" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Confirm Password</label>
                <input type="password" required placeholder="Confirm Password" class="form-control">
              </div>
              <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Register Now</button>
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