<?php

namespace Models\Domaine\composants;

class Horaire {
    /** @var String[] jours */
    private $jours;
    /** @var String[] heures */
    private $heures;


    public function __construct($jours, $heures) {
        $this->jours = $jours;
        $this->heures = $heures;
    }

    public function getJours() {
        return $this->jours;
    }

    public function getHeures() {
        return $this->heures;
    }

    public function setJours($jours) {
        $this->jours = $jours;
    }

    public function setHeures($heures) {
        $this->heures = $heures;
    }

    public function addJours($jour) {
        $this->jours[] = $jour;
    }

    public function addHoraire($heure) {
        $this->heures[] = $heure;
    }

    public function removeJours($jour) {
        $key = array_search($jour, $this->jours);
        if($key !== false) {
            unset($this->jours[$key]);
        }
    }

    public function removeHoraire($heure) {
        $key = array_search($heure, $this->heures);
        if($key !== false) {
            unset($this->heures[$key]);
        }
    }

}