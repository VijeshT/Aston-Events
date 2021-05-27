<?php include('navbar.php');?>
<?php include('footer.php'); ?>

<style>
table {
  border-collapse: collapse;
  table-layout: auto;
  width: 100%;
}

#events td, #events th {
  border: 1px solid #ddd;
  padding 8px;
}

#events tr:nth-child(even) {
  background-color: #f2f2f2;
}

#events tr:hover {
  background-color: #ddd;
}

#events th {
  /* padding-top: 12px;
  padding-bottom: 12px; */
  text-align: left;
  background-color: #a9a9a9;
  color: white;
}


.btn {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.btn:hover {
  background-color: #555555;
  color: white;
}

</style>
<!-- Sorting Events in order of popularity (Likeness Rating - Descending) -->
<?php
if (isset($_POST['Sport']))
{
  $query = "SELECT eventID, name, description, category, time, likenessRating FROM eventinformation WHERE category='Sport'";
  $result = filterSelection($query);
}
elseif (isset($_POST['Culture']))
{
  $query = "SELECT eventID, name, description, category, time, likenessRating FROM eventinformation WHERE category='Culture'";
  $result = filterSelection($query);
}
elseif (isset($_POST['Other']))
{
  $query = "SELECT eventID, name, description, category, time, likenessRating FROM eventinformation WHERE category='Other'";
  $result = filterSelection($query);
}
elseif (isset($_POST['Date']))
{
  $query = "SELECT eventID, name, description, category, time, likenessRating FROM eventinformation ORDER BY time DESC";
  $result = filterSelection($query);
}
elseif (isset($_POST['likenessRating']))
{
  $query = "SELECT eventID, name, description, category, time, likenessRating FROM eventinformation ORDER BY likenessRating DESC";
  $result = filterSelection($query);
}
else{
  $query = "SELECT eventID, name, description, category, time, likenessRating FROM eventinformation";
  $result = filterSelection($query);
}

function filterSelection($query){
  $db = mysqli_connect("localhost", "tharmabv", "HeRLp2Mi86gvsPmK", "tharmabv_db"); //127.0.0.1
  $result = mysqli_query($db, $query);
  return $result;
}
?>
<form action="page-events.php" method ="post">
  <div id="filterBtns">
  </br>
    <p>SORT BY: </p>
    <button class="btn active" name="Show All"> View all Events </button>
    <button class="btn" name="Sport"> Sport</button>
    <button class="btn" name="Culture"> Culture</button>
    <button class="btn" name="Other"> Other</button>
    <button class="btn" name="Date"> Date</button>
    <button class="btn" type="submit" name="likenessRating">
    Likeness Ranking
  </button>
  </div>
<!-- Lists basic information -->
<table id="events">
</br>
  <tr>
    <th>Event Number</th>
    <th>Name</th>
    <th>Description</th>
    <th>Category</th>
    <th>Time</th>
    <th>Likeness Rating</th>
    <th>Additional Info</th>
  </tr>

  <?php
    while($row = mysqli_fetch_array($result)): ?>
    <tr>
      <td><?php echo $row[0]; ?></td>
      <td><?php echo $row[1]; ?></td>
      <td><?php echo $row[2]; ?></td>
      <td><?php echo $row[3]; ?></td>
      <td><?php echo $row[4]; ?></td>
      <td><?php echo $row[5]; ?></td>
      <td><a name='viewmore' href='viewMoreDetails.php?viewmore=<?php echo $row['eventID']?>'>View more</a></td>
    </tr>
  <?php endwhile; ?>
</table>
</form>
