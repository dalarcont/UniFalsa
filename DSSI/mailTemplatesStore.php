<?php

class mailTemplatesStore
{
    public function plantilla_matricula_cancelacion($contenidoAuxiliar): string
    {
        return "<div class='divTable unifalsaMail'>    <div class='divTableHeading'>    <div class='divTableRow'>    <div class='divTableHead'><?xml version='1.0' encoding='UTF-8' standalone='no'?>    <img src='".$this->logosSvg::$logoSvg."' width='64px'; height='64px;'> <br>Universidad Falsa</div>    </div>    </div>    <div class='divTableBody'>    <div class='divTableRow'>    <div class='divTableCell'><br>Operación en matrícula académica<br></div>    </div>    <div class='divTableRow'>    <div class='divTableCell'><br>Notificación de cancelación de asignatura<br></div>    </div>    <div class='divTableRow'>    <div class='divTableCell'><br>Estudiante, esperamos esté bien, sino, nos da igual.<br>                                <br>Para esta ocasión debemos notificarle que usted ha realizado la cancelación de la asignatura:<br>                                <br><b>".$contenidoAuxiliar[1]." - ".$contenidoAuxiliar[2]."</b><br>                                <br>La operación fue realizada desde el portal estudiantil en la fecha: ".$contenidoAuxiliar[3]."<br>                            </div>    </div>    <div class='divTableRow'>    <div class='divTableCell'><span class='autoEmail'><i>NO RESPONDA A ESTA COMUNICACIÓN, ESTO ES UN MENSAJE AUTOMATIZADO</i></span><br>        <br>Sistema de Gestión de Matrícula Académica<br />        División Superior Registro y Control<br /><br />Universidad Falsa<br />2022</div>    </div>    </div>    </div>";
    }


}