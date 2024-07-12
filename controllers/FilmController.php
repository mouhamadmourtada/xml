<?php

namespace controllers;

use models\domaine\Film;
use models\domaine\composants\NotePresse;
use models\domaine\composants\NoteSpectateur;
use models\domaine\composants\Horaire;
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
        // $film = Film::find($id);
        $film = new Film();
        $film->setTitre("Avengers");
        $film->setAnnee(2021);
        $film->setDuree(120);
        $film->setRealisateur('James Cameron');
        $film->setSynopsis("Quand un ennemi inattendu fait surface pour menacer la sécurité et l'équilibre mondial, Nick Fury, directeur de l'agence internationale pour le maintien de la paix, connue sous le nom du S.H.I.E.L.D.");
        $film->setLangue('Francais');
        $film->setGenre('Action');
        
        $notePresse = new NotePresse(5,10);
        $film->setNotePresse($notePresse);
        $noteSpectateur = new NoteSpectateur(8,10);
        $film->setNoteSpectateur($noteSpectateur);
        
        $acteurs = ['Omar Van Damme', 'Saliou Niane', 'Robertchev'];
        $film->setActeurs($acteurs);
        $horaires = [
            new Horaire(
                ['LUNDI', 'MARDI'],
                ['10h', '14h']
            ),
            new Horaire(
                ['MERCREDI', 'JEUDI'],
                ['12h', '16h']
            )
        ];
        $film->setHoraires($horaires);
        $film->save();

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