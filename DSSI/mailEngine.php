<?php
include 'mailTemplateProcessor.php';
include 'mailFromAddress.php';
class mailEngine
{
    private $plantillas;
    private $emisores;

    public function __construct()
    {
        $this->plantillas = new mailTemplateProcessor();
        $this->emisores = new mailFromAddress();
    }


    /**
     * @param $aplicativo -> Indicar desde qué aplicativo del sistema se está haciendo la llamada a este método
     * @param $destinatario -> Indicar el correo de destino
     * @param $contenidos -> array[SIEMPRE el elemento 0 indica el asunto, ya la demás cantidad de elementos dependerá de la aplicación que invoque el envío de correos]
     * @return void
     */
    function enviarCorreo($aplicativo, $destinatario, $contenidoAuxiliar){
        $source = $this->emisores::obtenerDireccionRemitente($aplicativo);//Obtener dirección de correo remitente según el aplicativo que invoca
        $asunto = $contenidoAuxiliar[0];
        $contenido = $this->plantillas->obtenerPlantillaCorreo($aplicativo,$contenidoAuxiliar);//Invocar plantilla según aplicativo e ingresar los datos correspondientes para diligenciarla
        $cabeceras = "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-Type: text/html; charset=\"UTF-8\"\r\n";
        $cabeceras .= "Content-Transfer-Encoding: 8bit\r\n";
        $cabeceras .= "From:" . $source;
        //Enviar
        mail($destinatario, mb_encode_mimeheader($asunto), $contenido, $cabeceras);
    }
}