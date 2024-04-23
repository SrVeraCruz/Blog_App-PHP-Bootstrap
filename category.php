<?php 
  include('includes/config.php');

  if(isset($_GET['title'])){      
    $slug = mysqli_real_escape_string($con,$_GET['title']);

    $meta_category_query = "SELECT meta_title,meta_description,meta_keyword FROM categories WHERE slug = '$slug' AND status = '0' LIMIT 1";
    $meta_category_result = mysqli_query($con,$meta_category_query);
    
    if(mysqli_num_rows($meta_category_result) > 0) {
      $meta_category_data = mysqli_fetch_assoc($meta_category_result);
      
      $page_title = $meta_category_data['meta_title'];
      $meta_description = $meta_category_data['meta_description'];
      $meta_keyword = $meta_category_data['meta_keyword'];

    } else {
      $page_title = "Category Page";
      $meta_description = "Category page description bloggin website";
      $meta_keywords = "html, php, laravel, react js, vue js";
    }
  
  } else {
    $page_title = "Category Page";
    $meta_description = "Category page description bloggin website";
    $meta_keywords = "html, php, laravel, react js, vue js";
  }

  include('includes/header.php');
  include('includes/navbar.php');
?>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-9">

        <?php if(isset($_GET['title'])) : ?>
          <?php 
            $slug = mysqli_real_escape_string($con,$_GET['title']);

            $category_query = "SELECT id,slug FROM categories WHERE slug = '$slug' AND status = '0' LIMIT 1";
            $category_result = mysqli_query($con,$category_query);
            
            if(mysqli_num_rows($category_result) > 0) {
              $category_data = mysqli_fetch_assoc($category_result);
              $category_id = $category_data['id'];
              $posts_query = "SELECT category_id,name,slug,created_at FROM posts WHERE category_id = '$category_id' AND status = '0'";
              $posts_result = mysqli_query($con,$posts_query);

              if(mysqli_num_rows($posts_result) > 0) {
                foreach($posts_result as $post) {
                  ?>
                    <div class="mb-3">
                      <a href="post.php?title=<?=$post['slug']?>" class="text-decoration-none" >
                        <div class="card card-body shadow-sm md-4">
                          <h5><?=$post['name']?></h5>
                          <div>
                            <label class="text-dark me-2">
                              Posted On: <?=date('Y-M-d',strtotime($post['created_at']))?>
                            </label>
                          </div>
                        </div>
                      </a>
                    </div>
                  <?php
                }

              } else {
                ?>
                  <h4>No Posts Found</h4>
                <?php
                
              }

            } else {
              ?>
                <h4>No Category Found</h4>
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