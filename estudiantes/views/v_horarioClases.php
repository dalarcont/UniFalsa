<?php

     function show_horarioClases($data,$dataRenderHorario,$asignaturasCodigos){
        //Información horario
        echo "Horario de clases generado al corte: ".gmdate('Y-m-d h:i:s');
        //Base para horario
        echo '<div id="schedule" class="jqs"></div>'
        .'<link rel="stylesheet" href="stylescript/css/schedule.css" />'
        .'<script src="stylescript/js/ScheduleEngine.js"></script>';      
        
        //Renderizado
       function renderBaseHorario($dataRenderHorario,$asignaturasCodigos){       


            function franjaClase($dia,$dataRenderHorario,$asignaturasCodigos){
                //Recorrido día y agregar las asignaturas
                $bgColors = array("#C0C0C0","#000000","#FF0000","#800000","#00FFFF","#808000","#008080","#0000FF","#FF00FF","#800080"); //Se permiten hasta 10 asignaturas matriculadas por tanto 10 ocurrencias de colores
                $txColors = array("#000000","#FFFFFF","#FFFFFF","#FFFFFF","#000000","#FFFFFF","#FFFFFF","#FFFFFF","#000000","#FFFFFF"); //Se permiten hasta 10 asignaturas matriculadas por tanto 10 ocurrencias de colores
                $cantClasesDia = sizeof($dataRenderHorario[$dia]); //Cantidad de clases en el día
                if($cantClasesDia>=1){
                    //Ese día hay más de una clase
                    $clasesDiaRetorno = "";
                    for($c=0; $c<=($cantClasesDia-1); $c++){
                        //Retornar el dato de horario de la clase respectiva del día 
                        $indexCode = array_search($dataRenderHorario[$dia][$c]["Codigo"],$asignaturasCodigos); //Selecciona un color de los 10 disponibles para mostrar y distinguir asignaturas
                         $clasesDiaRetorno .= "{"
                                    ."start: '".$dataRenderHorario[$dia][$c]["Desde"]."',"
                                    ."end: '".$dataRenderHorario[$dia][$c]["Hasta"]."',"
                                    ."title: '".$dataRenderHorario[$dia][$c]["Codigo"]."',"
                                    ."textColor: '".$txColors[$indexCode]."',"
                                    ."backgroundColor: '".$bgColors[$indexCode]."'"
                                ."},";
                    }
                    return $clasesDiaRetorno;
                }
            }     

            //Script de salida que invoca al graficador del horario
            $toRender =
            '<script>'
            
            ."$('#schedule').jqs({"
                ."mode: 'read',"
                ."hour: 24,"
                ."periodDuration: 30,"
                ."data: ["
                    ."{"
                        ."day: 0,"
                        ."periods: ["
                            .franjaClase("Lunes",$dataRenderHorario,$asignaturasCodigos)
                        ."]" //Cierre de periodos
                    ."}," //Cierre de día
                    ."{"
                        ."day: 1,"
                        ."periods: ["
                            .franjaClase("Martes",$dataRenderHorario,$asignaturasCodigos)
                        ."]" //Cierre de periodos
                    ."}," //Cierre de día
                    ."{"
                        ."day: 2,"
                        ."periods: ["
                            .franjaClase("Miercoles",$dataRenderHorario,$asignaturasCodigos)
                        ."]" //Cierre de periodos
                    ."}," //Cierre de día
                    ."{"
                        ."day: 3,"
                        ."periods: ["
                            .franjaClase("Jueves",$dataRenderHorario,$asignaturasCodigos)
                        ."]" //Cierre de periodos
                    ."}," //Cierre de día
                    ."{"
                        ."day: 4,"
                        ."periods: ["
                            .franjaClase("Viernes",$dataRenderHorario,$asignaturasCodigos)
                        ."]" //Cierre de periodos
                    ."}," //Cierre de día
                    ."{"
                        ."day: 5,"
                        ."periods: ["
                            .franjaClase("Sabado",$dataRenderHorario,$asignaturasCodigos)
                        ."]" //Cierre de periodos
                    ."}," //Cierre de día
                    ."{"
                        ."day: 6,"
                        ."periods: ["
                            .franjaClase("Domingo",$dataRenderHorario,$asignaturasCodigos)
                        ."]" //Cierre de periodos
                    ."}," //Cierre de día
                ."]"
            ."});"
            .'</script>'            
            ;

            echo $toRender;
       }

       renderBaseHorario($dataRenderHorario,$asignaturasCodigos);
        //Eliminar las franjas horarias de las 00:00 horas a las 05:59h
        //Restar por cada hora 26.7px a la propiedad 'top' dado que 26.7 equivale en pixeles a 1 hora de franja
        //Entonces como vamos a eliminar 6 horas 6 * 26.7 = 240
        function eliminarHorasInutiles(){
                echo "<script>"
                ."$(document).ready(function(){"
                        ."$('.jqs-period').each(function(index, element){"
                            ."var aTop = parseInt($(element).css('top'),10);"
                            ."var nTop = aTop - 160.2;"
                            ."$(element).css('top', nTop+'px');"
                        ."});"
                    ."});"
                    ."$('#FranjaHora0').remove();"
                    ."$('#FranjaHora1').remove();"
                    ."$('#FranjaHora2').remove();"
                    ."$('#FranjaHora3').remove();"
                    ."$('#FranjaHora4').remove();"
                    ."$('#FranjaHora5').remove();"
                    ."$('#FranjaHora23').remove();"
                    ."$('#FranjaHora24').remove();"
                    ."$('.jqs').css('height','520px');"
                    ."$('.jqs-day').css('height','430px');"
                    ."$('.jqs').css('overflow-x','unset');"
                    ."$('.jqs').css('overflow-y','unset');"
                ."</script>";
       }
       
       //Eliminar horas inutiles
        eliminarHorasInutiles();
    
        
       //Imprimir datos de información
       echo "<fieldset><legend><b>Información horario</b></legend>";
       for($i=0; $i<=(sizeof($data)-1); $i++){
        echo "<div style='text-align:left;'>"
                ."<p><b>".$data[$i]["codigoLiteral"]." - "
                .$data[$i]["nombreAsignatura"]." - Grupo ".$data[$i]["grupoAsignatura"].""
                ."</b><br>"
                ."<b>Docente:</b> ".$data[$i]["nombreDocente"]." - ".$data[$i]["correoDocente"]."<br>";
                if(!empty($data[$i]["horarioLunes"])){ echo "&emsp;&emsp;Lunes: ".$data[$i]["horarioLunes"]."<br>";}
                if(!empty($data[$i]["horarioMartes"])){ echo "&emsp;&emsp;Martes: ".$data[$i]["horarioMartes"]."<br>";}
                if(!empty($data[$i]["horarioMiercoles"])){ echo "&emsp;&emsp;Miércoles: ".$data[$i]["horarioMiercoles"]."<br>";}
                if(!empty($data[$i]["horarioJueves"])){ echo "&emsp;&emsp;Jueves: ".$data[$i]["horarioJueves"]."<br>";}
                if(!empty($data[$i]["horarioViernes"])){ echo "&emsp;&emsp;Viernes: ".$data[$i]["horarioViernes"]."<br>";}
                if(!empty($data[$i]["horarioSabado"])){ echo "&emsp;&emsp;Sábado: ".$data[$i]["horarioSabado"]."<br>";}
                if(!empty($data[$i]["horarioDomingo"])){ echo "&emsp;&emsp;Domingo: ".$data[$i]["horarioDomingo"]."<br>";}
        echo "</p></div>";
        }
        echo "</fieldset><br>";
    }
?>