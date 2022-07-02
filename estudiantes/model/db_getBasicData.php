<?php

    //Busca datos asociados a $a del estudiante y devuelve un array
    function dbExec_getBasicData($a,$link){
        $SqlLine = "SELECT 
        ufp.*,
        ufeg.FECHAINGRESO,
        ufeg.ESTADOGENERAL,
        ufeg.PUNTAJEINGRESO,
        ufpa.NOMBREPROGRAMA,
        ufeg.ULTIMOPROGRAMAMATRICULADO,
        ufeha.UBICACIONSEMESTRAL,
        ufcc.SIGNIFICADO AS ORIGENPAISNOMBRE,
        ufcc2.SIGNIFICADO AS RESIDEPAISNOMBRE,
        ufca.detalle AS DETALLE_ESCOLARIDAD
        FROM
        uf_personas AS ufp
        JOIN uf_estudiantes_general AS ufeg ON ufeg.NICKNAMEESTUDIANTE=ufp.NICKNAME
        JOIN uf_estudiantes_historial_academico AS ufeha ON (ufeha.NICKNAME_ESTUDIANTE = ufp.NICKNAME AND ufeha.PROGRAMA = ufeg.ULTIMOPROGRAMAMATRICULADO)
        JOIN uf_programasacademicos AS ufpa ON ufpa.CODIGONUMERICOPROGRAMA = ufeg.ULTIMOPROGRAMAMATRICULADO
        JOIN uf_countrycodes AS ufcc ON ufcc.CODIGO = ufp.ORIGEN_PAIS
        JOIN uf_countrycodes AS ufcc2 ON ufcc2.CODIGO = ufp.RESIDE_PAIS
        JOIN uf_convenciones_apps AS ufca ON ufca.codigo = ufp.ESCOLARIDAD
        WHERE 
        ufp.NICKNAME='$a' AND ufca.tabla_origen = 'uf_personas'
        ORDER BY ufeha.UBICACIONSEMESTRAL DESC LIMIT 1;";
        $SqlExec = mysqli_query($link,$SqlLine);
        return mysqli_fetch_array($SqlExec);
        //mysqli_close($link);
    }
