<div id="layoutSidenav_nav">
    <?php 
    
        $page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],'/')+1);
    
    ?>
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
          <div class="nav">
              <div class="sb-sidenav-menu-heading">Core</div>
              <a class="nav-link <?= $page == 'index.php' ? 'active' : '' ?>" href="index.php">
                  <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                  Dashboard
              </a>
              <?php if($_SESSION['auth_role']=='2'): ?>
                <a class="nav-link <?= $page == 'view-register.php' || $page == 'register-add.php' || $page == 'register-edit.php' ? 'active' : '' ?>" href="view-register.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Registered Users
                </a>
              <?php endif ?>
              <div class="sb-sidenav-menu-heading">Interface</div>
              <a class="nav-link collapsed <?= $page == 'category-view.php' || $page == 'category-add.php' || $page == 'category-edit.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                  <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                  Categories
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse <?= $page == 'category-view.php' || $page == 'category-add.php' || $page == 'category-edit.php' ? 'show' : '' ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link <?= $page == 'category-add.php' ? 'active' : '' ?>" href="category-add.php">Add Category</a>
                      <a class="nav-link <?= $page == 'category-view.php' || $page == 'category-edit.php' ? 'active' : '' ?>" href="category-view.php">View Category</a>
                  </nav>
              </div>
              <a class="nav-link collapsed <?= $page == 'post-view.php' || $page == 'post-add.php' || $page == 'post-edit.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                  <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                  Posts
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse <?= $page == 'post-view.php' || $page == 'post-add.php' || $page == 'post-edit.php' ? 'show' : '' ?>" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link <?= $page == 'post-add.php' ? 'active' : '' ?>" href="post-add.php">Add Post</a>
                      <a class="nav-link <?= $page == 'post-view.php' || $page == 'post-edit.php' ? 'active' : '' ?>" href="post-view.php">View Post</a>
                  </nav>
              </div>
              <a class="nav-link collapsed <?= $page == 'register.php' || $page == 'login.php' || $page == '404.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                  <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                  Pages
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse <?= $page == 'register.php' || $page == 'login.php' || $page == '404.php' ? 'show' : '' ?>" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                      <a class="nav-link collapsed <?= $page == 'register.php' || $page == 'login.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                          Authentication
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse <?= $page == 'register.php' || $page == 'login.php' ? 'show' : '' ?>" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link <?= $page == 'login.php' ? 'active' : '' ?>" href="login.php">Login</a>
                              <a class="nav-link <?= $page == 'register.php' ? 'active' : '' ?>" href="register.php">Register</a>
                          </nav>
                      </div>
                      <a class="nav-link collapsed <?= $page == '404.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                          Error
                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse <?= $page == '404.php' ? 'show' : '' ?>" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                          <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link <?= $page == '404.php' ? 'active' : '' ?>" href="404.php">404 Page</a>
                          </nav>
                      </div>
                  </nav>
              </div>
          </div>
      </div>
      <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          <?= $_SESSION['auth_user']['user_name'] ?>
      </div>
  </nav>
</div>