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
        
        if (file_exists('C:\xampp\htdocs\xml\storage\cinema.xml')) {
            $xml = simplexml_load_file('C:\xampp\htdocs\xml\storage\cinema.xml');
            
            // il faut extraire les données et construire le tableau d'objet de film

            foreach($xml->film as $film){
                $notePresse = new NotePresse((String) $film->notePresse->valeur, (String) $film->notePresse->base);
                $noteSpectateur = new NotePresse($film->noteSpectateur->valeur, $film->noteSpectateur->base);

                

                $films[] = new Film(
                    $id = (string)$film->id_film,
                    $titre = (string)$film->titre,
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

        // chager le fichier et faire la recherche nécesssire

        if(file_exists('C:\xampp\htdocs\xml\storage\cinema.xml')){
            $xml = simplexml_load_file('C:\xampp\htdocs\xml\storage\cinema.xml');
            foreach($xml->film as $film){
                if($film->id_film == $id){
                    $notePresse = new NotePresse((String) $film->notePresse->valeur, (String) $film->notePresse->base);
                    $noteSpectateur = new NotePresse($film->noteSpectateur->valeur, $film->noteSpectateur->base);

                    return new Film(
                        (string)$film->id_film,
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
                }
            }
        } else {
            exit('Echec lors de l\'ouverture du fichier test.xml.');
        }

        // return new Film();
        
    }

    public function update($film){
        
    }
}