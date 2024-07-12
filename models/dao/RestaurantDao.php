<?php

namespace Models\Dao;

use models\dao\ModelDao;
use Models\Domaine\Restaurant;
use Models\Domaine\composants\Coordonnee;
use SimpleXMLElement;
use Models\Domaine\composants\Paragraphe;
use Models\Domaine\composants\Menu;
use Models\Domaine\composants\Plat;
use services\RestaurantDaoService;

class RestaurantDao extends ModelDao {
    
        private RestaurantDaoService $restaurantDaoservice;

        public function __construct(
        ) {
            parent::__construct();
            $this->restaurantDaoservice = new RestaurantDaoService();
        }
    
        public static function all() {


           if(file_exists($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml')){
                $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml');
                $restaurants = [];
                $restaurantDaoservice = new RestaurantDaoService();
                foreach($xml->children() as $restaurant){
                    $coordonnees = $restaurantDaoservice->getCoordonneesFromXMLCoordonnees($restaurant->coordonnees);
                    
                    $descriptionRestaurant = [];
                    foreach($restaurant->descriptionRestaurant->children() as $paragraphe){
                        $descriptionRestaurant[] = $restaurantDaoservice->getParagrapheFromXML($paragraphe);
                    }
                    $carte = [];
                    
                    foreach($restaurant->carte->children() as $plat){
                        // $cartes = [];
                        $carte[] =  $restaurantDaoservice->getPlatFromXML($plat);
                        
                    }
                    $menus = [];
                    foreach($restaurant->menus->children() as $menu){
                        $menus[] = $restaurantDaoservice->getMenuFromXML($menu);
                    }

                    $restaurants[] = new Restaurant($coordonnees, $descriptionRestaurant, $carte, $menus, $restaurant["id_restaurant"]);
                }
                return $restaurants;
            }else{
                // sanni exception
                echo "Le fichier n'existe pas";
            }
            
            
        }
    
        public static function find($id) {
           if(file_exists($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml')){
                $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml');
                $restaurantDaoservice = new RestaurantDaoService();
                foreach($xml->children() as $restaurant){
                    if($restaurant["id_restaurant"] == $id){
                        $coordonnees = $restaurantDaoservice->getCoordonneesFromXMLCoordonnees($restaurant->coordonnees);
                    
                        $descriptionRestaurant = [];
                        foreach($restaurant->descriptionRestaurant->children() as $paragraphe){
                            $descriptionRestaurant[] = $restaurantDaoservice->getParagrapheFromXML($paragraphe);
                        }
                        $carte = [];
                        
                        foreach($restaurant->carte->children() as $plat){
                            $carte[] =  $restaurantDaoservice->getPlatFromXML($plat);
                            
                        }
                        $menus = [];
                        foreach($restaurant->menus->children() as $menu){
                            $menus[] = $restaurantDaoservice->getMenuFromXML($menu);
                        }
                        return new Restaurant($coordonnees, $descriptionRestaurant, $carte, $menus, $restaurant["id_restaurant"]);
                    }
                }
            }else{
                // sanni exception
                echo "Le fichier n'existe pas";
            }
        }
    
        public  function save($restaurant) {
            if(file_exists($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml')){
                $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml');
                $restaurantDaoservice = new RestaurantDaoService();
                $restaurant->setId('restaurant_'.(RestaurantDao::getLastId() + 1));

                $xmlRestaurant = $restaurantDaoservice->getRestaurantXMLfromRestaurant($restaurant);
                $restaurantDaoservice->addRestaurantToXML($xml, $xmlRestaurant);
                $xml->asXML($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml');
            }else{
                // sanni exception
                echo "Le fichier n'existe pas";
            }
        }
    
        public function update($restaurant) {
            if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/xml/storage/restaurant.xml')) {
                $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"] . '/xml/storage/restaurant.xml');
                $restaurantDaoservice = new RestaurantDaoService();
                foreach ($xml->children() as $xmlRestaurant) {
                    if ((String) $xmlRestaurant["id_restaurant"] == $restaurant->getId()) {
                        $dom = dom_import_simplexml($xmlRestaurant);
                        $newRestaurant = $restaurantDaoservice->getRestaurantXMLfromRestaurant($restaurant);
                        $newDom = dom_import_simplexml($newRestaurant);
                        
                        // Importer le nouveau nœud dans le document DOM existant
                        $newDom = $dom->ownerDocument->importNode($newDom, true);
                        
                        $dom->parentNode->replaceChild($newDom, $dom);
                    }
                }
                $xml->asXML($_SERVER["DOCUMENT_ROOT"] . '/xml/storage/restaurant.xml');
            } else {
                // Sanni exception
                echo "Le fichier n'existe pas";
            }
        }
        
    
        public function delete($restaurant) {

            if(file_exists($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml')){
                $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml');
                $restaurantDaoservice = new RestaurantDaoService();

                foreach($xml->children() as $xmlRestaurant){                    
                    
                    if((String) $xmlRestaurant["id_restaurant"] == $restaurant->getId()){
                        $dom = dom_import_simplexml($xmlRestaurant);
                        $dom->parentNode->removeChild($dom);
                    }
                }
                $xml->asXML($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml');
            }else{
                // sanni exception
                echo "Le fichier n'existe pas";
            }
        }

        public static function getLastId(){
            if(file_exists($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml')){
                $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml');
                $lastId = 0;
                foreach($xml->children() as $restaurant){
                    $id = explode('_', $restaurant['id_restaurant'])[1];
                    if($id > $lastId){
                        $lastId = $id;
                    }
                }
                return $lastId;
            }else{
                // sanni exception
                echo "Le fichier n'existe pas";
            }
        }


        public static function getLastIdPlat(){
            if(file_exists($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml')){
                $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/restaurant.xml');
                $lastId = 0;
                foreach($xml->children() as $restaurant){
                    foreach($restaurant->carte->children() as $plat){
                        $id = explode('_', $plat['plat_id'])[1];
                        if($id > $lastId){
                            $lastId = $id;
                        }
                    }
                }
                return $lastId;
            }else{
                // sanni exception
                echo "Le fichier n'existe pas";
            }
        }
    
       
}