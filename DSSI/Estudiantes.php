<?php

class Estudiantes
{
    private $accesoPortal = TRUE;
    private $accesoCancelarSemestre = TRUE;

    //Determinar acceso a estudiantes
    function get_accesoPortal(): bool
    {
        return $this->accesoPortal;
    }

    function get_accesoCriterios(): array
    {
        //Retornar el siguiente si no hay criterios
        return array();
        //Retornar lo siguiente si existen criterios
            //Estructura

            /*
             return array(
                "01234" => array(
                    1 => array("Fecha" => null, "Hora" => null),
                    2 => array ("Fecha" => "17-04-2022","Hora" => "02:00"),
                    3 => array ("Fecha" => "17-04-2022","Hora" => "03:00"),
                    4 => array ("Fecha" => "17-04-2022","Hora" => "04:00"),
                    5 => array ("Fecha" => "17-04-2022","Hora" => "05:00"),
                    6 => array ("Fecha" => "17-04-2022","Hora" => "06:00"),
                    7 => array ("Fecha" => "17-04-2022","Hora" => "07:00")
                )
            );
             * */
    }

    //Cancelación de semestre
    function get_accesoCancelarSemestre(): bool
    {
        return $this->accesoCancelarSemestre;
    }

}