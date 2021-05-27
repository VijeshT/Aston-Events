<?php include('navbar.php'); ?>
<?php include('footer.php'); ?>

<!DOCTYPE html>
<html>
<style>
.responsive {
   width: 100%;
   height: 950px;	
}
</style>
<div class="content">
<!-- notification message -->
<?php if (isset($_SESSION['success'])) : ?>
  <div class="error success" >
    <h3>
      <?php
      echo $_SESSION['success'];
      unset($_SESSION['success']);
      ?>
    </h3>
  </div>
<?php endif ?>

<!-- logged in user information -->
<?php  if (isset($_SESSION['emailAddress'])) : ?>
  <section id="welcome-message">
    <p>Welcome <strong><?php echo $_SESSION['emailAddress']; ?></strong></p>
<?php endif ?>
  </section>
</div>
<body>
    <img src="images/indexImage.jpg" class="responsive">
</html>
