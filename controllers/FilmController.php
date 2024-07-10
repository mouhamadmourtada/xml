<?php

namespace controllers;

use models\domaine\Film;

class FilmController extends Controller {

    public function test() {
        echo 'test';
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