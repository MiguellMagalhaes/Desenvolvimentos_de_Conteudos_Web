<?php
// Incluir o arquivo de conexão com o banco de dados
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
include_once("config/database.php");

if(isset($_POST['update']))
{   

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);   
    // Verificando campos vazios
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
        $string = "UPDATE users SET name='". $name ."', age=" . $age .", email='" . $email ."' WHERE id=" . $id;
		$result = mysqli_query($conn, $string);

        //Redirecionando para a página de exibição. No nosso caso, é o index.php
        header("Location: userpanel.php");
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
}


?>
<!DOCTYPE html>
<html lang="pt">
<head>  
    <title>Edit User Data</title>
    <link rel="stylesheet" href="/system/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/system/css/style_edituser_usermode.css">

</head>
<body>
<div class="three">
    <div class="navbar">
            <ul>
                <li><a href="userpanel.php">Back</a></li>
            </ul>
    </div>
</div>
<br><br>
    
    <form name="form1" method="post" action="edit_usermode.php">
        <div class="quatro">
        <table>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php print $name;?>"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="age" value="<?php print $age;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="email" name="email" value="<?php print $email;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php print $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Save"></td>
            </tr>
        </table>
        </div>
    </form>
</body>
</html>

