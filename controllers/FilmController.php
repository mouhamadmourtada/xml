<?php

namespace controllers;

use models\domaine\Film;

class FilmController extends Controller {

    public function test() {
        echo 'test';
    }

    public function index() {
        // $films = Film::all();
        $films = [
            new Film('1', 'titre1', '2021', '120', 'realisateur1', 'genre1', 'acteurs1', 'langue1', 'synopsis1', 'notePresse1', 'noteSpectateur1'),
            new Film('2', 'titre2', '2021', '120', 'realisateur2', 'genre2', 'acteurs2', 'langue2', 'synopsis2', 'notePresse2', 'noteSpectateur2'),
            new Film('3', 'titre3', '2021', '120', 'realisateur3', 'genre3', 'acteurs3', 'langue3', 'synopsis3', 'notePresse3', 'noteSpectateur3'),
            new Film('4', 'titre4', '2021', '120', 'realisateur4', 'genre4', 'acteurs4', 'langue4', 'synopsis4', 'notePresse4', 'noteSpectateur4'),
            new Film('5', 'titre5', '2021', '120', 'realisateur5', 'genre5', 'acteurs5', 'langue5', 'synopsis5', 'notePresse5', 'noteSpectateur5'),

        ];

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