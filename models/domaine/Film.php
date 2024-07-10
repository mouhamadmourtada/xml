<?php

namespace models\domaine;

use models\dao\FilmDao;

class Film extends Model{
    private $titre;
    private $annee;
    private $duree;
    private $realisateur;
    private $genre;

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
   