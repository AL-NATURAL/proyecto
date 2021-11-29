<?php
    class Infraccion{

        public $idinfraccion;
        public $infraccionus;
        public $inffecha;

        public function __construct($idinfraccion,$infraccionus,$inffecha){
            $this->idinfraccion=$idinfraccion;
            $this->InfraccionUs=$infraccionus;
            $this->InfFecha=$inffecha;
        }

        public static function VerInfracciones(){
            $infracciones=[];
            $conn=DataBase::createobj();
            $sql=$conn->query("SELECT * FROM infracciones");
            foreach($sql->fetchAll() as $infraccionbd){
                $infracciones=new Infraccion($infraccionbd['idinfraccion'],$infraccionbd['InfraccionUs'],$infraccionbd['InfFecha']);
            }
            return $infracciones;
        }

        public static function NInfraccion($infuser){
            $conn=DataBase::createobj();
            $sql=$conn->prepare("INSERT INTO infracciones(InfraccionUs,InfFecha) values(?,now())");
            $sql->execute(array($infuser));
        }

 
    }

?>