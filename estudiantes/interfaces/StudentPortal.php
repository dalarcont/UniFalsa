<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include __DIR__ . '/../../DSSI/Estudiantes.php';
include __DIR__ . '/../../DSSI/BaseDatos.php';
include __DIR__ . '/../../DSSI/vars_AcademicasGenerales.php';
include __DIR__ . '/../controllers/mgr_DataBase.php';
include __DIR__ . '/../controllers/mgr_Views.php';
require __DIR__ . '/../interfaces/I_StudentsApps.php';


//No incluir el archivo main de vistas dado que el mismo ya está precargado en el invocador ajax que llama a este archivo

class StudentPortal implements I_StudentsApps{

    private $Acceso ;
    private $Vistas ;
    private $mgr_DataBase ;
    private $RootSistemas ;
    private $DataBaseConnection ;

    private function EncSession($a,$b): string
    {
        $Head = "U"; $Tail = "F"; $Spacer = "UN1F4L54";
        return $Head.base64_encode($a).$Spacer.base64_encode($b).$Tail;
    }
    private function DecSession($e): array
    {
        return array(
            base64_decode(substr(explode("UN1F4L54",$e)[0],1)), //USR
            base64_decode(substr(explode("UN1F4L54",$e)[1],0,-1)) //PKEY
            );
    }

    public function __construct(){
        $this->Acceso = new Estudiantes();
        $this->Vistas = new mainVistas();
        $this->RootSistemas = new vars_AcademicasGenerales();
        $this->DataBaseConnection = new BaseDatos("estudiantes");
        $this->mgr_DataBase = new mgr_DataBase($this->DataBaseConnection->DB_CON());
    }

    //Vista publica
    public function Vistas(): mainVistas
    {
        return $this->Vistas;
    }

    //Acceso a identificarse como estudiante (habilitar tanto formulario como conexión)
    public function appset_Access(){
        if($this->Acceso->get_accesoPortal()){
            //Habilitar formulario de conexión
            return $this->Vistas->loginForm(true);
        }else{
            return $this->Vistas->loginForm(false);
        }
    }

    //Obtener los criterios de acceso cuando hay condiciones
    public function appset_AccessCriteria()
    {
        $Pkg = $this->Acceso->get_accesoCriterios();
        if(!empty($Pkg)){
            return $Pkg;
        }else{
            return false;
        }
    }

