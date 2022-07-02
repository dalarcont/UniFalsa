<?php

    function dbexec_getHistoriaAcademicaPrecarga($a,$link){
            $SqlLine = "SELECT 
            ufeha.PROGRAMA as codigoPrograma,
            ufpa.CODIGOPROGRAMA as codigoLargoPrograma,
            ufpa.NOMENCLATURAASIGNATURAS as codigoLiteralPrograma,
            ufpa.NOMBREPROGRAMA as nombrePrograma
            FROM
            uf_estudiantes_historial_academico as ufeha
            JOIN uf_programasacademicos as ufpa ON ufpa.CODIGONUMERICOPROGRAMA = ufeha.PROGRAMA
            WHERE ufeha.NICKNAME_ESTUDIANTE = '$a' ORDER BY ufeha.PROGRAMA ASC LIMIT 1;";
            $SqlExec = mysqli_query($link,$SqlLine);
            $data = array();
            //Traer los datos de horario de cada asignatura matriculada
            while($row = mysqli_fetch_array($SqlExec)){
                $data[] = $row ;
            }
            return $data;
            //mysqli_close($link);
    }
