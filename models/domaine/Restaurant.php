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


    public function __construct($coordonnees, $descriptionRestaurant, $cartes, $menus, $id = null){
        parent::__construct($id);
        $this->coordonnees = $coordonnees;
        $this->descriptionRestaurant = $descriptionRestaurant;
        $this->cartes = $cartes;
        $this->menus = $menus;

        $this->dao = new RestaurantDao();
    }

    public function getCoordonnees(){
        return $this->coordonnees;
    }

    public function getDescriptionRestaurant(){
        return $this->descriptionRestaurant;
    }



    public function getCartes(){
        return $this->cartes;
    }

    public function getMenus(){
        return $this->menus;
    }

    public function setCoordonnees($coordonnees){
        $this->coordonnees = $coordonnees;
    }

    public function setDescriptionRestaurant($descriptionRestaurant){
        $this->descriptionRestaurant = $descriptionRestaurant;
    }

    public function setCartes($cartes){
        $this->cartes = $cartes;
    }

    public function setMenus($menus){
        $this->menus = $menus;
    }


    public function addMenu($menu){
        $this->menus[] = $menu;
    }

    public function removeMenu($menu){
        $index = array_search($menu, $this->menus);
        if($index !== false){
            unset($this->menus[$index]);
        }
    }

    public function addPlat($plat){
        $this->cartes[] = $plat;
    }

    public function removePlat($plat){
        $index = array_search($plat, $this->cartes);
        if($index !== false){
            unset($this->cartes[$index]);
        }
    }





    public static function all(){
        return RestaurantDao::all();
    }

    public static function find($id){
        return RestaurantDao::find($id);
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