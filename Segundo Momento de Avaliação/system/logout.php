<?php
session_start();

if($_SESSION['login'] == TRUE){
    unset($_SESSION['email']);
    unset($_SESSION['status']);
    unset($_SESSION['id']);
    unset($_SESSION['isactive']);
    unset($_SESSION['username']);
    session_unset();
    session_destroy();
}
 // Localizações e caminhos/ Ligação com o phpmyadmin 	
header  ('Location: index.php');
?>