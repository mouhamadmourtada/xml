<?php

namespace Models\Domaine\composants;

class PlatRef {
    
    private $plat_id;

    public function __construct($plat_id) {
        $this->plat_id = $plat_id;
    }

    public function getPlatId() {
        return $this->plat_id;
    }

    public function setPlatId($plat_id) {
        $this->plat_id = $plat_id;
    }
}