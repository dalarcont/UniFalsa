<?php

class mailFromAddress
{
    public static final function obtenerDireccionRemitente($aplicativo){
        $r = null;
        switch ($aplicativo){
            case "matricula":
            case "matricula_cancelacion":
                $r = "matricula@unifalsa.com";
                break;

            case "estudiantes":
                $r = "estudiantes@unifalsa.com";
                break;
        }
        return $r;
    }
}