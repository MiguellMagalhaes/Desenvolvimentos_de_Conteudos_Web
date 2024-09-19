<?php
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
?>
<!DOCTYPE html>
<html lang="pt-pt">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Painel Administrador</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/adminpanel.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><p style="font-family:helvetica;">Painel Administrador</p></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li style="margin-right: 15px;"><a href="manageusers.php" class="btn btn-primary btn-l text-uppercase" style="font-family:helvetica;"><strong>Gerir Utilizadores</strong></a></li>
                     <li><a href="logout.php" class="btn btn-primary btn-l text-uppercase" style="font-family:helvetica;" onClick="return confirm('Tem certeza que deseja sair?\nEssa ação não pode ser desfeita!')"><strong>Sair</strong></a></li>
                </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bem-Vindo</div>
                <div class="masthead-heading text-uppercase">Esperemos que esteja tudo bem</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="manageevents.php">Gerir eventos</a>
            </div>
        </header>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/adminpanel.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <?php
        if(isset($_POST['dateOfBirth'])){
            $entered = $_POST['dateOfBirth'];
            $create = date_create($entered);
        // Se o utilizador estiver a usar um navegador que não suporta o tipo de entrada date do HTML5:
        // verifica se a entrada está realmente no formato correto que suporta date_format()
            if($create !== false){
                 $date = date_format($create, 'm-d-Y');
                 // Inserir na Databse
            }else{
                 // Lidar com a notificação de erros de falha
            }
        }
        ?>
    </body>
</html>