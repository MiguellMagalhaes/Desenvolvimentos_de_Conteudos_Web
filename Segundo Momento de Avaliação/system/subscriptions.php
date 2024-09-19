<?php
session_start();
session_name();
Include("config/database.php");

if($_SESSION["login"] == TRUE)
{
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<style>
				.error {color: #FF0000;}
			</style>
			<meta charset="UTF-8">
			<meta name="viewport" content="width-device-width. initial-scale-1.0">
			<title> Confirmar Subscrição </title>
			<link rel="stylesheet" href="\system\bootstrap-5.3.0-alpha1-dist\css\bootstrap.min.css">
			<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    		<link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    		<link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    		<link rel="stylesheet" href="\system\css\style_subscribe.css">
			</div>
		<body>
		<div class="three">
    <div class="navbar">
            <ul>
                <li><a href="manageevents.php"> Voltar </a></li>
            </ul>
    </div>
</div>
		<?php 
		$EventsID = $_GET['id'];
		$sql1 = "SELECT eventis.EventName FROM eventis WHERE id = ". $EventsID ." AND status = 1";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);

		//users
		$sql = "SELECT * FROM users WHERE status = 0 AND isactive = 1";
		$result = mysqli_query($conn, $sql);
		?>
		<div class="quatro">
		<table width='80%' border=1>
		<tr bgcolor='#CCCCCC'>
		<td> Nome do Evento </td>
		<td> Nome </td>
		<td> Email </td>
		<td> Confirmar Subscrição </td>
		</tr>
			<?php while ($row = mysqli_fetch_assoc($result)){?>
			<tr>
				<td> <?php print $row1 ['EventName'];?></td>
				<td> <?php print $row ['name'];?></td>
				<td> <?php print $row ['email'];?></td>
				<td> <a href="confirmsub.php?id=<?php print $row['id']; ?>&events_id=<?php print $EventsID;?>" onClick="return confirm('Are you sure you want to assign this user to this event?')">Confirm Subscription</a>
			</tr>
			<?php }?>
		</table>
		</head>
		</body>
	</html>
<?php
}
?>