    //Verificar usuario para acceder al sistema
    public function appset_VerifyUser($a,$b){
        $ArrayAcceso = $this->mgr_DataBase->estudiante_login_normal($a,$b);
        if(!empty($ArrayAcceso)){
            //Existe estudiante porque hay datos
            //Verificar que esté habilitado para ingreso:
                switch($ArrayAcceso["ESTADOGENERAL"]){
                    case 6:
                        //Es primíparo
                        if($this->appset_AccessCriteria()){
                            //La universidad estableció criterios de ingreso, pero por defecto, los estudiantes de primer semestre nuevos o cursantes que por créditos siguen en 1er semestre NO tienen acceso al sistema hasta iniciado el semestre
                            echo "<b style='color:red;'>No se permite el acceso.<br>Tu acceso está permitido el día antes de dar inicio al semestre.</b>";
                            
                        }else{
                            //No hay acceso con condiciones
                            echo "<b style='color:red;'>Oh! PRIMÍPARO! Bienvenido!<br><br>Por favor espere...</b>";
                            //Crear datos de sesión encriptados
                            $ENCDATA = $this->EncSession($a,$b);
                            session_start();
                            $_SESSION['Appset_UserData'] = $ENCDATA ;
                            echo "<script>function GoToPortal() {  window.location = 'Portal.php'; } setTimeout('GoToPortal()', 2500);</script>";
                        }
                    break;
                    default:
                        //Cualquier otro estado: Inactivo;Activo;Suspendido;Prueba
                        if($this->appset_AccessCriteria()){
                            //Obtener programa, ubicación semestral
                            $CriterosEstablecidos  = $this->appset_AccessCriteria();
                            $CriteriosEstudiante = $this->mgr_DataBase->estudiante_programaUbicacion($a);
                            $e_Programa = $CriteriosEstudiante[0]; $e_Ubicacion = $CriteriosEstudiante[1]; $e_fecha = date("d-m-Y"); $e_hora = date("h:i");
                            $c_fecha = $CriterosEstablecidos[$e_Programa][$e_Ubicacion]["Fecha"]; $c_hora = $CriterosEstablecidos[$e_Programa][$e_Ubicacion]["Hora"];
                            if($e_Ubicacion==1){
                                //Estudiantes de primer semestre no tienen acceso al sistema de información hasta una vez comience el semestre
                                echo "<b style='color:red;'>No se permite el acceso.<br>Estudiantes de primer periodo no pueden ingresar. Podrán hacerlo el día de inicio de periodo</b>";
                            }else{
                                if(($c_fecha>=$e_fecha) && ($e_hora>=$c_hora)){
                                    //Ambos criterios se cumplen
                                    echo "<b style='color:red;'>Por favor espere...</b>";
                                    //Crear datos de sesión encriptados
                                    $ENCDATA = $this->EncSession($a,$b);
                                    session_start();
                                    $_SESSION['Appset_UserData'] = $ENCDATA ;
                                    echo "<script>function GoToPortal() {  window.location = 'Portal.php'; } setTimeout('GoToPortal()', 2500);</script>";
                                }else{
                                    //No se cumplen criterios
                                    echo "<b style='color:red;'>No se permite el acceso.<br>Tu acceso está permitido a partir de la siguiente fecha: ",$c_fecha," - ",$c_hora,"</b>";
                                }
                            }
                        }else{
                            //Crear datos de sesión encriptados
                            $ENCDATA = $this->EncSession($a,$b);
                            session_start();
                            $_SESSION['Appset_UserCred'] = $ENCDATA ;
                            echo "<b style='color:red;'>Por favor espere...</b>";
                            echo "<script>function GoToPortal() {  window.location = 'Portal.php'; } setTimeout('GoToPortal()', 2500);</script>";
                        }
                    break;
                        
                    case 3:
                        //Fuera por un semestre
                        $this->Vistas->Alerta("Simple_Redir","Portal estudiantes","Tu estado general actual: <b>FUERA<b /><br />No permite tu ingreso durante el semestre activo.<br />Puedes ingresar al finalizar el semestre.",null,"index.php");
                    break;
                    case 5:
                        //Expulsado por completo
                        $this->Vistas->Alerta("Simple_Redir","Portal estudiantes","Tu estado general actual: <b>EXPULSIÓN COMPLETA<b /><br />No permite tu ingreso a esta universidad nunca más.<br />",null,"index.php");
                    break;
                
                }
        }else{
            //Estudiante no existe
            echo "<b style='color:red;'>Estudiante no encontrado.<br>Verifique sus datos.</b>";
        }
    }

    //Datos básicos del usuario loggeado
    public function appset_LoggedUserData($e){
        //Para este método los valores $a y $b se generan mediante la decodificación de $e
        $a = $this->DecSession($e)[0];
        return $this->mgr_DataBase->estudiante_loginBasicoCorrecto($a);
    }

    //Mostrar al estudiante su perfil
    public function appset_informacionEstudiante(){ 
        session_start();
        $this->Vistas->perfilEstudiante($_SESSION['UsrPkgBasicData']);
    }

