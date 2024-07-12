<?php

namespace controllers;

use controllers\Controller;
use models\domaine\Restaurant;
use models\domaine\composants\Coordonnee;
use models\domaine\composants\Important;
use models\domaine\composants\Image;



use models\domaine\Model;
use models\domaine\composants\DescriptionRestaurant;
use models\domaine\composants\Menu;
use models\domaine\composants\Plat;
use models\domaine\composants\Paragraphe;
use models\dao\RestaurantDao;

class RestaurantController extends Controller{

    // donne moi le code du controlleru

    public function index(){
        $restaurants = Restaurant::all();
        
        return $this->view('restaurant/index', ['restaurants' => $restaurants] );
    }


    public function create(){
        return $this->view('restaurant/create');
    }

    public function store(){

        // Coordonnée
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $restaurateur = $_POST['restaurateur'];
        $coordonnee = new Coordonnee($nom,$adresse,$restaurateur);

        
        // Description du Restaurant
        $descriptionRestaurant = [];
        if (isset($_POST['paragraphe'])) {
            foreach ($_POST['paragraphe'] as $index => $paragraphe) {

                $descriptionRestaurant[] = new Paragraphe(
                    [
                        [ "text", $paragraphe],
                        ["important", $_POST['important'][$index]],
                        ["items", $_POST['item'] ?? []],
                        ["image", new Image($_POST['image_url'][$index], $_POST['image_position'][$index])]
                    ]
                );
                
            }
        }



        // Carte
        $carte = [];
        var_dump($_POST['type']);
        die();
        // if (isset($_POST['type'])) {
        foreach ($_POST['type'] as $index => $type) {
            $carte[] = [
                'type' => $type,
                'prix' => $_POST['prix'][$index],
                'descriptionPlat' => $_POST['descriptionPlat'][$index],
                'paragraphePlat' => $_POST['paragraphePlat'][$index],
                'importantPlat' => $_POST['importantPlat'][$index],
                'itemsPlat' => $_POST['itemPlat'][$index] ?? [],
                'image_urlPlat' => $_POST['image_urlPlat'][$index],
                'image_positionPlat' => $_POST['image_positionPlat'][$index],
            ];
        }
        // }
        // Menus
        $menus = [];
        if (isset($_POST['titre'])) {
            foreach ($_POST['titre'] as $index => $titre) {
                $menus[] = [
                    'titre' => $titre,
                    'descriptionMenu' => $_POST['descriptionMenu'][$index],
                    'prixMenu' => $_POST['prixMenu'][$index],
                    'elements' => $_POST['elements'][$index] ?? [],
                ];
            }
        }

        //$restaurant = new Restaurant();
        //$restaurant->coordonnees = $coordonnee;
        //$restaurant->descriptionRestaurant = $descriptionRestaurant;
        //$restaurant->carte = $carte;
        //$restaurant->menus = $menus;
        // $restaurant->save();
        return $this->redirect('restaurant');
    }


    public function edit($params){
        $id = $params["id"];
        $restaurant = Restaurant::find($id);
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
        // var_dump($restaurant); die();

        return $this->view('restaurant/show', compact('restaurant'));
    }


    
}