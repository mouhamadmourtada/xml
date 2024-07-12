<?php

namespace models\domaine;

use models\dao\FilmDao;
use SimpleXMLElement;

class Cinema extends SimpleXMLElement{
    public $films = [];

    public function __construct($films)
    {
        $this->films = $films;
    }
    

    public function addFilm($film){
        $this->films[] = $film;
    }

    public function removeFilm($film){
        $key = array_search($film, $this->films);
        unset($this->films[$key]);
    }
} 