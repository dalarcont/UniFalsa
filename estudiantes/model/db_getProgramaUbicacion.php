<?php

    //Busca datos asociados a $a del estudiante y devuelve un array
    function dbExec_getProgramaUbicacion($a,$link){
        $SqlLine = "SELECT PROGRAMA,UBICACIONSEMESTRAL FROM uf_estudiantes_historial_academico WHERE NICKNAME_ESTUDIANTE='$a' ORDER BY NUMHIST DESC LIMIT 1;";
        $SqlExec = mysqli_query($link,$SqlLine);
        return mysqli_fetch_array($SqlExec);
        //mysqli_close($link);
    }

