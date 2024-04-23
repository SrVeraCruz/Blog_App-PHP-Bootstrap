<?php 

  $navbar_categories_query = "SELECT * FROM categories 
  WHERE navbar_status = '0' AND status = '0'";
  
  $navbar_categories_result = mysqli_query($con,$navbar_categories_query);
?>

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <img height="100px" width="150px" src="admin/assets/img/logo.jpeg" alt="logo">
    </div>
    <div class="col-md-9">

    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
  <div class="container">
    <a class="navbar-brand d-block d-sm-none d-md-none"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">Home</a>
        </li>
        
        <?php if(mysqli_num_rows($navbar_categories_result) > 0): ?>
          <?php foreach($navbar_categories_result as $navItem): ?>
            <li class="nav-item">
              <a class="nav-link text-white" href="category.php?title=<?= $navItem['slug']?>"><?= $navItem['name']?></a>
            </li>
          <?php endforeach ?>
        <?php endif?>


        <?php if(isset($_SESSION['auth_user'])) : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['auth_user']['user_name'] ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">My Profile</a></li>
              <li>
                <?php include('logoutbutton.php') ?>
              </li>
            </ul>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="./login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">Register</a>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>