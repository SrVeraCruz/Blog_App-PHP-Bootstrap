<?php 
  include('authentication.php');
  include('includes/header.php');
?>
    
<div class="container-fluid px-4 my-2">

    <?php include('../message.php') ?>

    <h1 class="mt-4">Blog-Admin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total Categories
                    <?php                     
                        $dash_cat_query = "SELECT id FROM categories";
                        $dash_cat_result = mysqli_query($con,$dash_cat_query);
                        
                        if($dash_cat_qte = mysqli_num_rows($dash_cat_result)) {
                            ?>
                                <h2 class="mb-0"><?=$dash_cat_qte?></h2>
                            <?php 
                        } else {
                            ?>
                                <h2 class="mb-0">0</h2>
                            <?php
                        }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="category-view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    Total Posts
                    <?php                     
                        $dash_post_query = "SELECT id FROM posts";
                        $dash_post_result = mysqli_query($con,$dash_post_query);
                        
                        if($dash_post_qte = mysqli_num_rows($dash_post_result)) {
                            ?>
                                <h2 class="mb-0"><?=$dash_post_qte?></h2>
                            <?php 
                        } else {
                            ?>
                                <h2 class="mb-0">0</h2>
                            <?php
                        }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="post-view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    Total Users
                    <?php                     
                        $dash_user_query = "SELECT id FROM users";
                        $dash_user_result = mysqli_query($con,$dash_user_query);
                        
                        if($dash_user_qte = mysqli_num_rows($dash_user_result)) {
                            ?>
                                <h2 class="mb-0"><?=$dash_user_qte?></h2>
                            <?php 
                        } else {
                            ?>
                                <h2 class="mb-0">0</h2>
                            <?php
                        }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-register.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    Total Blocked Users
                    <?php                     
                        $dash_buser_query = "SELECT id FROM users WHERE status = '1'";
                        $dash_buser_result = mysqli_query($con,$dash_buser_query);
                        
                        if($dash_buser_qte = mysqli_num_rows($dash_buser_result)) {
                            ?>
                                <h2 class="mb-0"><?=$dash_buser_qte?></h2>
                            <?php 
                        } else {
                            ?>
                                <h2 class="mb-0">0</h2>
                            <?php
                        }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-register.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
  include('./includes/footer.php');
  include('./includes/script.php')
?>