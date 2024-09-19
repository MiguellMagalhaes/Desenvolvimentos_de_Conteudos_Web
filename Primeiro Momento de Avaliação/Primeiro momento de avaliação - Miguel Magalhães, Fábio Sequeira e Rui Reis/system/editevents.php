<?php
    //Inicio de sessão
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

    include ("config/database.php");

    if( $_SESSION['login'] == TRUE)
{

        function test_input($data) 
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    // Definir e iniciar variaveis sem valor inicial.
    $eventnameErr = $event_typeErr = $datetimeErr = $statusErr = "";
    $EventName = $disabled = $event_type = $datetime = $status = "";

    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        //Descrição Evento
        if (empty($_POST["EventName"])) 
        {
            $eventnameErr = "Mandatory field";
        } 
        else 
        {
            $EventName = test_input($_POST["EventName"]);
            // Verificar se o nome apenas contém letras (ã e õ) e espaços.
            if (!preg_match("/^[0-9a-zA-Z-'ãõç ]*$/",$EventName))
            {
                $eventnameErr = "Unauthorized characters used";
            }
        }

        //Data Hora de Evento
        if (empty($_POST["datetime"])) 
        {
            $datetimeErr = "Mandatory field";
        } 
        else 
        {
            $datetime = test_input($_POST["datetime"]);
        }

        //Tipo de Evento  
        if (empty($_POST["event_type"])) 
        {
            $event_typeErr = "Campo Obrigatório";
        } 
        else 
        {
            $event_type = test_input($_POST["event_type"]);
        }

        //Status Evento  
        if (empty($_POST["status"])) 
        {
            $statusErr = "Mandatory Camp";
        } 
        else 
        {
            $status = test_input($_POST["status"]);
            $status = filter_input(INPUT_POST, "status", FILTER_VALIDATE_INT);
        }

        if(isset($_POST['update'])){
            $disabled = "disabled";
        }

        if ($eventnameErr == "" AND $datetimeErr == "" AND $statusErr == "" AND $event_typeErr =="")
        {
            //Query para efetuar udate dos valores onde o id é igual ao passado pelo método GET.
            $query = "UPDATE eventis SET EventName='". $EventName ."', datetime='". $datetime ."', status= ". $status . ", event_type='". $event_type ."' WHERE id =" . $id;
            $result = mysqli_query ($conn, $query);
        }
    }
            //SELECT para pré preencher a tabela com os valores atuais.
            $query = "SELECT * FROM eventis WHERE id=" .  $id;
            $result = mysqli_query ($conn, $query);
            $row = mysqli_fetch_assoc ($result);
?>

<!DOCTYPE html>
<html lang=pt>
<head>
    <!--Permite usar uma vasta gama de caracteres -->
    <meta charset="UTF-8">
    <!--Faz depender a formatação da página, consoante o dispositivo utilizado -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event Data</title>
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
<br><br>
        

<!-- Formulário para inserir dados -->
<form name="form2" method="post" action="editevents.php?id=<?php print $_GET['id'] ?>"> 
<div>
  <?php print $eventnameErr;?>
  <label for="EventName"> Event description: </label>
  <input type="text" name="EventName" id="EventName" value="<?php print $row['EventName'];?>" <?php print $disabled; ?>>
</div>
<br>
<div>
    <?php print $datetimeErr;?>
    <label for="datetime"> Date & Time: </label>
    <input type="datetime-local" name="datetime" id="datetime" value = "<?php print $row['datetime']?>" <?php print $disabled; ?>>
    <br><br>
</div>
<div>
<h4><?php print $event_typeErr;?>Event Type:</h4>
</div>
<div>
    <input type="radio" id="event_type1" name="event_type" value="Sports" 
    <?php print($row['event_type'] == 'Sports') ? "checked" : "";
    print $disabled; ?>>
    <label for="event_type1"> Sports </label>
</div>
<div>
    <input type="radio" id="event_type2" name="event_type" value="Movies" 
    <?php print($row['event_type'] == 'Movies') ? "checked" : "";
    print $disabled; ?>>
    <label for="event_type2"> Movies </label>
</div>
<div>
    <input type="radio" id="event_type3" name="event_type" value="Arts" 
    <?php print($row['event_type'] == 'Arts') ? "checked" : "";
    print $disabled; ?>>
    <label for="event_type3"> Arts </label>
</div>
<div>
    <input type="radio" id="event_type4" name="event_type" value="StandUp" 
    <?php print($row['event_type'] == 'StandUp') ? "checked" : "";
    print $disabled; ?>>
    <label for="event_type4"> StandUp </label>
</div>
<br>
<div>
    <?php print $statusErr;?>
    <label for="status1"> Event Status: </label>
            <input type="radio" name="status" id="status1" value="1" 
            <?php print($row['status'] == 1) ? "checked" : "";
            print $disabled; ?>> Active
    <label for="status2"></label>
            <input type="radio" name="status" id="status2"  value="2" 
            <?php print($row['status'] == 2) ? "checked" : "";
            print $disabled; ?>> Disabled
            <br><br>
</div>
<div>
    <input type="submit" name="update" value="Update" <?php print $disabled ?>>
</div>
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" AND $eventnameErr == "" AND $event_typeErr == "" AND $datetimeErr == "" AND $statusErr == "")
    {
?>
        <div>
        <?php print"<font color='green'>Event updated successfully.</p>";?>
        </div>
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