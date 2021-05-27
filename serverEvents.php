<?php
if (isset($_POST['add_event'])) {

  include("connectdb.php"); 

    session_start();

  //intialising variables
  // $eventID = $_SESSION['eventID'];
  $name = ($_POST['name']);
  $description = ($_POST['description']);
  $category = ($_POST['category']);
  $venue = ($_POST['venue']);
  $time = ($_POST['time']);
  $contactNumber = ($_POST['contactNumber']);
  $picture = ($_POST['picture']);
  $id = $_SESSION['id'];

  //Allows for picture to be uploaded to the databse
  if (isset($_FILES['images']) && ($_FILES['image']['size'] > 0)) {

      $tmpName = $_FILES['image']['tmp_name'];
      $fp = fopen($tmpName, 'r');
      $data = addlashes($data);
      fclose($fp);

  }
  try{
 // use the form data to create a insert SQL and  add an event record
 $sth=$db->prepare("INSERT INTO eventinformation(orgID, name, description,
    category, venue, time, contactNumber, picture)
 VALUES ('$id','$name', '$description', '$category',
   '$venue', '$time', '$contactNumber', '$picture')");
 $sth->execute(array($id, $name, $description, $category,
   $venue, $time, $contactNumber, $picture));
 header('location:addEvent.php');
} catch (PDOException $ex){
 //this catches the exception when it is thrown
 echo $ex->getMessage();
 echo $id;
}
}
 ?>
