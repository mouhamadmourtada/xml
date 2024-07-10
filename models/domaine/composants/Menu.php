<?php

namespace Models\Domaine\composants;

use Models\Domaine\composants\Paragraphe;
use Models\Domaine\composants\Prix;
class Menu {

    private $titre;
    /** @var Paragraphe[] $descriptionMenu */
    private $descriptionMenu;
    private Prix $prix;

    /** @var PlatRef[] $elements */
    private $elements;

    public function __construct($titre, $descriptionMenu, $prix, $elements){
        $this->titre = $titre;
        $this->descriptionMenu = $descriptionMenu;
        $this->prix = $prix;
        $this->elements = $elements;
    }


    public function getTitre(){
        return $this->titre;
    }

    public function getDescriptionMenu(){
        return $this->descriptionMenu;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function getElements(){
        return $this->elements;
    }

    public function setTitre($titre){
        $this->titre = $titre;
    }

    public function setDescriptionMenu($descriptionMenu){
        $this->descriptionMenu = $descriptionMenu;
    }

    public function setPrix($prix){
        $this->prix = $prix;
    }

    public function setElements($elements){
        $this->elements = $elements;
    }

    
}