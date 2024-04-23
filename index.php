<?php 
  include('includes/header.php');
  include('includes/navbar.php');
?>

<div class="py-5 bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-white">Category</h3>
        <div class="underline"></div>
      </div>

      <?php 
        $home_categories_query = "SELECT * FROM categories 
        WHERE navbar_status = '0' AND status = '0' LIMIT 12";
        
        $home_categories_result = mysqli_query($con,$home_categories_query);
      
      ?>
      <?php if(mysqli_num_rows($home_categories_result) > 0): ?>
        <?php foreach($home_categories_result as $homeCatItem): ?>
          
          <div class="col-md-3 mb-4">
            <a class="text-decoration-none" href="category.php?title=<?= $homeCatItem['slug']?>">
              <div class="card card-body">
                <?= $homeCatItem['name']?>
              </div>
            </a>
          </div>

        <?php endforeach ?>
      <?php endif?>
      
    </div>
  </div>
</div>

<div class="pt-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-dark">Vera Cruz Company</h3>
        <div class="underline"></div>
        <p>
          Vera Cruz Tecnologia da Informação Uma empresa inovadora que oferece soluções tecnológicas personalizadas para empresas em todo o mundo. Com uma equipe experiente e apaixonada, a Vera Cruz cria sistemas robustos, desenvolve aplicativos móveis e implementa estratégias de segurança cibernética. Nossa missão é impulsionar o sucesso dos nossos clientes por meio da excelência tecnológica.
        </p>
      </div>
  </div>
</div>

<div class="py-5 bg-white">
  <div class="container">
    <div class="row">

      <div class="col-md-9">
        <h3 class="text-dark">Latest Posts</h3>
        <div class="underline"></div>

        <?php 
          $home_posts_query = "SELECT * FROM posts 
          WHERE status = '0' LIMIT 12";
          
          $home_posts_result = mysqli_query($con,$home_posts_query);
        ?>
        <?php if(mysqli_num_rows($home_posts_result) > 0): ?>
          <?php foreach($home_posts_result as $homePostItem): ?>
            
            <div class="mb-4">
              <a class="text-decoration-none" href="post.php?title=<?= $homePostItem['slug']?>">
                <div class="card card-body bg-light">
                  <?= $homePostItem['name']?>
                </div>
              </a>
            </div>

          <?php endforeach ?>
        <?php endif?>

      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <h4>Reach Us</h4>
          </div>
          <div class="card-body">
            veracruz@gmail.com
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<?php 
  include('includes/footer.php')
?>