<?php
session_start();
session_unset();
?><!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Universidad Falsa - División Superior de Sistemas Informáticos -->
    <meta charset="utf-8">
    <title>Portal estudiantil - Ingreso</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="stylescript/css/style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="stylescript/style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="stylescript/css/style.responsive.css" media="all">

    <link rel="shortcut icon" href="stylescript/images/Hamtaro.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="stylescript/js/script.js"></script>
    <link rel="stylesheet" href="stylescript/css/alertify.css" />
    <link rel="stylesheet" href="stylescript/css/themes/bootstrap.css" />
    <script src="stylescript/js/alertify.js"></script>
    <script src="stylescript/js/script.responsive.js"></script>
    <meta name="description" content="Página principal de la Universidad Falsa">


</head>

<body>
<div id="art-main">
    <header class="art-header">

        <div class="art-shapes">
            <div class="art-object1542056463" id="webLogo"></div>
        </div>

        <h1 class="art-headline">
            <a href="/" >Universidad Falsa</a>
        </h1>
        <h2 class="art-slogan">Infelix studiorum nam miseris populum</h2>

    </header>
    <nav class="art-nav">
        <div class="art-nav-inner">
            <ul class="art-hmenu">
                <li><a href="index.php" class="">Inicio</a></li>
            </ul>
        </div>
    </nav>
    <div class="art-sheet clearfix">
        <div class="art-layout-wrapper">
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-content">
                        <article class="art-post art-article">
                            <h2 class="art-postheader">PORTAL ESTUDIANTIL</h2>

                            <div class="art-postcontent art-postcontent-0 clearfix">
                                <?php
                                include './interfaces/StudentPortal.php';
                                //Instanciar objeto
                                $PortalEstudiante = new StudentPortal();
                                //Pedir el formulario de inicio de sesión
                                $PortalEstudiante->appset_Access();
                                unset($PortalEstudiante);
                                ?>
                            </div>
                            <div><br><br><br></div>
                            <!-- <div id="stdR" class="resultadoIndex"></div> -->
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="art-footer">
        <div class="art-footer-inner">
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell layout-item-0" style="width: 100%">
                        <p style="text-align: center;"><span style="font-family: 'Trebuchet MS';">Universidad
                                    Falsa</span></p>
                        <p style="text-align: center;"><span style="font-family: 'Trebuchet MS';">División Superior
                                    de Sistemas Informáticos</span></p>
                        <p style="text-align: center;"><span style="font-family: 'Trebuchet MS';">Falsos derechos
                                    reservados</span></p>
                        <p style="text-align: center;"><span style="font-family: 'Trebuchet MS';">2022</span></p>
                    </div>
                </div>
            </div>

        </div>
    </footer>

</div>


</body>
<!-- Load this due login form render -->
<script src="stylescript/js/keyControl.js"></script>
<script src="stylescript/js/mainScripts.js"></script>
</html>