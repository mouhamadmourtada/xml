<?php

namespace controllers;

use controllers\Controller;
use models\domaine\Restaurant;
use models\domaine\composants\Coordonnee;
use Models\Domaine\composants\Image;
use Models\Domaine\composants\Menu;
use Models\Domaine\composants\Paragraphe;
use Models\Domaine\composants\Plat;
use Models\Domaine\composants\PlatRef;
use Models\Domaine\composants\Prix;

class RestaurantController extends Controller{

    // donne moi le code du controlleru

    public function index(){
        $restaurants = Restaurant::all();
        return $this->view('restaurant/index', compact('restaurants'));
    }


    public function create(){
        return $this->view('restaurant/create');
    }

    public function store(){
        // $restaurant = new Restaurant();
        // $restaurant->nom = $_POST['nom'];
        // $restaurant->adresse = $_POST['adresse'];
        // $restaurant->telephone = $_POST['telephone'];
        // $restaurant->save();
        return $this->redirect('restaurant');
    }

    public function edit(){
        $restaurant = Restaurant::find($_GET['id']);
        return $this->view('restaurant/edit', compact('restaurant'));
    }


    public function update(){
        // $restaurant = Restaurant::find($_POST['id']);
        // $restaurant->nom = $_POST['nom'];
        // $restaurant->adresse = $_POST['adresse'];
        // $restaurant->telephone = $_POST['telephone'];
        // $restaurant->save();
        return $this->redirect('restaurant');
    }


    public function destroy($params){
        // $restaurant = Restaurant::find($params['id']]);
        // $restaurant->delete();
        return $this->redirect('restaurant');
    }


    public function show($params){

        // $restaurant = Restaurant::find($params['id']);
        $coordonnees = new Coordonnee("Chez Mo","Fann Hock","Modou Fedior");

        $descriptionRestaurant = [
            new Paragraphe([
            ["texte","Ce restaurant est le meilleur de la place"],
            ["important","Il faut noter que nous n'avons pas encore de service de livraison"],
            ["liste",[
                "liste1", "liste2", "liste3"
            ]],
            ["image", new Image(
                "https://picsum.photos/200/300",
                "gauche"
            )],
        ])];

        $cartes = [];
        $mdParagraphe = new Paragraphe(
            [
                ["texte","Ce restaurant est le meilleur de la place"],
                ["important","Il faut noter que nous n'avons pas encore de service de livraison"],
                ["liste",[
                    "liste1", "liste2", "liste3"
                ]],
                ["image", new Image(
                    "https://picsum.photos/200/300",
                    "centre"
                )]
            ]
        );

        $plat1 = new Plat(
            new Prix(100, "xof"),
            $mdParagraphe,
            "entree",
            "plat_1"
        );

        $cartes[] = $plat1;
        $cartes[] = $plat1;
        $cartes[] = $plat1;
        $cartes[] = $plat1;


        $menus = [];

        $elements = [];
        $elements[] = new PlatRef("plat_1");
        $elements[] = new PlatRef("plat_2");
        $elements[] = new PlatRef("plat_3");
        $elements[] = new PlatRef("plat_4");

        $menu = new Menu(
            "Menu 1",
            [$mdParagraphe, $mdParagraphe, $mdParagraphe],
            new Prix(1000, "xof"),
            $elements
        );
        
        $menus[] = $menu;
        $menus[] = $menu;
        $menus[] = $menu;
        $menus[] = $menu;


            
        $restaurant = new Restaurant(
            $coordonnees,
            $descriptionRestaurant,
            $cartes,
            $menus
        );
        


        return $this->view('restaurant/show', ["restaurant" =>$restaurant ]);
    }


    
}