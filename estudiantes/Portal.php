<?php
session_start();
include __DIR__ . '/../estudiantes/interfaces/StudentPortal.php';
$StudentPortal = new StudentPortal();
/* Universidad Falsa - División Superior de Sistemas Informáticos */
$DatosUsuario = $_SESSION['Appset_UserCred'];


if (empty($DatosUsuario)) {
    session_unset();
    session_destroy();
    echo "<script>function unLoginGotoLogin() {  window.location = 'index.php'; } setTimeout('unLoginGotoLogin()', 0000); alert('No se ha identificado correctamente...'); </script>";

    #Se rompe la sesión debido a que el estudiante no está identificado
}
else
{
    //Traer datos del estudiante básicos
    $_SESSION['UsrPkgBasicData'] = $StudentPortal->appset_LoggedUserData($DatosUsuario);
    #Mantener la sesión y permitir acceso al estudiante por su correcta identificación
    header("Content-Type: text/html;charset=utf-8");
    require 'ContenidoPortal.php';

}
?>