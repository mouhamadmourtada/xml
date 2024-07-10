<?php

namespace Models\Dao;

use models\dao\ModelDao;
use Models\Domaine\Restaurant;
use Models\Domaine\ElementRestaurant\Coordonnee;


class RestaurantDao extends ModelDao {
    
        

        public function __construct() {
            parent::__construct();
        }
    
        public static function all() {
            
            // on va manipuler des fichiers xml pour les données
            $xml = simplexml_load_file("C:\Apache24\htdocs\xml\storage\restaurant.xml");
            var_dump($xml);
            $restaurants = [];
            foreach ($xml->children() as $restaurant) {
                $coordonnee = new Coordonnee($restaurant->coordonnee->nom, $restaurant->coordonnee->adresse, $restaurant->coordonnee->restaurateur);
                $restaurants[] = new Restaurant($coordonnee, $restaurant->descriptionRestaurant, $restaurant->cartes, $restaurant->menus);
            }
        }
    
        public static function find($id) {
           
        }
    
        public  function save() {
            
        }
    
        public function update() {
          
        }
    
        public function delete() {
            
        }
    
        public function getCoordonnee($id) {
            
        }
}