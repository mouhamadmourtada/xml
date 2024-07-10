<?php

namespace Models\Domaine\ElementRestaurant;

use Models\Domaine\ElementRestaurant\Paragraphe;
use Models\Domaine\ElementRestaurant\Prix;
class Menu {

    public $titre;
    /** @var Paragraphe[] $descriptionMenu */
    public $descriptionMenu;
    public Prix $prix;

    /** @var PlatRef[] $elements */
    public $elements;
}