<?php
// Incluir o ficheiro de ligação à base de dados
include("config/database.php");

//Obter o ID dos dados a partir do URL
$id = $_GET['id'];

//Eliminar a linha da tabela
$sql= "SELECT * FROM userevents WHERE user_events_id=" . $id;
$result = mysqli_query($conn, $sql);

if ($result == $id) {
    print("ERROR");
} else{
    $result = mysqli_query($conn, "DELETE FROM users WHERE id=" . $id);
}



//Redirecionar para a página de visualização (index.php, no nosso caso)
header("Location:manageusers.php");
?>

