<?php

namespace controllers;

use models\dao\FilmDao;
use Models\Dao\RestaurantDao;
use Models\Domaine\composants\Horaire;
use models\domaine\Film;
use models\domaine\composants\NotePresse;
use models\domaine\composants\NoteSpectateur;
use Models\Domaine\Restaurant;

class FilmController extends Controller {

    public function test() {
       
        // echo RestaurantDao::getLastIdPlat();

        $restaurant = Restaurant::find("restaurant_3");
        $restaurant->getCoordonnees()->setNom("nouveau nom");
        $restaurant->getDescriptionRestaurant()[0]->addElement(["text", "nouveau"]);

        var_dump($restaurant->getDescriptionRestaurant());
        die();
       
        $restaurant->update();
       
    }

    public function index() {
        $films = Film::all();

        $this->view('film/index', ['films' => $films]);
    }

    public function show($params) {
        $id = $params['id'];
        $film = Film::find($id);
        var_dump($film); die();
        $this->view('film/show', ['film' => $film]);
    }

    public function create() {
        $this->view('film/create');
    }

    public function store() {


        $film = new Film();
        $film->setTitre($_POST['titre']);
        $film->setAnnee($_POST['annee']);
        $film->setDuree($_POST['duree']);
        $film->setRealisateur($_POST['realisateur']);
        $film->setGenre($_POST['genre']);
        // $film->save();
        $flashes = ['success' => 'Film ajouté avec succès'];
        $this->redirect('film', $flashes);
    }

    public function edit($id) {
        $film = Film::find($id);
        $this->view('film/edit', ['film' => $film]);
    }

    public function update($id) {
        $film = Film::find($id);
        $film->setTitre($_POST['titre']);
        $film->setAnnee($_POST['annee']);
        $film->setDuree($_POST['duree']);
        $film->setRealisateur($_POST['realisateur']);
        $film->setGenre($_POST['genre']);
        $film->update();
        $this->redirect('film');
    }

    public function destroy($id) {
        $film = Film::find($id);
        $film->delete();
        $this->redirect('film');
    }

}