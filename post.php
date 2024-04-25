<?php 
  include('includes/config.php');

  if(isset($_GET['title'])){      
    $slug = mysqli_real_escape_string($con,$_GET['title']);

    $meta_post_query = "SELECT * FROM posts WHERE slug = '$slug' LIMIT 1";
    $meta_post_result = mysqli_query($con,$meta_post_query);
    
    if(mysqli_num_rows($meta_post_result) > 0) {
      $meta_post_data = mysqli_fetch_assoc($meta_post_result);
      
      $page_title = $meta_post_data['meta_title'];
      $meta_description = $meta_post_data['meta_description'];
      $meta_keyword = $meta_post_data['meta_keyword'];

    } else {
      $page_title = "Post Page";
      $meta_description = "Post page description bloggin website";
      $meta_keywords = "html, php, laravel, react js, vue js";
    }
  
  } else {
    $page_title = "Post Page";
    $meta_description = "Post page description bloggin website";
    $meta_keywords = "html, php, laravel, react js, vue js";
  }

  include('includes/header.php');
  include('includes/navbar.php')
?>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-9">

        <?php if(isset($_GET['title'])) : ?>
          <?php         
            $slug = mysqli_real_escape_string($con,$_GET['title']);

            $post_query = "SELECT * FROM posts WHERE slug = '$slug'";
            $post_result = mysqli_query($con,$post_query);

            if(mysqli_num_rows($post_result) > 0) {
              foreach($post_result as $post) {
                ?>
                <div class="mb-3">
                  <div class="card shadow-sm md-4">
                    <div class="card-header">
                      <h5><?=$post['name']?></h5>
                    </div>
                    <div class="card-body">
                      <label class="text-dark me-2">
                        Posted On: <?=date('Y-M-d',strtotime($post['created_at']))?>
                      </label>
                      <hr>
                      <?php if($post['image'] != null) : ?>
                        <img class="w-100" src="uploads/posts/<?=$post['image']?>" alt="<?=$post['name']?>">
                      <?php endif ?>
                      <div>
                        <p><?=$post['description']?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }

            } else {
              ?>
                <h4>No Post Found</h4>
              <?php
            }
          
          ?>
        <?php else : ?>
          <h4>No such Url Found</h4>
        <?php endif ?>
        
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <h6>Advertive Area</h6>
          </div>
          <div class="card-body">
            <p>your advertise</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include('includes/footer.php')
?>