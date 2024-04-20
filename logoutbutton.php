<?php 

  ?>
    <?php if(isset($_SESSION['auth_user']) == '0') : ?>
      <form action="logoutcode.php" method="post">
    <?php elseif(isset($_SESSION['auth_user']) == '1') : ?>
      <form action="../logoutcode.php" method="post">
    <?php endif ?>
      <button type="submit" name="logout_btn" class="dropdown-item">
        Logout
      </button>
    </form>
  <?php

?>