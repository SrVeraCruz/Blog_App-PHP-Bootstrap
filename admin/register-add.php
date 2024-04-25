<?php 
  include('authentication.php');
  include('middleware/superadminAuth.php');

  include('includes/header.php');
?>
    
<div class="container-fluid px-4 my-2">

  
  <div class="row">
    
    <div class="col-md-12">
      
      <?php include('message.php') ?>

      <h4 class="mt-3">Users</h4>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Dashboard</li>
          <li class="breadcrumb-item active">User</li>
          <li class="breadcrumb-item active">Edit</li>
      </ol>
      
      <div class="card">
        <div class="card-header">
          <h4>
            Add Admin/User
            <a href="view-register.php" class="btn btn-danger float-end">Back</a>
          </h4>
        </div>
        <div class="card-body">

          <form action="user-code.php" method="post">

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>First Name</label>
                <input type="text" required name="fname" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Email Address</label>
                <input type="email" required name="email" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Password</label>
                <input type="password" required name="password" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Role as</label>
                <select name="role_as" required class="form-control">
                  <option value="">--Select Role--</option>
                  <option value="1" >Admin</option>
                  <option value="0" >User</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label>Status</label>
                <input type="checkbox" name="status" width="4rem" height="4rem" >
              </div>
              <div class="col-md-6 mb-3">
                <button type="submit" name="add_user_btn" class="btn btn-primary">Add Admin/User</button>
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