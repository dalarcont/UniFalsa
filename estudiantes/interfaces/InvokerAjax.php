<?php 
/*
Manejar las diferentes peticiones AJAX (get/post) de la interacción del usuario
ESTE ARCHIVO SOLO INVOCA LOS SERVICIOS, YA EL ARCHIVO DE SERVICIOS SE ENCARGA DE DAR RESPUESTA
*/
include __DIR__ . '/../interfaces/StudentPortal.php';

//Objeto de interface
$StudentsApps = new StudentPortal();

//Leer órdenes entrantes
if(!empty(($_POST["fx"]))){
    switch($_POST["fx"]){
    
        //Petición entrar al sistema.
        case "access":
            $StudentsApps->appset_VerifyUser($_POST["std1"],$_POST["std2"]);
        break;

        //Cancelar semestre
        case "f11":
            $StudentsApps->appset_cancelacionSemestre();
        break;
        
            //Derivada de f11
            case "preUnset":
                $StudentsApps->prepareUnset($_POST["idp"]);
            break;

        //Historial académico
        case "f14":
            if($_POST['action']=="pre"){
                //Mostrar listado de programas para que el usuario elija cual cargar
                $StudentsApps->appset_historiaAcademicaLista();
            }else if($_POST['action']=="do"){
                //Se ha seleccionado programa académico
                if($_POST['param']!="0"){
                    $StudentsApps->appset_historiaAcademicaDatos($_POST['param']);
                }
            }
        break;
        
        //Horario de clases
        case "f16":
            $StudentsApps->appset_horarioClases();
        break;



        //Mostrar perfil del estudiante
        case "f41":
            $StudentsApps->appset_informacionEstudiante();
        break;


    }
}else{
    $StudentsApps->Vistas()->Alerta("Simple","Portal estudiantes","Ocurrió un error<br />Intenta más tarde.",null,null);
}

unset($StudentsApps);