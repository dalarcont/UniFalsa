<?php

     function show_unsetSemestreForm($value,$data){

        if($value){
            echo '
            <div id="LoginPE">
                    <p>
                        *IMPORTANTE:<br>
                        La cancelación del semestre implica lo siguiente:<br>
                        * Se pierde la calidad de estudiante activo<br>
                        * Se pierde acceso a las funciones académicas salvo el historial académico<br>
                        * Las asignaturas en curso serán neutralizadas, deberán cursarse nuevamente<br>
                        * Las demás disposiciones del sistema que requieran que el estudiante esté activo en el periodo no funcionarán<br>
                    </p>

                    <p><b>Somos partidarios de la libertad por tanto no realizamos verificaciones externas solo basta con completar el formulario que presentamos.</b></p>

                    <p><b>Selecciona el programa académico activo</b></p>
                    <p>
                        <select id="unsetPeriodo" onchange="unsetSemesterOpt()" class="sus">
                            <option selected>PROGRAMA ACADÉMICO MATRICULADO</option>
                            <option value="'.$data["ProgramaCodigo"].'">--- '.$data["InfoPeriodo"].':'.$data["ProgramaCodigo"].'-'.$data["ProgramaNombre"].' ---</option>
                        </select>
                    </p>
                    <p>&nbsp;
                    <span id="preUnsetResult"> </span><br>
                    
            </div>';
        }else{
            echo '<img src="assets/images/notAllowed.png" height="50px" width="50px"><p>La cancelación de semestre no está disponible.<br>Intente más tarde.<br>Tenga paciencia.</p>';
        }
        
    }
?>