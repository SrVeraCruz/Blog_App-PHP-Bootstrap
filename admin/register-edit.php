<?php 
  include('authentication.php');
  if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
  }
  $users_query = "SELECT * FROM users WHERE id = '$user_id'";
  $users_result = mysqli_query($con,$users_query);
  $user_data = mysqli_fetch_assoc($users_result);

  include('includes/header.php');
?>
    
<div class="container-fluid px-4 my-2">

  <?php include('../message.php') ?>

  <h4 class="mt-4">Users</h4>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
      <li class="breadcrumb-item active">User</li>
  </ol>
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Edit User</h4>
        </div>
        <div class="card-body">

          <form action="update-user.php" method="post">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">

            <div class="row">
              <div class="col-md-6 mb-3">
                <label>First Name</label>
                <input type="text" required value="<?= $user_data['fname']?>" name="fname" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" value="<?= $user_data['lname']?>" name="lname" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Email Address</label>
                <input type="email" required value="<?= $user_data['email']?>" name="email" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Password</label>
                <input type="password" required value="<?= $user_data['password']?>" name="password" class="form-control" >
              </div>
              <div class="col-md-6 mb-3">
                <label>Role as</label>
                <select name="role_as" required class="form-control">
                  <option value="">--Select Role--</option>
                  <option value="1" <?= $user_data['role_as'] == '1' ? 'selected' : '' ?>>Admin</option>
                  <option value="0" <?= $user_data['role_as'] == '0' ? 'selected' : '' ?> >User</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label>Status</label>
                <input type="checkbox" name="status" <?= $user_data['status'] == '1' ? 'checked' : '' ?> width="4rem" height="4rem" >
              </div>
              <div class="col-md-6 mb-3">
                <button type="submit" name="update_user_btn" class="btn btn-primary">Update User</button>
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