<?php

namespace Models\Domaine\ElementRestaurant;

use Models\Domaine\ElementRestaurant\Paragraphe;
use Models\Domaine\ElementRestaurant\Prix;

class Plat {

    public Prix $prix;

    public Paragraphe $descriptionPlat;
    public $type;
    public $plat_id;
}