<?php

    require_once "mamalia.php";
    
    class neko  {
        public $kaki = 4;

        public function __constructor($kaki=4){
            $this->kaki = $kaki;
        }

        public function setKaki($kaki){
            $this->kaki = $kaki;
        }

        public function getKaki(){
            return $this->kaki;
        }
    }
    
    $garong = new neko;
    $anggora = new neko;

    echo $garong->getKaki();

    $bulldong = new Asu;

?>