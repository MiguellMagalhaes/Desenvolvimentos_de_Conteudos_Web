<?php
    session_start();
    session_name();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>TicketVibes</title>

    <!--== CSS Files ==-->
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/style.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.css" media="screen">
    <link rel="stylesheet" href="css/owl.carousel.css" media="screen">
    <link rel="stylesheet" href="css/flexslider.css" media="screen">
    <link rel="stylesheet" href="css/fancySelect.css" media="screen">
    <link rel="stylesheet" href="css/responsive.css" media="screen">

    <!--== Google Fonts ==-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">

    <!-- Estilos para os botões -->
    <style>
        form {
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px;
            display: flex;
            align-items: center;
        }

        button {
            padding: 10px 20px;
            margin-left: 10px;
            cursor: pointer;
            background-color: #676767;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
        }

    </style>
</head>
<body>
    <header id="header">
        <div id="menu" class="header-menu fixed">
            <div class="box">
                <div class="row">
                    <nav role="navigation" class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                            </button>
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                            <!-- Logo -->
                            <span class="navbar-brand logo">
                                TicketVibes
                            </span>

                            <!-- Botoes de login e Registo -->
                            <form action="login.php" method="post">
                                <!-- Botão de "Contact Us" -->
                                <button type="button" onclick="window.location.href='contactus.php';">Contacte-nos</button>
                                <!-- Botão de registro -->
                                <button type="button" onclick="window.location.href='register.php';">Registrar</button>
                                <!-- Botão de login -->
                                <button type="button" onclick="window.location.href='login.php';"> Logar</button>
                               <!-- <button type="submit">Login</button> -->
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Site Description -->
        <div class="header-cta">
            <div class="container">
                <div class="row">
                    <div class="entry-content">
                        <h6 class="entry-title"><a href="#">MARCA JÁ O TEU LUGAR PARA EVENTOS QUE NÃO VAIS QUERER PERDER </a></h6>
                        <h5><span><b>Cria momentos memoráveis em Eventos inesquecíveis</b></span></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bg">
            <div id="preloader">
                <div class="preloader"></div>
            </div>
            <div class="main-slider" id="main-slider">
                <!-- Main Slider -->
                <ul class="slides">
                    <li><img src="images/demo/blog0.jpg" alt="Slide Image"/></li>
                    <li><img src="images/demo/blog1.jpg" alt="Slide Image"/></li>
                    <li><img src="images/demo/blog2.jpg" alt="Slide Image"/></li>
                    <li><img src="images/demo/blog3.jpg" alt="Slide Image"/></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="container box">


            <!-- Team Section -->
            <section id="team" class="team d-flex align-items-center justify-content-center text-center">
    <div class="container">
        <div class="title-start team-menu col-md-12">
            <br><br>
            <h2 class="team-heading">Equipa</h2>
            <p class="sub-text text-center">Conheça os Criadores do Projeto</p>
        </div>
    </div>
    <div class="team-member row justify-content-center">
        <div class="col-md-3 col-sm-6 member">
            <a class="d-flex flex-column align-items-center">
                <img class="blog-image mx-auto" src="miguel.png" width="100%" height="280" alt="Blog Image 2"/>
                <p class="name-member">Miguel Magalhães</p>
                <ul class="team-ist">
                    <li>Programador</li>
                </ul>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 member">
            <a class="d-flex flex-column align-items-center">
                <img class="blog-image mx-auto" src="fabio.png" width="100%" height="280" alt="Blog Image 2"/>
                <p class="name-member">Fábio Sequeira</p>
                <ul class="team-ist">
                    <li>Designer</li>
                </ul>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 member">
            <a class="d-flex flex-column align-items-center">
                <img class="blog-image mx-auto" src="rui.png" width="100%" height="280" alt="Blog Image 2"/>
                <p class="name-member">Rui Reis</p>
                <ul class="team-ist">
                    <li>Designer</li>
                </ul>
            </a>
            </div>
            <div class="col-md-3 col-sm-6 member">
            <a class="d-flex flex-column align-items-center">
                <img class="blog-image mx-auto" src="bol.png" width="100%" height="280" alt="Blog Image 2"/>
                <p class="name-member">BOL & TicketLine</p>
                <ul class="team-ist">
                    <li>Patrocinados</li>
                </ul>
           </div>
        </div>
        <!-- Adicione mais membros da equipe conforme necessário -->
    </div>
</section>


        </div>
    </div>



    <!-- Contact Area -->

	
    <section id="contact" class="mapWrap">
        <div id="googleMap" style="width:100%;"></div>
        <div id="contact-area">
            <div class="container">
                <div class="row">
                    <div class="moreDetails">
                            <h4 class="con-title">Sobre Nós</h4>
                            <h4>Bem-vindo ao TicketVibes o fruto da paixão compartilhada de três visionários determinados a simplificar e enriquecer a experiência de adquirir bilhetes para eventos de forma rápida e eficaz. Fundado por Miguel Magalhães , Fábio Sequeira  e Ruis Reis onde a nossa plataforma é o resultado de uma jornada conjunta para transformar a maneira como as pessoas vivenciam eventos excepcionais.</h4>
                            <h4 class="con-title">O que torna TicketVibes único</h4> 
                            <h4>Com apenas uma equipa de três pessoas, conseguimos manter um toque pessoal em tudo o que fazemos. Valorizamos cada utilizador como parte da nossa comunidade, não apenas como um cliente. Estamos sempre atentos às necessidades em evolução dos nossos utilizadores. Isso nos impulsiona a adotar inovações tecnológicas para tornar a compra de ingressos mais fácil, rápida e personalizada.</h4>               
                        </div>
                    </div>

                    <div class="col-sm-6">

                            <div class="form-group">
                               
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
			
        <footer>
			
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="copyright"><a href="http://wwww.technextit.com" target="_blank"></a> TicketVibes 2024</p>
                    </div>
                    <div class="col-sm-6">
                    <a class="designed" href="http://themewagon.com" target="_blank"></a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Javascript Files -->
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script src="js/jquery-2.1.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollTo.js"></script>
        <script src="js/jquery.nav.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/jquery.accordion.js"></script>
        <script src="js/jquery.placeholder.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/gmap3.js"></script>
        <script src="js/fancySelect.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#testimonial-container").owlCarousel({
                    navigation: false,
                    slideSpeed: 700,
                    paginationSpeed: 400,
                    singleItem: true,
                });
            });
        </script>
    </body>
</html>