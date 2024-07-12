<?php

namespace Models\Domaine\composants;

class NoteSpectateur {
    private $valeur;
    private $base;

    public function __construct($valeur = null, $base = null) {
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