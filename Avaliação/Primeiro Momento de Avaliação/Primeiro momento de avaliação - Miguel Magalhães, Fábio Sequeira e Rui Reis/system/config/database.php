<?php
$databaseHost = 'localhost';
$databaseName = 'testy';
$databaseUsername = 'root';
$databasePassword = '';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if(!$conn){
	die("ERROR: Connection failed: ". mysqli_connect_error());
}

?>
<!-- Para usar outros tipos de encriptação, colocar o seguinte código no SQL: UPDATE users SET senha = 'nova_senha_criptografada' WHERE id = 1; -->
 