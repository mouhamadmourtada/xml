<?php

namespace Models\Domaine\composants;

class Image{
    private $url;
    private $position;


    public function __construct($url, $position) {
        $this->url = $url;
        $this->position = $position;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getPosition() {
        return $this->position;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setPosition($position) {
        $this->position = $position;
    }
    
}