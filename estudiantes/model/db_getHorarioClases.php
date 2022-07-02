<?php

    //Busca datos asociados a $a del estudiante y devuelve un array
    function dbExec_getHorarioClases($a,$link){
        $SqlLine = "SELECT
        ufa.CODIGOLITERALASIGNATURA AS codigoLiteral,
        ufa.NOMBREASIGNATURA AS nombreAsignatura,
        ufmea.GRUPO AS grupoAsignatura,
        CONCAT(ufp.NOMBRES, ufp.APELLIDOS) AS nombreDocente,
        ufp.EMAIL_LABORAL AS correoDocente,
        ufmh.CONFIG_LUN AS horarioLunes,
        ufmh.CONFIG_MAR AS horarioMartes,
        ufmh.CONFIG_MIE AS horarioMiercoles,
        ufmh.CONFIG_JUE AS horarioJueves,
        ufmh.CONFIG_VIE AS horarioViernes,
        ufmh.CONFIG_SAB AS horarioSabado,
        ufmh.CONFIG_DOM AS horarioDomingo
       FROM 
       uf_matricula_estudianteasignatura AS ufmea
       JOIN uf_asignaturas as ufa ON ufa.CODIGOASIGNATURA = ufmea.CODASIGNATURA
       JOIN uf_matricula_horarios AS ufmh ON (ufmh.CODASIGNATURA = ufmea.CODASIGNATURA AND ufmh.GRUPO = ufmea.GRUPO)
       JOIN uf_docentes_grupos AS ufdg ON (ufdg.CODASIGNATURA =  ufmea.CODASIGNATURA AND ufdg.GRUPO = ufmea.GRUPO)
       JOIN uf_personas AS ufp ON ufp.NICKNAME = ufdg.NICKNAME_DOCENTE
       WHERE ufmea.NICKNAME_ESTUDIANTE = '$a'
       ORDER BY codigoLiteral ASC";
        $SqlExec = mysqli_query($link,$SqlLine);
        $data = array();
        //Traer los datos de horario de cada asignatura matriculada
        while($row = mysqli_fetch_array($SqlExec)){
            $data[] = $row ;
        }
        return $data;
        //mysqli_close($link);
    }


