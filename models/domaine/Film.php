<?php

namespace models\domaine;

use models\dao\FilmDao;
use Models\Domaine\composants\notePresse;
use Models\Domaine\composants\NoteSpectateur;
use Models\Domaine\composants\Horaire;

class Film extends Model{

    private $titre;
    private $annee;
    private $duree;
    private $realisateur;
    private $genre;

    private $acteurs;
    private $langue;
    private $synopsis;
    private NotePresse $notePresse;
    private NoteSpectateur $noteSpectateur;

    /** @var Horaire[] horaires */
    private $horaires;


    private FilmDao $dao;
    
    public function __construct($id = null, $titre = null, $annee = null, $duree = null, $realisateur = null, $genre = null, $acteurs = null, $langue = null, $synopsis = null, $notePresse = new NotePresse(), $noteSpectateur = new NoteSpectateur(), $horaires = null){
        parent::__construct($id);
        $this->titre = $titre;
        $this->annee = $annee;
        $this->duree = $duree;
        $this->realisateur = $realisateur;
        $this->genre = $genre;
        $this->acteurs = $acteurs;
        $this->langue = $langue;
        $this->synopsis = $synopsis;
        $this->noteSpectateur = $noteSpectateur;
        $this->notePresse = $notePresse;
        $this->horaires = $horaires;



        $this->dao = new FilmDao();
    }
    
    public function getTitre(){
        return $this->titre;
    }
    
    public function setTitre($titre){
        $this->titre = $titre;
    }
    
    public function getAnnee(){
        return $this->annee;
    }
    
    public function setAnnee($annee){
        $this->annee = $annee;
    }
    
    public function getDuree(){
        return $this->duree;
    }
    
    public function setDuree($duree){
        $this->duree = $duree;
    }
    
    public function getRealisateur(){
        return $this->realisateur;
    }
    
    public function setRealisateur($realisateur){
        $this->realisateur = $realisateur;
    }
    
    public function getGenre(){
        return $this->genre;
    }
    
    public function setGenre($genre){
        $this->genre = $genre;
    }

    public function getActeurs(){
        return $this->acteurs;
    }

    public function setActeurs($acteurs){
        $this->acteurs = $acteurs;
    }


    public function getLangue(){
        return $this->langue;
    }

    public function setLangue($langue){
        $this->langue = $langue;
    }

    public function getSynopsis(){
        return $this->synopsis;
    }

    public function setSynopsis($synopsis){
        $this->synopsis = $synopsis;
    }

    public function getNotePresse(){
        return $this->notePresse;
    }

    public function setNotePresse($notePresse){
        $this->notePresse = $notePresse;
    }

    public function getNoteSpectateur(){
        return $this->noteSpectateur;
    }

    public function setNoteSpectateur($noteSpectateur){
        $this->noteSpectateur = $noteSpectateur;
    }

    public function getHoraires(){
        return $this->horaires;
    }

    public function setHoraires($horaires){
        $this->horaires = $horaires;
    }

    public function addHoraire($horaire){
        $this->horaires[] = $horaire;
    }

    public function removeHoraire($horaire){
        $key = array_search($horaire, $this->horaires);
        if($key !== false){
            unset($this->horaires[$key]);
        }
    }

    public function addActeur($acteur){
        $this->acteurs[] = $acteur;
    }

    public function removeActeur($acteur){
        $key = array_search($acteur, $this->acteurs);
        if($key !== false){
            unset($this->acteurs[$key]);
        }
    }




    public function save(){
        $this->dao->save($this);
    }

    public function delete(){
        $this->dao->delete($this);
    }

    public static function all(){
        $dao = new FilmDao();
        return $dao->all();
    }

    public static function find($id){
        $dao = new FilmDao();
        return $dao->find($id);
    }

    public function update(){
        $this->dao->update($this);
    }

}
   