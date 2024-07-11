<?php

namespace controllers;

use controllers\Controller;
use models\domaine\Restaurant;
use models\domaine\composants\Coordonnee;
use models\domaine\composants\Important;
use models\domaine\composants\Image;



class RestaurantController extends Controller{

    // donne moi le code du controlleru

    public function index(){
        // $restaurants = Restaurant::all();

        $restaurants = [
            new Restaurant(
                new Coordonnee('Restaurant A', '123 Rue A, Ville A', 'Nom du restaurateur A'),
                [
                    new Important('Un restaurant charmant avec une excellente cuisine.'),
                    new Image('imageA.jpg', 'right')
                ],
                [],
                []
            ),
            new Restaurant(
                new Coordonnee('Restaurant B', '456 Rue B, Ville B', 'Nom du restaurateur B'),
                [
                    new Important('Un endroit idéal pour dîner avec des amis.'),
                    new Image('imageB.jpg', 'left')
                ],
                [],
                []
                
            ),
            new Restaurant(
                new Coordonnee('Restaurant C', '789 Rue C, Ville C', 'Nom du restaurateur C'),
                [
                    new Important('Un restaurant familial avec une atmosphère chaleureuse.'),
                    new Image('imageC.jpg', 'right')
                ],
                [],
                []
            ),
            new Restaurant(
                new Coordonnee('Restaurant D', '101 Rue D, Ville D', 'Nom du restaurateur D'),
                [
                    new Important('Un restaurant romantique pour les couples.'),
                    new Image('imageD.jpg', 'left')
                ],
                [],
                []
            )


        ];

        // Transformation des restaurants en format adapté pour la vue
        $restaurantData = [];

        foreach ($restaurants as $restaurant) {
            $description = [];
            foreach ($restaurant->getDescriptionRestaurant() as $item) {
                if ($item instanceof Important || $item instanceof Image) {
                    $description[] = $item;
                }
            }

            $restaurantData[] = [
                'nom' => $restaurant->getCoordonnees()->getNom(),
                'adresse' => $restaurant->getCoordonnees()->getAdresse(),
                'restaurateur' => $restaurant->getCoordonnees()->getRestaurateur(),
                'description' => $description,
            ];
        }

        // return $this->view('restaurant/index', compact('restaurants'));
        return $this->view('restaurant/index', ['restaurantData' => $restaurantData] );
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

        $restaurant = Restaurant::find($params['id']);
        return $this->view('restaurant/show', compact('restaurant'));
    }


    
}