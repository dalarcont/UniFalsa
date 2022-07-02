<?php
include 'EncodeUtility.php';

class CfgReader
{
    private $encode ;

    public function __construct(){
        $this->encode = new EncodeUtility();
    }


    /**
     * @param $param -> Indica qué parámetro se necesita leer
     * @return string -> Retorna el valor requerido ya decodificado
     */
    public function readCfg($param){
        $CfgFile = fopen(__DIR__ .'/../DSSI/system.properties',"r") or die("ERROR TRYING TO READ CONFIGURATION FILE");
        $toReturn = "";
        $tempArr[] = array();
        while(! feof($CfgFile)){
            /** @noinspection PhpArrayPushWithOneElementInspection */
            array_push($tempArr,fgets($CfgFile));
        }
        fclose($CfgFile);

        switch ($param){
            case "host":
                $toReturn = $this->encode::decodeData($tempArr[1]);
                break;

            case "user":
                $toReturn = $this->encode::decodeData($tempArr[2]);
            break;

            case "pkey":
                $toReturn = $this->encode::decodeData($tempArr[3]);
            break;

            case "tbl":
                $toReturn = $this->encode::decodeData($tempArr[4]);
            break;

            case "rootuser":
                $toReturn = $this->encode::decodeData($tempArr[5]);
            break;

            case "rootpkey":
                $toReturn = $this->encode::decodeData($tempArr[6]);
            break;

            default:
                $toReturn = NULL;
        }
        return $toReturn;
    }
}