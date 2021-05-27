<!-- Deleting an event -->

<?php
$db = mysqli_connect("localhost", "tharmabv", "HeRLp2Mi86gvsPmK", "tharmabv_db"); //127.0.0.1

// Checks if anything is within variable, if so then delete.
if(isset($_GET['del'])){

  $id=$_GET['del'];
  $sql = "DELETE FROM eventinformation WHERE eventID = '$id'";
  $res = mysqli_query($db, $sql);
  header('location: organiserEvents.php');
}
?>
