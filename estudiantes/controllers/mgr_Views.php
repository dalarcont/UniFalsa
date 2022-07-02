<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
    class mainVistas{

        /*
        Retornar una alerta del script AlertifyJS
        ADVERTENCIA:
        Para el caso que se utilicen los tipos 'NotificaOK' o 'NotificaNO', se puede enviar el mensaje de la notificación en cualquiera de los parámetros:
            $mensaje ó $notificacionMensaje
            Únicamente en alguno de ellos, ya que si se incluye valor en ambos para los tipos mencionados provocará que muestre ambos.
            El valor 6 como parámetro secundario en 'sucess' y 'error', indica que estará 6 segundos en pantalla y desaparecerá
        Para redirecciones a sitios web fuera del directorio del sistema de información deberá proporcionar 'http://' y la dirección.
            Ejemplo: 'https://misitioweb.dominio'
            De lo contrario el sistema buscará esa url como interna y retornará error.
        */
        public function Alerta($tipo,$titulo,$mensaje,$notificacionMensaje,$redireccionRuta){
            switch($tipo){
                case "Simple":
                    echo "<script>alertify.alert('",$titulo,"', '",$mensaje,"');</script>";
                break;
                case "Simple_Redir":
                    echo "<script>alertify.alert('",$titulo,"', '",$mensaje,"', function(){ location.href='index.php'; });</script>";
                break;
                case "SimpleNotificaOK_Redir":
                    echo "<script>alertify.alert('",$titulo,"', '",$mensaje,"', function(){ alertify.success('",$notificacionMensaje,"');location.href='",$redireccionRuta,"'; });</script>";
                break;
                case "SimpleNotificaNO_Redir":
                    echo "<script>alertify.alert('",$titulo,"', '",$mensaje,"', function(){ alertify.error('",$notificacionMensaje,"');location.href='",$redireccionRuta,"'; });</script>";
                break;
                case "SimpleNotificaOK":
                    echo "<script>alertify.alert('",$titulo,"', '",$mensaje,"', function(){ alertify.success('",$notificacionMensaje,"');});</script>";
                break;
                case "SimpleNotificaNO":
                    echo "<script>alertify.alert('",$titulo,"', '",$mensaje,"', function(){ alertify.error('",$notificacionMensaje,"');});</script>";
                break;
                case "NotificaOK":
                    echo "<script>alertify.success('",$notificacionMensaje," ",$mensaje,"',6);</script>";
                break;
                case "NotificaNO":
                    echo "<script>alertify.error('",$notificacionMensaje," ",$mensaje,"',6);</script>";
                break;
            }
        }

        /*
        Escribir algo en determinado lugar indicando su ID 
        */
        public function EscribirDOM($afeccion,$idElemento,$contenido){
            if($afeccion=="RW"){
                //Reescribir
                echo "<script>$('",$idElemento,"').html('",$contenido,"');</script>";
            }else{
                //Añadirlo a lo que haya actualmente
                echo "<script>$('",$idElemento,"').append('",$contenido,"');</script>";
            }
        }

        /*
        Retornar la vista correspondiente respecto al formulario de acceso al portal estudiantil
        */
        public function loginForm($value){
            include __DIR__ . '/../views/v_loginForm.php';
            return view($value);
        }

        /*
        Mostrar perfil del estudiante 
        */
        public function perfilEstudiante($dataPkg){
            include __DIR__ . '/../views/v_PerfilEstudiante.php';
            return show_perfilEstudiante($dataPkg);
        }

        /*
        Mostrar formulario de cancelación de semestre
        */
        public function unsetSemestreForm($value,$data){
            include __DIR__ . '/../views/v_unsetSemestreForm.php';
            return show_unsetSemestreForm($value,$data);
        }

        /*
        Mostrar el horario del estudiante
        */
        public function show_horarioClases($data,$dataRenderHorario,$asgCodes){
            include __DIR__ . '/../views/v_horarioClases.php';
            return show_horarioClases($data,$dataRenderHorario,$asgCodes);
        }

        /*
        Mostrar historia académica
        */
        //Listado programas
        public function show_historiaAcademicaListados($data){
            include __DIR__ .'/../views/v_historiaAcademica.php';
                return show_historiaAcademicaListado($data);
        }
        //Datos del historial del programa seleccionado
        public function show_historiaAcademicaDatos($data){
            include __DIR__ .'/../views/v_historiaAcademica.php';
                return show_historiaAcademicaDatos($data);
        }

    }