    //Cancelación de semestre
    public function appset_cancelacionSemestre(){
        session_start();

            if($this->Acceso->get_accesoCancelarSemestre()){
                $data = array(
                    'InfoPeriodo' => $this->RootSistemas::infoPregrado_Actual, 
                    'ProgramaCodigo' => $_SESSION['UsrPkgBasicData']["ULTIMOPROGRAMAMATRICULADO"],
                    'ProgramaNombre' => $_SESSION['UsrPkgBasicData']["NOMBREPROGRAMA"]
                );
                $this->Vistas->unsetSemestreForm(true,$data);
            }else{
                $this->Vistas->unsetSemestreForm(false,null);
            }
    }
        //Derivada de cancelación de semestre
        public function prepareUnset($value){
            session_start();
            if(($value==$_SESSION['UsrPkgBasicData']["ULTIMOPROGRAMAMATRICULADO"]) && ($value!="PROGRAMA ACADÉMICO MATRICULADO")){
                echo '<button id="execUnset" class="art-button" onclick="unsetSemesterDo()">CONFIRMO CANCELAR SEMESTRE</button>';
            }
        }
    
    //Horario de clases
    public function appset_horarioClases(){
        session_start();
        $data = $this->mgr_DataBase->estudiante_horarioClases($_SESSION['UsrPkgBasicData']['NICKNAME']);
        /*
        Proceso de ajuste de datos para envío a gráficos
         */
        $dataRenderHorario = array(
            "Lunes" => array(),
            "Martes" => array(),
            "Miercoles" => array(),
            "Jueves" => array(),
            "Viernes" => array(),
            "Sabado" => array(),
            "Domingo" => array(),
        );
        $asg = array();
        for($asignatura=0; $asignatura<=(sizeof($data)-1); $asignatura++){
            //Asignaturas 
            
            $asg[] = $data[$asignatura]["codigoLiteral"];
            //Se inicializa el siguiente for en 5 hasta el 11 que representa las columnas Lunes a Martes al traerse de la base de datos
            for($dia=5; $dia<=11; $dia++){
                if(!empty($data[$asignatura][$dia])){
                    $separar = explode("/",$data[$asignatura][$dia]); // Separamos de este valor la propiedad de lugar y horario
                    $arr_Horario = explode(">>",$separar[1]); //Separar la hora de inicio y hora de cierre de la clase
                    //Configuración del día de la respectiva asignatura
                    
                    $horarioDia = array(
                        "Codigo" => $data[$asignatura]["codigoLiteral"],
                        "Desde" => $arr_Horario[0],
                        "Hasta" => $arr_Horario[1]
                    );
                    if($dia==5){
                        //Guardar configuracón
                        $dataRenderHorario["Lunes"][] = $horarioDia;
                    }
                    if($dia==6){
                        //Guardar configuracón
                        $dataRenderHorario["Martes"][] = $horarioDia;
                    }
                    if($dia==7){
                        //Guardar configuracón
                        $dataRenderHorario["Miercoles"][] = $horarioDia;
                    }
                    if($dia==8){
                        //Guardar configuracón
                        $dataRenderHorario["Jueves"][] = $horarioDia;
                    }
                    if($dia==9){
                        //Guardar configuracón
                        $dataRenderHorario["Viernes"][] = $horarioDia;
                    }
                    if($dia==10){
                        //Guardar configuracón
                        $dataRenderHorario["Sabado"][] = $horarioDia;
                    }
                    if($dia==11){
                        //Guardar configuracón
                        $dataRenderHorario["Domingo"][] = $horarioDia;
                    }
                }
            }
        }  //Obtener datos
        $this->Vistas->show_horarioClases($data,$dataRenderHorario,$asg);   //Mostrar datos
    }

    //Historia académica
    public function appset_historiaAcademicaLista(){
        session_start();
        $a = $_SESSION['UsrPkgBasicData']['NICKNAME'];
        $data = $this->mgr_DataBase->estudiante_historiaAcademicaPrecarga($a);
        $this->Vistas->show_historiaAcademicaListados($data);
    }

    //Historia académica cargar historial
    public function appset_historiaAcademicaDatos($prog){
        session_start();
        $a = $_SESSION['UsrPkgBasicData']['NICKNAME'];
        $data = $this->mgr_DataBase->estudiante_historiaAcademicaDatos($a,$prog);
        $this->Vistas->show_historiaAcademicaDatos($data);

    }

}