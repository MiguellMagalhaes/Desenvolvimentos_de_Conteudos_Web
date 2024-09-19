<?php
Include("config/database.php");

$events_id= $_GET['events_id'];
$id= $_GET['id'];
$sql="INSERT INTO userevents (user_events_id, events_user_id)
VALUES ($id, $events_id)";
$result= mysqli_query($conn, $sql);
?>