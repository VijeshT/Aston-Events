<?php include('navbar.php')?>
<?php include('footer.php'); ?>
<?php
include("connectdb.php");
$UID = $_GET['edit'];
if(isset($_GET['edit'])){
  $sqlstr = "SELECT * FROM eventinformation WHERE eventID = '$UID'";
  $rows=$db->query($sqlstr);
  //loop through all the returned records and display them in a table
  try{
    foreach ($rows as $row) {

      $category = $row['category'];
      $name = $row['name'];
      $description = $row['description'];
      $venue = $row['venue'];
      $time = $row['time'];
      $contactNumber = $row['contactNumber'];
    }

  } catch (PDOException $ex){
    //this catches the exception when the query is thrown
    echo "Sorry, a database error occurred when querying the vehicle records. Please try again.<br> ";
    echo "Error details:". $ex->getMessage();
  }

  ?>

<!DOCTYPE html>
<html>
  <style>

  input[type=text], [type=datetime-local], select, textarea {
    width: 90%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }

  input[type=submit]:hover {
    background-color: #45a049;
  }

  .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }

  .updatebtn {
    padding: 14px 20px;
    background-color: #333;
    color: white;
  }



  /* Extra styles for the cancel button */


  </style>
  <div class="container">
  <form action="" method="post">
    <h2>Edit your event</h2>
    <input type="hidden" name="eventID" value="<?php echo $UID['eventID'];?>" />

    <label>Category   :</label>
    <input type="text" name="category" value="<?php echo $category; ?>" /><br>

    <label>Name   :</label>
    <input type="text" name="name" value="<?php echo $name; ?>" /><br>

    <label>Description   :</label>
    <input type="text" name="description" value="<?php echo $description; ?>" /><br>

    <label>Venue   :</label>
    <input type="text" name="venue" value="<?php echo $venue; ?>" /><br>

    <label>Date + Time   :</label>
    <input type="datetime-local" name="time" value="<?php echo $time?>" required /><br>

    <label>Contact Number   :</label>
    <input type="text" name="contactNumber" value="<?php echo $contactNumber; ?>" /><br>
    <p></p>
    <input type="submit" class="updatebtn" name="update" value="Update">
  </form>
</div>

  <?php
}
?>

<?php

// checks if anything is within variable, if not proceed to update the following columns within table.
if(isset($_POST['update'])){

  $category = $_POST["category"];
  $name = $_POST["name"];
  $description = $_POST["description"];
  $venue = $_POST["venue"];
  $time = $_POST["time"];
  $contactNumber = $_POST["contactNumber"];
  $likenessRating = $_POST["likenessRating"]; 	

  $viewID = $_SESSION['id'];

  $query1="UPDATE eventinformation
  SET category = '$category', name ='$name', description = '$description',
  venue = '$venue', time = '$time', contactNumber = '$contactNumber'
  WHERE eventID ='$UID'";

  $rows=$db->query($query1);
  // $run = mysqli_prepare($db, $query1);
  // echo $run;

  header('location: organiserEvents.php');
}
?>
</html>
