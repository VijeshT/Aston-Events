<?php include('navbar.php');?>
<?php include('footer.php');?>

<!DOCTYPE html>
<html>
<style>
table {
  border-collapse: collapse;
  table-layout: auto;
  width: 100%;
}

#moreEvents td, #moreEvents th {
  border: 1px solid #ddd;
  padding 8px;
}

#moreEvents tr:nth-child(even) {
  background-color: #f2f2f2;
}

#moreEvents tr:hover {
  background-color: #ddd;
}

#moreEvents th {
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
<form>
  <table id="moreEvents">
    <tr>
      <th>Name</th>
      <th>Venue</th>
      <th>Contact Number</th>
    </tr>
    <tr>


      <?php
      include("connectdb.php");
      $UID = $_GET['viewmore'];
      if(isset($_GET['viewmore'])){
        $sqlstr = "SELECT * FROM eventinformation WHERE eventID = '$UID'";
        $rows=$db->query($sqlstr);

        try{
          foreach ($rows as $row) {
            // $event_info = mysql_fetch_assoc($row);
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['venue'] . '</td>';
            echo '<td>' . $row['contactNumber'] . '</td>';
          }
        } catch (PDOException $ex){
          //this catches the exception when the query is thrown
          echo "Sorry, a database error occurred when querying the vehicle records. Please try again.<br> ";
          echo "Error details:". $ex->getMessage();
        }
      }
      // $date = str_replace(" ", "T", $time["time"]);
      ?>
      </tr>
    </table>
  </form>
</html>
