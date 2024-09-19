<?PHP
//inicializar sessão
session_start();

// codificação de caracteres
ini_set('default_charset', 'ISO8859-1');

if( $_SESSION['login'] == TRUE){

// estabelecer a ligação com a  base de dados
include ("config/database.php");

if(isset ($_POST['search'])) {
	$query = "SELECT * FROM users WHERE name LIKE '%$_POST[search]%' OR email LIKE '%$_POST[search]%'";
	$result = mysqli_query ($conn, $query);	
} else {
	$query = "SELECT * FROM users";
	$result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="pt">

  <head>
	  <meta http-equiv="content-type" content="text/html; charset=ISO8859-1">
    <meta charset="ISO8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- colocar aqui a referência ao ficheiro de estilos -->
    <link href="" rel="stylesheet">
    <title>EXEMPLO PARA GEST&Atilde;O DA BASE DE DADOS</title>
    <link rel="stylesheet" href="\system\bootstrap-5.3.0-alpha1-dist\css\bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="\system\css\style_managerusers1.css">
  </head>

  <body>
    <header>
      <!-- navbar -->
      <div class="three">
    <div class="navbar">
            <ul>
                <li><a href="adminpanel.php">Back</a></li>
            </ul>
	<ul></ul>
    </div>
</div>
      <!-- /.navbar -->
    </header>

    <main>     
      <div><!-- contentor -->   
        <div > <!-- titulo -->
        

        <div> <!-- info -->
            <p>Foram encontrado(s) <?PHP echo mysqli_num_rows ($result)?> registo(s).</p>
        </div>

        <div> <!-- listagem -->
        <form class="UserSearch" method="post" action="find_user_logic.php">
  <input type="text" placeholder="Search..." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
<div class="quatro">
	<table width='100%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Type</td>
		<td>Status</td>
		<td>Update</td>
	</tr>
				<?php 
        while ($res = mysqli_fetch_assoc ($result)) { 
        print "<tr>";
        print "<td>".$res['id']."</td>";
        print "<td>".$res['name']."</td>";
        print "<td>".$res['email']."</td>";
        print "<td>".$res['status']."</td>";
        print "<td>".$res['isactive']."</td>";
        print "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?\\nThis action cannot be undone!')\">Delete</a></td>";		


        /*print "<td> $res ["id"]</td>";
        print "<td> $res ["name"]</td>";
        print "<td>".$res['name']."</td>";
        print "<td> $res ["email"]</td>";
        print "<td>".$res['name']."</td>";
        print "<td> $res ["id"]</td>";
        print "<td><a href="edit.php?id=$res ["id"]">Edit</a></td>";
        print "<td> $res ["id"]</td>";
        print "</tr>";
				print"
				<td><a href="edit.php?id=<?PHP echo $row ["id"]?>">Edit</a></td>
				<td><a \href="delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?\\nThis action cannot be undone!')\"">Delete</a></td>;*/
      print "</tr>";
				} 
        ?>
			</table>

      </div><!-- /.listagem -->
      </div><!-- /.container -->
    </main>
</body>
</html>
<?php
// fechar a ligação com a base de dados
mysqli_close ($conn);

} else {
  header ('Location: login.php');
} 
?>
    

