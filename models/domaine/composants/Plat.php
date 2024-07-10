<?php

namespace Models\Domaine\composants;

use Models\Domaine\composants\Paragraphe;
use Models\Domaine\composants\Prix;

class Plat {

    private Prix $prix;
    private Paragraphe $descriptionPlat;
    private $type;
    private $plat_id;

    public function __construct($prix, $descriptionPlat, $type, $plat_id){
        $this->prix = $prix;
        $this->descriptionPlat = $descriptionPlat;
        $this->type = $type;
        $this->plat_id = $plat_id;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function getDescriptionPlat(){
        return $this->descriptionPlat;
    }

    public function getType(){
        return $this->type;
    }

    public function getPlatId(){
        return $this->plat_id;
    }

    public function setPrix($prix){
        $this->prix = $prix;
    }

    public function setDescriptionPlat($descriptionPlat){
        $this->descriptionPlat = $descriptionPlat;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function setPlatId($plat_id){
        $this->plat_id = $plat_id;
    }

}