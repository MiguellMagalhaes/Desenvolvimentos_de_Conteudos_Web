<?php
// Incluir o ficheiro de ligação à base de dados
session_start();
session_name();
$role =  $_SESSION['status'];
if (!isset($_SESSION['email'])) {
	header("location:./");
}else if (isset($_SESSION['status'])) {
	if ($_SESSION['status'] == 0) {
		header("location:manageevents_usermode.php");
	}
}
include_once("config/database.php");



$num_per_page=4; //4 objetos


if(isset($_GET["page"]))
{
	$page=$_GET["page"];
}
else
{
	$page=1;
}

$start_from=($page-1)*4;

$mysqlii="select * from eventis limit $start_from,$num_per_page";
$result=mysqli_query($conn, $mysqlii);
?>
<!DOCTYPE html>
<html lang="pt">
<head>	
	<title>Manage Events</title>
	<link rel="stylesheet" href="/system/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/system/css/style_edituser_usermode.css">
</head>
	<body>
<div class="three">
    <div class="navbar">
            <ul>
                <li><a href="adminpanel.php">Back</a></li>
            </ul>
    </div>
</div>
<br><br>
<div class="six">
	<form action="add_events.php" name="form1">
	<input type="submit" name="Submit" value="Add New Event">
</form>
<div class="quatro">
<table width='80%' border=1>
	<tr bgcolor='#CCCCCC'>
		<td class="center-text">Event Title</td>
		<td class="center-text">Event Type</td>
		<td class="center-text">Update</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		print "<tr>";
		print "<td>".$res['EventName']."</td>";
        print "<td>".$res['event_type']."</td>";
		print "<td><a href=\"editevents.php?id=$res[id]\">Edit</a> | <a href=\"subscriptions.php?id=$res[id]\">Subscribe</a> | <a href=\"deletevent.php?id=$res[id]\">Delete</a></td>";		
	}
	?>
	

	</table><br>
	
	<?php 
    
    
    $mysqlii="select * from eventis";
    $result=mysqli_query($conn, $mysqlii);
    $total_records=mysqli_num_rows($result);
    $total_pages=ceil($total_records/$num_per_page);
    
    for($i=1;$i<=$total_pages;$i++)
    {
        echo "<a href='manageevents.php?page=".$i."'> ".$i."</a>" ;
    }
    
    ?>
</div>
</body>
</html>
