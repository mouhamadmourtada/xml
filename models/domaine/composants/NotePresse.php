<?php

namespace Models\Domaine\composants;

class NotePresse {
    private $valeur;
    private $base;

    public function __construct($valeur, $base) {
        $this->valeur = $valeur;
        $this->base = $base;
    }

    public function getValeur() {
        return $this->valeur;
    }

    public function getBase() {
        return $this->base;
    }

    public function setValeur($valeur) {
        $this->valeur = $valeur;
    }

    public function setBase($base) {
        $this->base = $base;
    }

}