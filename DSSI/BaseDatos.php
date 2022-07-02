<?php
include 'CfgReader.php';

class BaseDatos
{
    private $hostname;
    private $username;
    private $pkey;
    private $table;
    private $DbConfigRead;

    public function __construct($entorno){
        $this->DbConfigRead = new CfgReader();
        $this->hostname = $this->DbConfigRead->readCfg("host");
        if($entorno == "sudo"){
            $this->username = $this->DbConfigRead->readCfg("rootuser");
            $this->pkey = $this->DbConfigRead->readCfg("rootpkey");
        }else{
            $this->username = $this->DbConfigRead->readCfg("user");
            $this->pkey = $this->DbConfigRead->readCfg("pkey");
        }
        $this->table = $this->DbConfigRead->readCfg("tbl");
    }

    function DB_CON(){
        return mysqli_connect($this->hostname,$this->username,$this->pkey,$this->table);
    }
}