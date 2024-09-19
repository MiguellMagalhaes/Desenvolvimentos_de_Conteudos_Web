<?php
// Incluir o arquivo de conexão com o banco de dados
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
include_once("config/database.php");

if(isset($_POST['update']))
{   

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);   
    $role = $_POST['check1'];
    $isactive = $_POST['check2'];
    // Verificar campos vazios
    if(empty($name) || empty($age) || empty($email)) {  
            
        if(empty($name)) {
            print "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            print "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            print "<font color='red'>Email field is empty.</font><br/>";
        }
    } else {    
        // Atualizando a tabela
        // $string = "UPDATE users SET name='" . $name . "', age=" . $age . ", email='" . $email . "', status=" . $role . " WHERE id=" . $id;
        $string = "UPDATE users SET name='". $name ."', age=" . $age .", email='" . $email ."', status='" . $role ."', isactive=" . $isactive ." WHERE id=" . $id;
		$result = mysqli_query($conn, $string);

        //Redirecionando para a página de exibição. No nosso caso, é index.php
        header("Location: manageusers.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");


while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $age = $res['age'];
    $email = $res['email'];
    $status = $res['status'];
    $isactive = $res['isactive'];
}

$string = "SELECT status FROM users WHERE id=" . $id;
$result = mysqli_query($conn, $string);
$string1 = "SELECT isactive FROM users WHERE id=" . $id;
$result1 = mysqli_query($conn, $string1);
?>
<!DOCTYPE html>
<html lang="pt">
<head>  
    <title> Editar Utilizador </title>
    <link rel="stylesheet" href="\system\bootstrap-5.3.0-alpha1-dist\css\bootstrap.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <link rel="stylesheet" href="\system\css\style_edituser.css">
</head>
</head>
<style>
        
         table {
            width: 10%;
            margin: 20px auto; 
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align:center ;
            border: 1px;   
        }
    </style>
</head>

<body>
<div class="three">
    <div class="navbar">
            <ul>
                <li><a href="manageusers.php"> Voltar </a></li>
            </ul>
    </div>
</div>
<br><br>

    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td> Nome </td>
                <td><input type="text" name="name" value="<?php print $name;?>"></td>
            </tr>
            <tr> 
                <td> Idade </td>
                <td><input type="text" name="age" value="<?php print $age;?>"></td>
            </tr>
            <tr> 
                <td> Email </td>
                <td><input type="email" name="email" value="<?php print $email;?>"></td>
            </tr>
            <tr>
            <td> Função </td>
<?php
    $string = "SELECT status FROM users WHERE id=" . $_GET['id'];
    $result = mysqli_query($conn, $string);
    $value = mysqli_fetch_array($result);
?>
<td>
    <input type="radio" name="check1" value="1" <?php echo($value['status'] == 1) ? "checked" : ""; ?>> Admin
    &nbsp;&nbsp;&nbsp; <!-- Adicionando espaços -->
    <input type="radio" name="check1" value="0" <?php echo($value['status'] == 0) ? "checked" : ""; ?>> Utilizador
</td>
            </tr>
            <tr>
            <td> Disponível </td>
<?php
    $string1 = "SELECT isactive FROM users WHERE id=" . $_GET['id'];
    $result1 = mysqli_query($conn, $string1);
    $value1 = mysqli_fetch_array($result1);
?>
<td>
    <input type="radio" name="check2" value="1" <?php echo($value1['isactive'] == 1) ? "checked" : ""; ?>> Sim
    &nbsp;&nbsp;&nbsp; <!-- Adicionando espaços -->
    <input type="radio" name="check2" value="0" <?php echo($value1['isactive'] == 0) ? "checked" : ""; ?>> Não
</td>
</tr>

            <tr>
                <td><input type="hidden" name="id" value=<?php print $_GET['id'];?>></td>
                <td><input type="submit" name="update" value=" Guardar "></td>
            </tr>
        </table>
    </form>
</body>
</html>