<?php

namespace Models\Domaine\composants;

class Coordonnee{
    private $nom;
    private $adresse;
    private $restaurateur;


    public function __construct($nom, $adresse, $restaurateur){
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->restaurateur = $restaurateur;
    }


    public function getNom(){
        return $this->nom;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getRestaurateur(){
        return $this->restaurateur;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }

    public function setRestaurateur($restaurateur){
        $this->restaurateur = $restaurateur;
    }

   

}