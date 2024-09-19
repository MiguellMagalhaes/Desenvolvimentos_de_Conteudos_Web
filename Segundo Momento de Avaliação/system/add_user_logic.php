<html>
<head>
	<title> Adicionar Informação </title>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
</head>

<body>
<?php
//Incluir a pasta "database"
include_once("config/database.php");




if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	//				<td><input type="checkbox" name="check1" value="false"></td>
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$role = $_POST['check1'];
	$isactive = $_POST['check2'];
	//print $role;
	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
	// Ver espaços vazios
	if(empty($name) || empty($age) || empty($email)){
		if(empty($name)) {
			print "<font color='red'>ERROR: Name field is empty.</font><br/>";
		}
		if(empty($age)) {
			print "<font color='red'>ERROR: Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			print "<font color='red'>ERROR: Email field is empty.</font><br/>";
		}
		
		// Colocar um link sobre a página anterior
		print "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// Verificar se todos os campos estão preenchidos e nenhum destes está vazio
			
		// Inserir a data para a base de dados	
		$result = mysqli_query($conn, "INSERT INTO users(name,password,age,email,status,isactive) VALUES('$name','$hashedPwd','$age','$email','$role','$isactive')");
		
		// Visualizar a imagem de "sucesso!"
		print "<font color='green'>Data added successfully.";
		print "<br/><a href='manageusers.php'>View Result</a>";
	}
}
?>
</body>
</html>
