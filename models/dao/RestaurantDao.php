<?php

namespace Models\Dao;

use models\dao\ModelDao;
use Models\Domaine\Restaurant;
use Models\Domaine\composants\Coordonnee;
use SimpleXMLElement;

class RestaurantDao extends ModelDao {
    
        

        public function __construct() {
            parent::__construct();
        }
    
        public static function all() {
            
            // on va manipuler des fichiers xml pour les données
            // il faut load le fichier xml

            // utilise simple_xml_load_file

            if (file_exists($_SERVER['DOCUMENT_ROOT'].'\xml\storage\restaurant.xml')) {
                $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'\xml\storage\restaurant.xml');
            
                print_r($xml);
            } else {
                exit('Echec lors de l\'ouverture du fichier test.xml.');
            }


            $xml = simplexml_load_file('storage/restaurant.php');
            // echo $xml;
            $restaurants = [];
            var_dump($xml);
            die();



            // foreach ($xml->restaurant as $restaurant) {
            //     $coordonnees = new Coordonnee($restaurant->coordonnees->nom, $restaurant->coordonnees->adresse, $restaurant->coordonnees->restaurateur);
            //     $descriptionRestaurant = [];
            //     foreach ($restaurant->descriptionRestaurant->p as $p) {
            //         $descriptionRestaurant[] = new Paragraphe($p);
            //     }
            //     $cartes = [];
            //     foreach ($restaurant->carte->plat as $plat) {
            //         $cartes[] = new Plat($plat->prix->montant, $plat->prix->devise, $plat->descriptionPlat);
            //     }
            //     $menus = [];
            //     foreach ($restaurant->menus->menu as $menu) {
            //         $elements = [];
            //         foreach ($menu->elements->elementMenu as $element) {
            //             $elements[] = $element['idref'];
            //         }
            //         $menus[] = new Menu($menu->titre, $menu->description, $elements);
            //     }
            //     $restaurants[] = new Restaurant($coordonnees, $descriptionRestaurant, $cartes, $menus);
            // }


        }
    
        public static function find($id) {
           
        }
    
        public  function save($restaurant) {
            
        }
    
        public function update( $restaurant) {
          
        }
    
        public function delete($id) {
            
        }
    
       
}