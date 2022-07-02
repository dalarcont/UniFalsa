<?php 

    function show_historiaAcademicaListado($data){
        $toReturn = "<h4 style='color:black'>Historia académica</h4><br>"
            ."<select id='historia_ListadoProgramas' class='sus' onchange='cargaHistorial();'>"
            ."<option value='0'>Seleccione programa académico para ver su historial</option>";

                for($i=0; $i<=(sizeof($data)-1); $i++){
                    $toReturn .= "<option value='".$data[$i]['codigoPrograma']."'>".$data[$i]['codigoLiteralPrograma']." --- ".$data[$i]['codigoLargoPrograma']." --- ".$data[$i]['nombrePrograma']."</option>";
                }
            $toReturn .= "</select><p><br></p>";
            //Nuevo div para cargar el historial respectivo y que no se borre el listado de programas
            $toReturn .= "<div id='returnHistorial'></div>";
        echo $toReturn;
    }

    function show_historiaAcademicaDatos($data){

        function subProcesador($data){
            $toReturn = "";

            for($h = 0; $h <= sizeof($data)-1; $h++){

                $toReturn.= "<table class='historiaAcademicaTbl'>"
                ."<thead>"
                ."<tr>"
                ."<th colspan='3'>".$data[$h]['indicadorSemestre']."</th>"
                ."<th colspan='2'>Promedio: ".$data[$h]['PROMEDIO']."</th>"
                ."<th colspan='3'>Estado: ".$data[$h]['estadoAcademico']."</th>"
                ."</tr>"
                ."</thead>"
                ."<tbody>"
                ."<tr>"
                ."<td colspan='3'><span class='itemsTabla'>Asignatura</span></td>"
                ."<td><span class='itemsTabla'>Grupo</span></td>"
                ."<td><span class='itemsTabla'>Nota</span></td>"
                ."<td><span class='itemsTabla'>Estado</span></td>"
                ."<td colspan='2'><span class='itemsTabla'>Detalle</span></td>"
                ."</tr>"
                ."<tr>"
                ."<td colspan='3'>ASG</td>"
                ."<td>GRP</td>"
                ."<td>NT</td>"
                ."<td>EST</td>"
                ."<td colspan='2'>DTLL</td>"
                ."</tr>"
                ."</tbody>"
                ."</table><br><br>>";
            }
            return $toReturn;

        }

        echo '<link rel="stylesheet" href="stylescript/css/TablaHistoriaAcademica.css" />';
        echo "<fieldset>"
        ."<legend><span class='historialTitularPrograma'>"
        .$data[0]['codigoLiteralPrograma']
        ." - "
        .$data[0]['codigoLargoPrograma']
        ." - "
        .$data[0]['nombrePrograma']
        ."</span></legend>"
        .subProcesador($data)
        ."</fieldset>";
    };
?>