<?php

namespace models\domaine;

use models\dao\FilmDao;
use Models\Domaine\composants\notePresse;
use Models\Domaine\composants\noteSpectateur;

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

    private $horaires;


    private FilmDao $dao;
    
    public function __construct($id = null, $titre = null, $annee = null, $duree = null, $realisateur = null, $genre = null){
        parent::__construct($id);
        $this->titre = $titre;
        $this->annee = $annee;
        $this->duree = $duree;
        $this->realisateur = $realisateur;
        $this->genre = $genre;
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

    public function addActeurs($acteur){
        $this->acteurs[] = $acteur;
    }

    public function removeActeurs($acteur){
        $key = array_search($acteur, $this->acteurs);
        if($key !== false){
            unset($this->acteurs[$key]);
        }
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
   