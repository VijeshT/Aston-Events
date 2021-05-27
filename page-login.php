<?php include('navbar.php'); ?>
<?php include('server.php') ?>
<?php include('footer.php'); ?>

<!DOCTYPE html>
<html>
<style>
/* Full-width input fields */
input[type=email], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=email]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}


button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}



</style>
  <body>
    <div class="header">
      <h2>Login</h2>
      <p>Please fill in your credentials to login.</p>
    </div>
  </br>
    <form method="post" action="page-login.php">
      <?php include('errors.php'); ?>
      <div class="input-group">
        <label>Email Address</label>
        <input type="email" name="emailAddress">
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
      </div>
      <div class="input-group">
        <button type="submit" class="loginbtn" name="login_user">Login</button>
      </div>
    </form>
  </body>
  </html>
