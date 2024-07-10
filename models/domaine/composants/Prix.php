<?php

namespace Models\Domaine\composants;

class Prix {
    private $montant;
    private $devise;

    public function __construct($montant, $devise) {
        $this->montant = $montant;
        $this->devise = $devise;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function getDevise() {
        return $this->devise;
    }

    public function setMontant($montant) {
        $this->montant = $montant;
    }

    public function setDevise($devise) {
        $this->devise = $devise;
    }

    public function __toString() {
        return $this->montant . " " . $this->devise;
    }
}