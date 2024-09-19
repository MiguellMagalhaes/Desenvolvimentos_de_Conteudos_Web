<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Projeto</title>
        <link rel="icon" href="./favicon.ico" type="image/x-icon">
    </head>
    <body>
       <nav>
        <div class="wrapper">
            <a href="index.php"><img src="test/image/logowhite.png" alt="Blogs logo"></a>
            <ul>
                <li><a href="adminpanel.php">Home</a></li>
                <li><a href="discover.php">About Us</a></li>
                <li><a href="blog.php">Find Blogs</a></li>
                <?php
                    if (isset($_SESSION["useruid"])) {
                        print "<li><a href='profile.php'>Profile page</a></li>";
                        print "<li><a href='logout.php'>Log out</a></li>";
                    } else {
                        print "<li><a href='signup.php'>Sign up</a></li>";
                        print "<li><a href='login.php'>Log in</a></li>";

                    }
                ?>
            </ul>
       </nav> 
<div class ="wrapper">
    