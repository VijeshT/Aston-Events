<?php include('navbar.php'); ?>
<?php include('footer.php'); ?>
<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<style>

* {box-sizing: border-box}
/* Full-width input fields */
input[type=text], input[type=email], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=email]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.resetbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.resetbtn, .registerbtn {
  float: left;
  width: 50%;
}

</style>
<body>
  <link type="text/css" href="css/registrationCSS.css" rel="stylesheet" />

  <form method="post" action="page-register.php" id="sign-up">
    <?php include('errors.php'); ?>
    <h2>Register</h2>
    <!-- Form input -->
    <input type="text" name="foreName" placeholder="First Name" value="<?php echo $foreName; ?>" />
    <br/>
    <input type="text" name="surName" placeholder="Last Name" value="<?php echo $surName; ?>" />
    <br/>
    <input type="text" name="phoneNumber" placeholder="Phone Number" value="<?php echo $phoneNumber; ?>" />
    <br/>
    <input type="email" name="emailAddress" placeholder="Email" required
           pattern=".+(\.ac\.uk|\.edu)" title="Enter a valid Aston email." value="<?php echo $emailAddress; ?>" />
    <br/>
    <input type="password" name="password_1" placeholder="Password" required/>
    <br/>
    <input type="password" name="password_2" placeholder="Confirm Password" />
    <br/>
    <!-- Submit button and Reset button -->
    <br/>
    <button type="submit" class="registerbtn" name="reg_user">Register</button>
    <button type="reset" class="resetbtn" name="reset">Reset</button>
  </form>
</body>
</html>
