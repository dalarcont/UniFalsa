<?php

interface I_StudentsApps{

    //Acceso a conexión al portal
    public function appset_Access();

    //Verificar usuario
    public function appset_VerifyUser($a,$b);

    //Acceso condicionado por programa, ubicacion semestral y hora de acceso
    public function appset_AccessCriteria();

    //Traer paquete de datos básicos estudiante identificado
    public function appset_LoggedUserData($e);

    //Mostrar datos básicos del estudiante 
    public function appset_informacionEstudiante();

    //Mostrar datos para cancelación de semestre
    public function appset_cancelacionSemestre();

        //Derivada
        public function prepareUnset($value);
    
    //Mostrar horario
    public function appset_horarioClases();

    //Preparar historial académico
    public function appset_historiaAcademicaLista();

    //Mostrar el historial académico
    public function appset_historiaAcademicaDatos($prog);



    
}
