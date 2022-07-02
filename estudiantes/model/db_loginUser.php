<?php

    //Busca datos asociados a $a y $b del estudiante y devuelve un array
    function dbExec_loginUser($a,$b,$link){
        $SqlLine = "SELECT * FROM uf_estudiantes_portal AS ufep
        JOIN uf_estudiantes_general as ufeg ON ufeg.NICKNAMEESTUDIANTE = ufep.NICKNAME_ESTUDIANTE
        WHERE ufep.NICKNAME_ESTUDIANTE = '$a' AND ufep.PKEYESTUDIANTE = '$b';";
        $SqlExec = mysqli_query($link,$SqlLine);
        return mysqli_fetch_array($SqlExec);
        //mysqli_close($link);
    }


