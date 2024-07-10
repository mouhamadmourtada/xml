<?php

namespace Models\Domaine\ElementRestaurant;

class Paragraphe {

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

   
    public function addElement($element){
        $this->content[] = $element;
    }

    public function removeElement($element){
        $index = array_search($element, $this->content);
        if($index !== false){
            unset($this->content[$index]);
        }
    }

}