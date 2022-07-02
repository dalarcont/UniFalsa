<?php

    function dbexec_getHistoriaAcademicaDatos($a,$p,$link)
    {
            $SqlLine = "SELECT 
            ufeha.*,
            ufpa.NOMBREPROGRAMA AS nombrePrograma,
            ufpa.CODIGOPROGRAMA as codigoLargoPrograma,
            ufpa.NOMENCLATURAASIGNATURAS as codigoLiteralPrograma,
            CONCAT(IF(substring(ufeha.PERIODO,5) = 1, 'Primer semestre de ', 'Segundo semestre de '),substring(ufeha.PERIODO,1,4)) AS indicadorSemestre,
            ufca.detalle as estadoAcademico
            FROM 
            uf_estudiantes_historial_academico AS ufeha
            JOIN uf_programasacademicos AS ufpa ON ufpa.CODIGONUMERICOPROGRAMA = ufeha.PROGRAMA
            JOIN uf_convenciones_apps AS ufca ON (ufca.CODIGO = ufeha.SEMESTRE_ESTADO AND ufca.TABLA_ORIGEN = 'uf_eha')
            WHERE ufeha.NICKNAME_ESTUDIANTE = '$a' 
            AND ufeha.PROGRAMA = '$p'
            ORDER BY NUMHIST DESC
            ;";
            $SqlExec = mysqli_query($link,$SqlLine);
            $data = array();
            //Traer los datos de horario de cada asignatura matriculada
            while($row = mysqli_fetch_array($SqlExec)){
                $data[] = $row ;
            }
            return $data;
            //mysqli_close($link);
    }
