<?php

namespace Models\Domaine;

use Models\Domaine\composants\Coordonnee;
use models\domaine\Model;
use models\domaine\composants\DescriptionRestaurant;
use models\domaine\composants\Menu;
use models\domaine\composants\Plat;
use models\domaine\composants\Paragraphe;
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

    public function getCoordonnees(){
        return $this->coordonnees;
    }
    // Getters plat et menu
    public function getCartes(){
        return $this->cartes;
    }
    public function getMenus(){
        return $this->menus;
    }
    //getter descriptionrestaurant
    public function getDescriptionRestaurant(){
        return $this->descriptionRestaurant;
    }




    public static function all(){
        return RestaurantDao::all();
    }

    public static function find($id){

    }

    public function save(){
        $this->dao->save($this);

    }

    public function update(){
        $this->dao->update($this);
    }

    public function delete(){
        $this->dao->delete($this);

    }
       


}