<?php

namespace models\dao;

use models\domaine\Film;
use models\dao\ModelDao;
use Models\Domaine\composants\NotePresse;

class FilmDao extends ModelDao{

    

    public function __construct(){
    }

    public function save($film){
        
    }

    public function delete($film){
        
    }

    public static function all(){
        // charger le fichier xml et le rendre 
        
        if (file_exists('C:\Apache24\htdocs\xml\storage\cinema.xml')) {
            $xml = simplexml_load_file('C:\Apache24\htdocs\xml\storage\cinema.xml');
            
            // il faut extraire les données et construire le tableau d'objet de film

            foreach($xml->film as $film){
                $notePresse = new NotePresse((String) $film->notePresse->valeur, (String) $film->notePresse->base);
                $noteSpectateur = new NotePresse($film->noteSpectateur->valeur, $film->noteSpectateur->base);

                

                $films[] = new Film(
                    (string)$film->titre,
                    (string)$film->annee,
                    (string)$film->duree,
                    (string)$film->realisateur,
                    (string)$film->genre,
                    (string)$film->acteurs,
                    (string)$film->langue,
                    (string)$film->synopsis,
                    $notePresse,
                    $noteSpectateur
                );

                return $films;
            }
            
            // print_r($xml);
        } else {
            exit('Echec lors de l\'ouverture du fichier test.xml.');
        }
    }

    public static function find($id){
        return new Film();
        
    }

    public function update($film){
        
    }
}