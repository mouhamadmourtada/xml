<?php

namespace Models\Domaine\composants;

class Paragraphe {

    private $content; 
    // $content[] = ["chaine", "chaine", "chaine"]
    // $content[] = ["image", $image]

    // $content = [
    //     ["chaine", "chaine"],
    //     ["image", $image]
    // ]    ["important", ""]
    // ]
    
    public function __construct($content = []) {
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