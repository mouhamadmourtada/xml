<?php

namespace Models\Domaine\composants;

class Image{
    public $url;
    public $position;

    //getter url et position
    public function getUrl(){
        return $this->url;
    }
    public function getPosition(){
        return $this->position;
    }


    public function __construct($url, $position) {
        $this->url = $url;
        $this->position = $position;
    }
}