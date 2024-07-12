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
       
        

        // var_dump($restaurant->getDescriptionRestaurant());
        // die();
       
        $restaurant->save();
       
    }

    public function index() {
        $films = Film::all();
       

        $this->view('film/index', ['films' => $films]);
    }

    public function show($params) {
        $id = $params['id'];
        $film = Film::find($id);
        
        $this->view('film/show', ['film' => $film]);
    }

    public function create() {
        $this->view('film/create');
    }

    public function store() {
       
       
        

        $titre = $_POST['titre'];
        $genre = $_POST['genre'];
        $duree = $_POST['duree'];
        $realisateur = $_POST['realisateur'];
        $acteurs = $_POST['acteur'];
        $annee = $_POST['annee'];
        $langue = $_POST['langue'];
        $synopse = $_POST['synopsis'];
        $notePresseValeur = $_POST['notePresseValeur'];
        $notePresseBase = $_POST['notePresseBase'];
        $noteSpectateurValeur = $_POST['noteSpectateurValeur'];
        $noteSpectateurBase = $_POST['noteSpectateurBase'];
        
        $jours = $_POST['jour'];
        $heures = $_POST['heure'];

        $notePresse = new NotePresse(
            $notePresseValeur,
            $notePresseBase
        );

        $noteSpectateur = new NoteSpectateur(
            $noteSpectateurValeur,
            $noteSpectateurBase
        );

  
        $horaires = [];
        
        for ($i=0; $i < count($jours); $i++) { 
            $horaire = new Horaire(
                [$jours[$i]],
                [$heures[$i]]
            );
            $horaires[] = $horaire;
        };



        

        $film = new Film(
            $id = null,
            $titre,
            $annee,
            $duree,
            $realisateur,
            $genre,
            $acteurs,
            $langue,
            $synopse,
            $notePresse,
            $noteSpectateur,
            $horaires
        );

       $film->save();
       
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