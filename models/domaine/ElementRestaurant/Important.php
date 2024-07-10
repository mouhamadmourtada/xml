<?php

namespace Models\Domaine\ElementRestaurant;

class Important {
    
    private $content;

    public function __construct($content) {
        $this->content = $content;
    }
    
    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }
}