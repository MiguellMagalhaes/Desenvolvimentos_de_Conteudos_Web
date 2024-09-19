<?php
session_start();
session_name();
$role =  $_SESSION['status'];
if (!isset($_SESSION['email'])) {
    header("location:./");
}else if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 0) {
        header("location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Data</title>
    <link rel="stylesheet" href="/system/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/system/css/style_edituser.css">

</head>
<body>
<div class="three">
    <div class="navbar">
            <ul>
                <li><a href="manageusers.php">Back</a></li>
            </ul>
    </div>
</div>
<br><br>
<?php $check1=0;?>
<?php $check2=0;?>
    <form action="add_user_logic.php" method="post" name="form1">

        <table>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password"></td>
                <td></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="email" name="email"></td>
                <td></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="age"></td>
                <td></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><input type="radio" name="check1" value="1"> <?php if($check1 == '1')?>Admin</td>
                <td><input type="radio" name="check1" value="0"> <?php if($check1 == '0')?>User</td>
            </tr>
            <tr>
                <td>Status</td>
                <td><input type="radio" name="check2" value="1"> <?php if($check2 == '1')?>Active</td>
                <td><input type="radio" name="check2" value="0"> <?php if($check2 == '0')?>Disabled</td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>