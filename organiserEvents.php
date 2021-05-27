<?php include('navbar.php')?>
<?php include('footer.php'); ?>

<?php $db = mysqli_connect("localhost", "tharmabv", "HeRLp2Mi86gvsPmK", "tharmabv_db"); //127.0.0.1 ?>

<style>
table {
  border-collapse: collapse;
   border: 1px solid black;
  table-layout: auto;
  width: 100%;
}

 th,td {
  border: 1px solid black;
}

#yourEvents td, #events th {
  padding 8px;
}

#yourEvents tr:nth-child(even) {
  background-color: #f2f2f2;
}

#yourEvents tr:hover {
  background-color: #ddd;
}

#yourEvents th {
  /* padding-top: 12px;
  padding-bottom: 12px; */
  text-align: left;
  background-color: #a9a9a9;
  color: white;
}

</style>

<h1>Your Events</h1>
<form action="organiserEvents.php" method ="post">
<table id="yourEvents">
  <tr>
    <th>Category</th>
    <th>Name</th>
    <th>Description</th>
    <th>Venue</th>
    <th>Time</th>
    <th>Contact Number</th>
    <th>Picture</th>
    <th>Likeness Rating</th>
    <th>Action</th>
  </tr>

<?php

$viewID = $_SESSION['id'];
$query = "SELECT * FROM eventinformation WHERE orgID='$viewID'";

foreach ($db->query($query) as $data){
  echo "<tr>";
  echo "<td>".$data['category']."</td>";
  echo "<td>".$data['name']."</td>";
  echo "<td>".$data['description']."</td>";
  echo "<td>".$data['venue']."</td>";
  echo "<td>".$data['time']."</td>";
  echo "<td>".$data['contactNumber']."</td>";
  echo "<td>".$data['picture']."</td>";
  // echo "<td>"  '<img src="data:image/png;base64,'.base64_encode($blob).'"/>'  "</td>";
  echo "<td>".$data['likenessRating']."</td>";
  echo "<td><a name='edit' href='editEvent.php?edit=$data[eventID]'>Edit</a>
  <br/>
  <a name='Delete' href='deleteEvent.php?del=$data[eventID]'>Delete</a></td>";
  echo "</tr>";

  echo "</tr>";
}

?>
<table>
</form>
