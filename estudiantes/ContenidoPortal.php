<?php
$UsuarioDatos = $_SESSION['UsrPkgBasicData'];
if (empty($UsuarioDatos)) {
    session_unset();
    session_destroy();
    echo "<script>function unLoginGotoLogin() {  window.location = './'; } setTimeout('unLoginGotoLogin()', 0); alert('No se ha identificado correctamente...'); </script>";

    #Se rompe la sesión debido a que el estudiante no está identificado
}
?><!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Universidad Falsa - División Superior de Sistemas Informáticos -->
    <meta charset="utf-8">
    <title>Portal estudiantil - Inicio</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="stylescript/css/style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="assets/style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="stylescript/css/style.responsive.css" media="all">

    <link rel="shortcut icon" href="assets/images/Hamtaro.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="stylescript/js/script.js"></script>
    <link rel="stylesheet" href="stylescript/css/alertify.css" />
    <link rel="stylesheet" href="stylescript/css/themes/bootstrap.css" />
    <script src="stylescript/js/alertify.js"></script>
    <script src="stylescript/js/script.responsive.js"></script>
    <meta name="description" content="Portal estudiantil de la universidad falsa">


</head>

<body>
<div id="art-main">
    <header class="art-header">

        <div class="art-shapes">
            <div class="art-object1542056463" id="webLogo"></div>
        </div>

        <h1 class="art-headline">
            <a href="/">Universidad Falsa</a>
        </h1>
        <h2 class="art-slogan" id="sloganTexto">Infelix studiorum nam miseris populum</h2>

    </header>
    <nav class="art-nav">
        <div class="art-nav-inner">
            <ul class="art-hmenu">
                <li><a href="Portal.php" class="">Inicio</a></li>
                <li><a href="index.php" class="">Salir</a></li>
            </ul>

            <p align="right" style="color: yellow;vertical-align:middle;"><b><?php echo $UsuarioDatos["NOMBRES"]." ".$UsuarioDatos["APELLIDOS"]; ?></b></p>
        </div>
    </nav>
    <div class="art-sheet clearfix">
        <div class="art-layout-wrapper">
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-content">
                        <article class="art-post art-article">
                            <h2 class="art-postheader">PORTAL ESTUDIANTIL</h2>
                            <div id="stdR" class="resultadoIndex"></div>
                            <!-- -->

                            <div class="art-postcontent art-postcontent-0 clearfix">
                                <div class="art-content-layout">
                                    <div class="art-content-layout-row">
                                        <div class="art-layout-cell" style="width: 100%">
                                            <p>Bienvenido(a) a tu portal estudiantil.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="art-content-layout">
                                    <div class="art-content-layout-row">
                                        <div class="art-layout-cell" style="width: 25%">
                                            <h4>
                                                <span style="color: #878787;">MENÚ</span>
                                            </h4>
                                            <div id="Acciones">

                                                <p><!-- -->
                                                <fieldset>
                                                    <legend id="f1"><b>FRANJA ACADÉMICA</b></legend>
                                                    <span id="academFrame" style="display:none">
                                                        &nbsp;<button id="f11" href="#" class="art-button fixedSizeButton">Cancelar semestre</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f12" href="#" class="art-button fixedSizeButton">Ajuste de matrícula</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f13" href="#" class="art-button fixedSizeButton">Plan académico</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f14" href="#" class="art-button fixedSizeButton">Historia académica</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f15" href="#" class="art-button fixedSizeButton">Notas parciales</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f16" href="#" class="art-button fixedSizeButton">Horario de clases</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                    </span>
                                                </fieldset>
                                                </p><!-- -->

                                                <p><!-- -->
                                                <fieldset>
                                                    <legend id="f2"><b>FRANJA SERVICIOS</b></legend>
                                                    <span id="servicesFrame" style="display:none">
                                                        &nbsp;<button id="f21" href="#" class="art-button fixedSizeButton">Certificados</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f22" href="#" class="art-button fixedSizeButton">Registro financiero</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f23" href="#" class="art-button fixedSizeButton">Comprar códigos</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                    </span>
                                                </fieldset>
                                                </p><!-- -->

                                                <p><!-- -->
                                                <fieldset>
                                                    <legend id="f3"><b>FRANJA SOLICITUDES</b></legend>
                                                    <span id="requestsFrame" style="display:none">
                                                        &nbsp;<button id="f31" href="#" class="art-button fixedSizeButton">Académicas</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f32" href="#" class="art-button fixedSizeButton">Financieras</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f33" href="#" class="art-button fixedSizeButton">Grados</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f34" href="#" class="art-button fixedSizeButton">PQR Estudiantes</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                    </span>
                                                </fieldset>
                                                </p><!-- -->

                                                <p><!-- -->
                                                <fieldset>
                                                    <legend id="f4"><b>FRANJA PERSONAL</b></legend>
                                                    <span id="userFrame" style="display:none">
                                                        &nbsp;<button id="f41" class="art-button fixedSizeButton">Mi perfil</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f42" href="#" class="art-button fixedSizeButton">Reporte disciplinar</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f43" href="#" class="art-button fixedSizeButton">Actualizar datos</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                        &nbsp;<button id="f44" href="#" class="art-button fixedSizeButton">Cambiar contraseña</button>&nbsp;<br><span style="display:block;margin-bottom:0.5em;"></span>
                                                    </span>
                                                </fieldset>
                                                </p><!-- -->

                                            </div>

                                            <!-- Acción por defecto habilitada-->
                                            <p>&nbsp;<a href="index.php" class="art-button fixedSizeButton">SALIR</a>&nbsp;<br></p>
                                        </div>

                                        <div class="art-layout-cell layout-item-0" style="width: 75%"><i style="font-size:11px;">
                                            </i>
                                            <p>Selecciona una opción del menú académico.&nbsp;</p>

                                            <div id="ProcesarAccion" class="ProcesarAccion"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- -->
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
<!-- Declare this script source due to HTML render-->
<script src="stylescript/js/mainScripts.js"></script>
<script src="stylescript/js/keyControl.js"></script>
</html>