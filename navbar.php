<!-- Navbar for website -->

<?php
session_start();
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['emailAddress']);
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <link href="css/layout.css" rel="stylesheet" />
  <style>
  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: #333;
  }

  li {
    float: left;
    border-left:1px solid #bbb;
  }

  li:last-child {
    border-left: none;
  }

  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  li a:hover{
    background-color: #111;
  }

  li.dropdown {
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }

  .dropdown-content a:hover {background-color: #f1f1f1}

  .dropdown:hover .dropdown-content {
    display: block;
  }
</style>
</head>
<body>

  <?php if(empty($_SESSION['emailAddress'])){ ?>
    <ul>
      <li style="float:right"><a class="active" href="page-login.php">Log In</a></li>
      <li style="float:right"><a class="active" href="page-register.php">Register</a></li>
      <li style="float:right"><a class="active" href="page-events.php">Events</a><li>
        <li style="float:left"><a href="index.php">Aston Events</a><li>
        </ul>
      <?php } else { ?>
        <ul>
          <li style="float:right" class="dropdown"><a href="javascript:void(0)" class="dropbtn">Account</a><div class="dropdown-content">
            <a href="organiserEvents.php">View your events</a>
            <a href="addEvent.php">Add Event</a>
            <a href="index.php?logout='1'">Sign Out</a>
          </div>
        </li>
        <li style="float:right"><a class="active" href="page-events.php">Events</a><li>
          <li style="float:left"><a href="index.php">Aston Events</a><li>
          </ul>
        <?php } ?>
  </body>
</html>
