<?php
// initialising variables
$orgID ="";
$foreName = "";
$surName="";
$phoneNumber="";
$emailAddress = "";
$errors = array();

$db = mysqli_connect("localhost", "tharmabv", "HeRLp2Mi86gvsPmK", "tharmabv_db"); //127.0.0.1

// Registering the user
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $foreName = mysqli_real_escape_string($db, $_POST['foreName']);
  $surName = mysqli_real_escape_string($db, $_POST['surName']);
  $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
  $emailAddress = mysqli_real_escape_string($db, $_POST['emailAddress']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($foreName)) { array_push($errors, "First name is required."); }
  if (empty($surName)) { array_push($errors, "Last name is required."); }
  if (empty($phoneNumber)) { array_push($errors, "Phone number is required."); }
  if (empty($emailAddress)) { array_push($errors, "Email address is required."); }
  if (empty($password_1)) { array_push($errors, "Password is required."); }
  if ($password_1 != $password_2) {
	array_push($errors, "Passwords do not match");
  }

  // check the database to make sure
  // a user does not already exist with the same name email
  $user_check_query = "SELECT * FROM organiser WHERE emailAddress='$emailAddress' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['emailAddress'] === $emailAddress) {
      array_push($errors, "Email address already exists");
    }
   }

  // Register the user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO organiser (foreName, surName, phoneNumber, emailAddress, password)
          VALUES('$foreName', '$surName', '$phoneNumber', '$emailAddress', '$password')";
    mysqli_query($db, $query);
    // $_SESSION['emailAddress'] = $emailAddress;
    // $_SESSION['success'] = "You are now logged in";
    header('location: page-login.php');
    }
    }

// Logging the user in
if (isset($_POST['login_user'])) {
  $emailAddress = mysqli_real_escape_string($db, $_POST['emailAddress']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($emailAddress)) {
  	array_push($errors, "Email address is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM organiser WHERE emailAddress='$emailAddress' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['emailAddress'] = $emailAddress;
      foreach ($db->query($query) as $data){
        $idd = $data['orgID'];
        $_SESSION['id'] = $data['orgID'];
      }

  	  // $_SESSION['success'] = "You are now logged in";

      header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>
