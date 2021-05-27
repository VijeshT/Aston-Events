<!-- Attempt at like -->

<?php
include("connectdb.php");
if(isset($_GET['eventID'])) {
  $eventID=$_GET['eventID'];
  $sql = "UPDATE eventinformation SET likenessRating = (likenessRating + 1) WHERE event_id=$eventID";
  $check=mysqli_query($connect, $sql);
  header("Location: like.php");
}



 ?>
