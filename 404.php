<?php 

  $page_title = "404 Not Found";
  $meta_description = "404 page description bloggin website";
  $meta_keywords = "html, php, laravel, react js, vue js";

  include('includes/config.php');
  include('includes/header.php');
  include('includes/navbar.php');
?>

  <div class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="text-center">
            <h1>404!</h1>
            <h4>Page Not Found!</h4>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php 
  include('includes/footer.php')
?>