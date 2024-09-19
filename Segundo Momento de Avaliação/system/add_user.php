<?php
session_start();
session_name();
$role =  $_SESSION['status'];
if (!isset($_SESSION['email'])) {
    header("location:./");
} else if (isset($_SESSION['status'])) {
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
    <title> Adicionar Utilizador </title>
    <link rel="stylesheet" href="/system/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <link rel="stylesheet" href="/system/css/style_edituser.css">
</head>
<body>
<style>
        body {
            text-align: center;
        }

        .navbar {
            text-align: left;
        }

        table {
            width: 10%;
            margin: 20px auto; /* Adicionei uma margem para melhor visualização */
            
        }

        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
    
<div class="three">
    <div class="navbar">
        <ul>
            <li><a href="manageusers.php">Voltar</a></li>
        </ul>
    </div>
</div>
<br><br>

<form action="add_user_logic.php" method="post" name="form1">
    <table>
        <tr>
            <td>Nome</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Idade</td>
            <td><input type="text" name="age"></td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td>
                <input type="radio" name="check1" value="1" <?php if($role == '0') echo 'checked'; ?>> Admin
                <input type="radio" name="check1" value="0" <?php if($role == '0') echo 'checked'; ?>> Utilizador
            </td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Guardar"></td>
        </tr>
    </table>
</form>
</body>
</html>
