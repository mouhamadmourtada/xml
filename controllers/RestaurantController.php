<?php

namespace controllers;

use controllers\Controller;
use models\domaine\Restaurant;

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

        $restaurant = Restaurant::find($params['id']);
        // var_dump($restaurant); die();

        return $this->view('restaurant/show', compact('restaurant'));
    }


    
}