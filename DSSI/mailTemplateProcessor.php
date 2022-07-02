<?php
include 'logoSvg.php';
include 'mailTemplatesStore.php';

class mailTemplateProcessor
{
    private $estiloCss;
    private $logosSvg;
    private $templateStore;

    public function __construct()
    {
        $this->estiloCss = "<style>div.unifalsaMail {border: 1px solid #1C6EA4;background-color: #EEEEEE;width: 565px;text-align: center;border-collapse: collapse;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;ivTable.unifalsaMail .divTableCell, .divTable.unifalsaMail .divTableHead {      border: 1px solid #AAAAAA;      padding: 3px 2px;    }    .divTable.unifalsaMail .divTableBody .divTableCell {      font-size: 13px;    }    .divTable.unifalsaMail .divTableRow:nth-child(even) {      background: #D0E4F5;    }    .divTable.unifalsaMail .divTableHeading {      background: #1C6EA4;      background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);      background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);      background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);      border-bottom: 2px solid #444444;    }    .divTable.unifalsaMail .divTableHeading .divTableHead {      font-size: 15px;      font-weight: bold;      color: #FFFFFF;      border-left: 2px solid #D0E4F5;    }    .divTable.unifalsaMail .divTableHeading .divTableHead:first-child {      border-left: none;    }    .unifalsaMail .tableFootStyle {      font-size: 14px;    }    .unifalsaMail .tableFootStyle .links {         text-align: right;    }    .unifalsaMail .tableFootStyle .links a{      display: inline-block;      background: #1C6EA4;      color: #FFFFFF;      padding: 2px 8px;      border-radius: 5px;    }    .unifalsaMail.outerTableFooter {      border-top: none;    }    .unifalsaMail.outerTableFooter .tableFootStyle {      padding: 3px 5px;    }    .divTable{ display: table; }    .divTableRow { display: table-row; }    .divTableHeading { display: table-header-group;}    .divTableCell, .divTableHead { display: table-cell;}    .divTableHeading { display: table-header-group;}    .divTableFoot { display: table-footer-group;}    .divTableBody { display: table-row-group;}    .autoEmail{font-size: 10px;}</style>";
        $this->logosSvg = new logoSvg();
        $this->templateStore = new mailTemplatesStore();
    }


    //Método principal único de respuesta
    /**
     * @param $aplicativo
     * @param $contenidoAuxiliar
     * @return string
     */
    public function obtenerPlantillaCorreo($aplicativo, $contenidoAuxiliar): string
    {
        $salida = "";

        switch ($aplicativo){
            case "matricula_cancelacion":
                $salida = $this->estiloCss.$this->templateStore->plantilla_matricula_cancelacion($contenidoAuxiliar);
                break;

            default:
                $salida= "ERROR LOADING MAIL TEMPLATE";
        }
        return $salida;
    }


}