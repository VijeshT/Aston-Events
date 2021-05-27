<!-- Connection to database through prepared statements -->

<?php
$host='localhost';
$username='tharmabv';
$password='HeRLp2Mi86gvsPmK';
$dbname='tharmabv_db';

try{
$db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Adding an Event
}catch (PDOException $e){
  echo "CONNECTION TO db FAILED";
}
?>
