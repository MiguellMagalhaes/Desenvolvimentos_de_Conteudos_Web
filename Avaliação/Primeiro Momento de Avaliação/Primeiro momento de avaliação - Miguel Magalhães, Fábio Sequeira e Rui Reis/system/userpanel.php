<?php
//W3C TESTED
session_start();
session_name();
$role =  $_SESSION['status'];
if (!isset($_SESSION['email'])) {
    header("location:./");
}else if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 1) {
        header("location:adminpanel.php");
    }
}

?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width. initial-scale-1.0">
    <title>User Panel</title> 
    <link rel="stylesheet" href="/system/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/system/css/style_userpanel.css">
    </head>
<body>

<div class="three">
    <div class="banner">
    <section class="userpanel-header">
    <div class="navbar">
        <img src="user_panel_img.png" alt="So parra corrigir"> class="logo"> 
            <ul>
                <li><a href="logout.php" onClick="return confirm('Are you sure you want to logout?\nThis action cannot be undone!')">Logout</a></li>
            </ul>
        </div>
        </section>
    </div>
</div>


<div class="one">
    <a href="edit_usermode.php?id=<?php print $_SESSION['id']?>" >Edit Settings</a><br><br>
</div>

<div class="two">
        <a href="manageevents_usermode.php" >Join Events</a><br><br>
</div>


</body>
</html>