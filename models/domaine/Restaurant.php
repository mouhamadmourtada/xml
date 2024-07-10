<?php

namespace Models\Domaine;

use Models\Domaine\ElementRestaurant\Coordonnee;
use models\domaine\Model;
use models\domaine\elementRestaurant\DescriptionRestaurant;
use models\domaine\elementRestaurant\Menu;
use models\domaine\elementRestaurant\Plat;
use models\domaine\elementRestaurant\Paragraphe;
use models\dao\RestaurantDao;

class Restaurant extends Model{


    private $dao = null;
  

    private Coordonnee $coordonnees;
    /** @var Paragraphe[] $descriptionRestaurant */
    
    private $descriptionRestaurant;

    /** @var Plat[] $cartes */
    private $cartes ;

    /** @var Menu[] $menus */
    private $menus ;


    public function __construct($coordonnees, $descriptionRestaurant, $cartes, $menus){
        $this->coordonnees = $coordonnees;
        $this->descriptionRestaurant = $descriptionRestaurant;
        $this->cartes = $cartes;
        $this->menus = $menus;

        $this->dao = new RestaurantDao();
    }





    public static function all(){
        // $dao = new RestaurantDao();
        return RestaurantDao::all();
    }

    public static function find($id){

    }

    public function save(){

    }

    public function update(){

    }

    public function delete(){

    }
       


}