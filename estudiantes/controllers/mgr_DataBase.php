<?php 

    //include __DIR__ . '/../model/DB_Main.php';
    //include __DIR__ . '/../../DSSI/ControlSistemasInformacion.php';
    /*
        Este controlador deberá pasar el enlace de conexión, los motores de consulta almacenados en modelo
        no deben tener implicitamente al enlace sino que éste debe ser proporcionado desde aquí.
    */
    
    
    class mgr_DataBase{

        private $DB_CON ;
        //private $DataBase ;

        public function __construct($DBCON){
            $this->DB_CON = $DBCON;//new Root_BasesDatos();
            //$this->DataBase = new DB_Main();
        }

        /*
        Retornar los datos solicitados
        */
        public function estudiante_login_normal($a,$b){
            include __DIR__ . '/../model/db_loginUser.php';
            return dbExec_loginUser($a,$b,$this->DB_CON) ;
        }

        //Obtener programa y ubicación semestral
        public function estudiante_programaUbicacion($a){
            include __DIR__ . '/../model/db_getProgramaUbicacion.php';
            return dbExec_getProgramaUbicacion($a,$this->DB_CON);
        }

        //Obtener datos básicos de usuario loggeado
        public function estudiante_loginBasicoCorrecto($a){
            include __DIR__ . '/../model/db_getBasicData.php';
            return dbExec_getBasicData($a,$this->DB_CON);
        }

        //Obtener el horario de clases estudiante información plana
        public function estudiante_horarioClases($a): array
        {
            include __DIR__ . '/../model/db_getHorarioClases.php';
            return dbExec_getHorarioClases($a,$this->DB_CON);
        }

        //Historia académica: carga de lista de programas cursados 
        public function estudiante_historiaAcademicaPrecarga($a): array
        {
            include __DIR__ . '/../model/db_getHistoriaAcademicaPrecarga.php';
                return dbexec_getHistoriaAcademicaPrecarga($a,$this->DB_CON);
        }

        //Historia académica: cargar el historial del programa elegido
        public function estudiante_historiaAcademicaDatos($a,$p): array
        {
            include __DIR__ .'/../model/db_getHistoriaAcademicaDatos.php';
                return dbexec_getHistoriaAcademicaDatos($a,$p,$this->DB_CON);
        }

    }
