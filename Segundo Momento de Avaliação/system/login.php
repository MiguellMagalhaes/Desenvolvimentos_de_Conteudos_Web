<?php
//inicializar sess�o
session_start();
session_name();
// codifica��o de carateres
ini_set('default_charset', 'utf-8');

// inicializa��o de vari�veis
$passwordErr = $emailErr = $autErr = "";
$password = $email = $role = "";

// estabelecer a liga��o � base de dados
include ("config/database.php");

// verifica se foi inserido c�digo
function test_input($dados) {
	$dados = trim($dados);
	$dados = stripslashes($dados);
	$dados = htmlspecialchars($dados);
	return $dados;
  }
  

if( !empty( $_SESSION['login'] )){
    header ('Location: index.php');
} else {

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["email"])) {
      $emailErr = "PF digite o Email!";
    } else {
      //$email = mysqli_real_escape_string($conn, filter_var($_POST['email']));
      $email = test_input(mysqli_real_escape_string($conn, filter_var($_POST['email'])));
      // verifica o formato do email
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid Email format!";
      }
    }
  

    if (empty($_POST["password"])) {
      $passwordErr = "Insert a password!";
    } else {
      $password = test_input(mysqli_real_escape_string($conn, filter_var($_POST['password'])));
      //$password = mysqli_real_escape_string($conn, filter_var($_POST['password']));
     
    }
  }
    
    if ($passwordErr == "" AND $emailErr == ""){

      $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1 ";
     // $query = "SELECT * FROM users WHERE email='$email' AND  password='$password'";
      $result = mysqli_query ($conn,$query);
      $row = mysqli_fetch_assoc ($result);
      //if (mysqli_num_rows($result) > 0){
        if (mysqli_num_rows($result) > 0) {
          foreach ($result as $row) {
            // Para verificar se a password está correta:
            if ( password_verify($password, $row['password']) ) {
              #Aqui será o local onde será realizado o login do Utilizador:
              # Os dados do utilizador serão armazenados:
              $_SESSION['username'] = $row['name'];
              $_SESSION['email'] = $row['email'];
              $_SESSION['status'] = $row['status'];
              $_SESSION['id'] = $row['id'];
              $_SESSION['isactive'] = $row['isactive'];
              $_SESSION['login'] = TRUE;
              if ($row['status'] == 1){
                header ('Location: adminpanel.php'); 
              } elseif($row['status'] == 0) {
                header ('Location: userpanel.php');
              }
            } 
       /* $_SESSION['email'] = $row['email'];
        $_SESSION['status'] = $rowstatus['status'];
        $_SESSION['login'] = TRUE;*/
       else {
        $autErr ="Verify the data";
    }
  }
}
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
    <link rel="stylesheet" href="/system/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/system/css/style_login.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">


    <title> Página de Login</title>  
  </head>

  <body>
    <main>

<!--butao para voltar para a pagina anterior-->


      <!-- info -->
      <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" AND ($passwordErr !="" OR $emailErr != "" OR $autErr !="")) {
      ?>
    <div>
        <h4>Alerta!</h4>
        <hr>
        <?php
          echo $autErr;
          echo $emailErr;
          echo $passwordErr;
        ?>
       </div>
      <?php } ?><!-- /.info -->

           <form name="frmLogin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        
                  <!-- Autenticaçao -->
      <div class="conteiner border border-primary-subtle border-2 border-top-1 border-start-3 p-2 login">
      <div class="d-flex justify-content-center">
    <ul class="list-unstyled">
        <li><a href="manageevents.php" class="btn btn-secondary"> Voltar </a></li>
    </ul>
        </div>
        
                <h2>Logar</h2><br>
                <div class= "">
                
              </div>
                 <!--Email box, password box, outros -->
                 <div class="text-center">
                <label><b>Email
        
        </b>
        </label>
        </div>
        <div class="text-center">
                <input 
                type="text" 
                name="email" 
                id="email_login" 
                placeholder="Ex: my@email.com"
                value="<?php echo $email; ?>" required autofocus>
        </div>
                <br><br>
                <div class="text-center">
                <label><b>Senha
                </b>
        </label>
        </div>
        <div class="text-center">
                <input 
                type="password" 
                name="password" 
                placeholder="Ex: 123456" required
                id="pass_login">
        </div>
                <br><br>
           
              <div class="lembrar">
                <input 
                type="checkbox" 
                id="check">
                <span>Lembrar</span>
              </div>
        
        
          <br><br>
          <div class="text-center">
                <button 
                name="Log"
                id="log_butao"
                value="Log in Here"
                class="btn btn-primary" 
                type="submit">Entrar</button>

              

                <div class="text-center"><br>
        <p>Ainda não tem uma conta?
    <div style="display: flex; justify-content: center; align-items: center; height: 10vh;">
  <a href="register.php" class="btn btn-primary">Quero me registrar</a>
        </div>
               
       </div>
       
        </form>
    </main>

  </body>
</html>
<?php
  mysqli_close($conn);
?>