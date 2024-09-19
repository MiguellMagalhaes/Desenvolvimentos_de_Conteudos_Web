<?php // Localizações e caminhos/ Ligação com o phpmyadmin 	
session_start();
session_name();
include("config/database.php");

$role =  $_SESSION['status'];
if (!isset($_SESSION['email'])) {
	header("location:./");
}else if (isset($_SESSION['status'])) {
	if ($_SESSION['status'] == 0) {
		header("location:index.php");
	}
}

    if( $_SESSION['login'] == TRUE){

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
    // Definir e iniciar variaveis sem valor inicial.
    $eventnameErr = $event_typeErr = $datetimeErr = $statusErr = "";
    $EventName = $disabled = $event_type = $datetime = $status = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        //Descrição Evento
        if (empty($_POST["EventName"]))
        {
         
            $eventnameErr = "ERROR: Mandatory Field";
        } 
        else 
        {
   
            $EventName = test_input($_POST["EventName"]);
            // Verificar se o nome apenas contém letras (ã e õ) e espaços.
            if (!preg_match("/^[0-9a-zA-Z-'ãõç ]*$/",$EventName))
            {
      
                $eventnameErr = "ERROR: Use of caracters not allowed";
            }
        }

        //Data Hora de Evento
        if (empty($_POST["datetime"])) //datetime datahora
        {
           
            $datetimeErr = "ERROR: Mandatory Field";

        } 
        else 
        {
           
            $datetime = test_input($_POST["datetime"]);
        }

        //Tipo de Evento  
        
        if (empty($_POST["event_type"])) 
        {
            
            $event_typeErr = "ERROR: Mandatory Field";
        } 
        else 
        {
           
            $event_type = test_input($_POST["event_type"]);
        }

        //Status Evento  
        if (empty($_POST["status"])) 
        {
           
            $statusErr = "ERROR: Mandatory Field";
        } 
        else 
        {
            $status = test_input($_POST["status"]);
            $status = filter_input(INPUT_POST, "status", FILTER_VALIDATE_INT);
        }
        if ($eventnameErr == "" AND $datetimeErr == "" AND $statusErr == "")
    
        {
            $sql = "INSERT INTO eventis (EventName, datetime, event_type, status)
            VALUES ('$EventName', '$datetime', '$event_type', $status)";
            
            mysqli_query($conn, $sql);
            //Os valores são atribuidos às variáveis, substituindo os placeholders (?), pelos valores que pretendemos.
            //Prevenindo injeções de SQL.
            //Executa a query armazenada em $stmt.
            $disabled = "disabled";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <!--Permite usar uma vasta gama de caracteres -->
    <meta charset="UTF-8">
    <!--Faz depender a formatação da página, consoante o dispositivo utilizado -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
    <link rel="stylesheet" href="/system/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/system/css/style_edituser.css">
</head>
<body>
<div class="three">
    <div class="navbar">
            <ul>
                <li><a href="manageevents.php">Back</a></li>
            </ul>
    </div>
</div>
<p><span class="error"></span></p>

<!-- Formulário para inserir dados -->
<form name="novoRegEvento" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<div>
  <label for="EventName"> Description </label>
  <input type="text" name="EventName" id="EventName" value="<?php echo $EventName;?>" <?php echo $disabled; ?>>
  <span class="error">* <?php echo $eventnameErr;?></span>
</div>
<br>
<div>
    <label for="datetime"> Date & Time: </label>
    <input type="datetime-local" id="datetime" name="datetime" REQUIRED <?php echo $disabled; ?>>
    <span class="error">* <?php echo $datetimeErr;?></span>
    <br><br>
</div>
<div>
    <input type="radio" id="event_type1" name="event_type" value="Sports" <?php echo $disabled; ?>>
    <label for="event_type1"> Sports </label>
</div>
<div>
    <input type="radio" id="event_type2" name="event_type" value="Movies" <?php echo $disabled; ?>>
    <label for="event_type2"> Movies </label>
</div>
<div>
    <input type="radio" id="event_type3" name="event_type" value="Arts" <?php echo $disabled; ?>>
    <label for="event_type3"> Arts </label>
</div>
<div>
    <input type="radio" id="event_type4" name="event_type" value="StandUp" <?php echo $disabled; ?>>
    <label for="event_type4"> StandUp </label>
</div>
<br>
<div>
    <label for="status1"> Status: </label>
            <input type="radio" name="status" id="status1" value="1" <?php echo $disabled; ?>> Active
            <label for="status2"></label>
            <input type="radio" name="status" id="status2"  value="2" <?php echo $disabled; ?>> Disabled
            <br><br>
</div>
<div>
    <input type="submit" name="submit" value="Add" <?php echo $disabled ?>>
</div>
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" AND $eventnameErr == "" AND $event_typeErr == "" AND $datetimeErr == "" AND $statusErr == "")
    {
		print "<font color='green'>Data added successfully.";
		print "<br/><a href='manageevents.php'>View Result</a>";
?>

<?php
    }
?>
    
</body>
</html>

<?php 
mysqli_close($conn);
} 
else
{
    header ('Location: login.php');
}
?>