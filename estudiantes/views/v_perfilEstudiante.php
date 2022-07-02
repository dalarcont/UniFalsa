<?php 
include __DIR__ . '/../views/v_static_mostrarFecha.php';

    function show_perfilEstudiante($dataPkg) {
        if(!empty($dataPkg)){
            //Cargar estilos
            function genero($x){
                if($x=="M"){return "Masculino";}else{return "Femenino";}
            }
            
            $a =  '<link rel="stylesheet" href="stylescript/css/TablaInfoEstudiantes.css" />';
            //Imprimir datos
            $b = '<table class="infoTable">
                <tbody>
                <tr>
                    <td>Fecha de registro:</td>
                    <td>'.fechaTextoFormateada($dataPkg["FECHAREGISTRO"],2).'</td>
                </tr>
                <tr>
                    <td>Identificaci&oacute;n:</td>
                    <td>'.$dataPkg["IDPERSONA"].'</td>
                </tr>
                <tr>
                    <td>Nombre y apellidos:</td>
                    <td>'.$dataPkg["NOMBRES"].' '.$dataPkg["APELLIDOS"].'</td>
                </tr>
                <tr>
                    <td>Nickname (nombre de usuario):</td>
                    <td>'.$dataPkg["NICKNAME"].'</td>
                </tr>
                <tr>
                    <td>G&eacute;nero:</td>
                    <td>'.genero($dataPkg["GENERO"]).'</td>
                </tr>
                <tr>
                    <td>Email acad&eacute;mico:</td>
                    <td>'.$dataPkg["EMAIL_LABORAL"].'</td>
                </tr>
                <tr>
                    <td>Pa&iacute;s de origen:</td>
                    <td>'.$dataPkg["ORIGENPAISNOMBRE"].'</td>
                </tr>
                <tr>
                    <td>Ciudad de origen:</td>
                    <td>'.$dataPkg["ORIGEN_CIUDAD"].'</td>
                </tr>
                <tr>
                    <td>Pa&iacute;s de residencia:</td>
                    <td>'.$dataPkg["RESIDEPAISNOMBRE"].'</td>
                </tr>
                <tr>
                    <td>Ciudad de residencia:</td>
                    <td>'.$dataPkg["RESIDE_CIUDAD"].'</td>
                </tr>
                <tr>
                    <td>Nivel acad&eacute;mico:</td>
                    <td>'.$dataPkg["DETALLE_ESCOLARIDAD"].'</td>
                </tr>
                <tr>
                    <td>Fecha ingreso a la acad&eacute;mia:</td>
                    <td>'.fechaTextoFormateada($dataPkg["FECHAINGRESO"],1).'</td>
                </tr>
                <tr>
                    <td>&Uacute;ltimo programa matriculado y su semestre:</td>
                    <td>'.$dataPkg["NOMBREPROGRAMA"].' - semestre #'.$dataPkg["UBICACIONSEMESTRAL"].'</td>
                </tr>
                </tbody>
            </table>';
            echo $a.$b;
        }else{
            echo "<b style='color:red;'>Error en el sistema de información.<br>Cierre su sesión e ingrese de nuevo...</b>";
        }
    }

?>