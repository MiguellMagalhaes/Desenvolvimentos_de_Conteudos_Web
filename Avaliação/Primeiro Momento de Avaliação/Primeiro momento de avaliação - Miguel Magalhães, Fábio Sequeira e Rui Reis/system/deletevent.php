<?php
session_start();
//Incluir o ficheiro de ligação à base de dados
if($_SESSION['login'] == TRUE) {
include("config/database.php");

//Obter o ID dos dados a partir do URL
$id = $_GET['id'];

$query = "SELECT * FROM userevents WHERE events_user_id = $id";
$result1 = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result1);

if($row['events_user_id'] == $id) {
    print "It's not possible to delete this event. There's useres assigned to it.";
} else {
    $query1= "DELETE FROM eventis WHERE id=$id";
    mysqli_query($conn, $query1);
    header("location: manageevents.php");
    mysqli_close($conn);
}
}
else {
    header ("location: login.php");
}


//Redirecionar para a página de exibição (index.php no nosso caso)
header("Location:manageevents.php");
?>

