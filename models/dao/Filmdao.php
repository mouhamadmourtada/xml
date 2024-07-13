<?php

namespace models\dao;

use models\domaine\Film;
use models\dao\ModelDao;
use models\domaine\Cinema as DomaineCinema;
use Models\Domaine\composants\NotePresse;
use Models\Domaine\composants\Horaire;
use Models\Domaine\composants\NoteSpectateur;

class FilmDao extends ModelDao{

    

    public function __construct(){
    }

    public function save($film){

        if(file_exists($_SERVER["DOCUMENT_ROOT"]. "/xml/storage/cinema.xml")){
            $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/cinema.xml');
            
            $filmXML = $xml->addChild('film');
            $filmXML->addAttribute('id_film', "film_" .FilmDao::getLastId() + 1);
            $filmXML->addChild('titre', $film->getTitre());
            $filmXML->addChild('annee', $film->getAnnee());
            $filmXML->addChild('duree', $film->getDuree());
            $filmXML->addChild('realisateur', $film->getRealisateur());
            $filmXML->addChild('genre', $film->getGenre());
            $filmXML->addChild('langue', $film->getLangue());
            $filmXML->addChild('synopsis', $film->getSynopsis());

            $notePresse = $filmXML->addChild('notePresse');
            $notePresse->addAttribute('valeur', $film->getNotePresse()->getValeur());
            $notePresse->addAttribute('base', $film->getNotePresse()->getBase());

            $noteSpectateur = $filmXML->addChild('noteSpectateur');
            $noteSpectateur->addAttribute('valeur', $film->getNoteSpectateur()->getValeur());
            $noteSpectateur->addAttribute('base', $film->getNoteSpectateur()->getBase());

            $acteurs = $filmXML->addChild('acteurs');
            foreach ($film->getActeurs() as $acteur) {
                $acteurs->addChild('acteur', $acteur);
            }

            $horaires = $filmXML->addChild('horaires');
            foreach ($film->getHoraires() as $horaire) {
                $horaireXML = $horaires->addChild('horaire');
                foreach ($horaire->getJours() as $jour) {
                    $jourXML = $horaireXML->addChild('jour');
                    $jourXML->addAttribute('valeur', $jour);

                }
                foreach ($horaire->getHeures() as $heure) {
                    $horaireXML->addChild('heure', $heure);
                }
            }

            $xml->asXML($_SERVER["DOCUMENT_ROOT"].'/xml/storage/cinema.xml');
            // il faut le 
        } else {
            exit('Echec lors de l\'ouverture du fichier cinema.xml.');

        
        }
    }


    public static function getLastId(){
        // ecrit la méthode pour get le dernier id
        if(file_exists($_SERVER["DOCUMENT_ROOT"]. "/xml/storage/cinema.xml")){
            $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/cinema.xml');
            $lastId = 0;
            foreach ($xml->film as $film) {
                $id = explode('_', $film['id_film'])[1];
                if ($id > $lastId) {
                    $lastId = $id;
                }
            }
            
            return $lastId;
        } else {
            exit('Echec lors de l\'ouverture du fichier cinema.xml.');
        }
    }


    public function delete($film){

        if(file_exists($_SERVER["DOCUMENT_ROOT"]. "/xml/storage/cinema.xml")){
            $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/cinema.xml');
            $id = $film->getId();
            $filmXML = $xml->xpath("//film[@id_film='$id']")[0];
            $dom = dom_import_simplexml($filmXML);
            $dom->parentNode->removeChild($dom);
            $xml->asXML($_SERVER["DOCUMENT_ROOT"].'/xml/storage/cinema.xml');
        } else {
            exit('Echec lors de l\'ouverture du fichier cinema.xml.');
        }
        
    }

    public static function all(){
        // charger le fichier xml et le rendre 
        
        if (file_exists($_SERVER["DOCUMENT_ROOT"].'/xml/storage/cinema.xml')) {
            $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/cinema.xml');
            
            $films = [];
            
            for ($i = 0; $i < count($xml->film); $i++) {
                $film = $xml->film[$i];
                
                $notePresse = new NotePresse((string) $film->notePresse['valeur'], (string) $film->notePresse['base']);
                $noteSpectateur = new NoteSpectateur((string) $film->noteSpectateur['valeur'], (string) $film->noteSpectateur['base']);
                
                $acteurs = [];

                foreach ($film->acteurs->acteur as $acteur) {
                    $acteurs[] = (string) $acteur;
                }


                $horaires = [];
                foreach ($film->horaires->horaire as $horaire) {

                    $jours = [];
                    $heures = [];
                    foreach ($horaire->jour as $jour) {
                        $jours[] = (string) $jour['valeur'];
                    }

                    foreach ($horaire->heure as $heure) {
                        $heures[] = (string) $heure;
                    }
                    

                    $horaires[] = new Horaire($jours, $heures);
                }


                $films[] = new Film(
                    (string)$film['id_film'],
                    (string)$film->titre,
                    (string)$film->annee,
                    (string)$film->duree,
                    (string)$film->realisateur,
                    (string)$film->genre,
                    $acteurs,

                    (string)$film->langue,
                    (string)$film->synopsis,
                    $notePresse,
                    $noteSpectateur,
                    $horaires
                );
            }
          
            return $films;
           
        } else {
            exit('Echec lors de l\'ouverture du fichier test.xml.');
        }
    }

    public static function find($id) {
        // Charger le fichier XML
        if (file_exists($_SERVER["DOCUMENT_ROOT"].'/xml/storage/cinema.xml')) {
            $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"].'/xml/storage/cinema.xml');
            
            // Utiliser une boucle for pour rechercher le film avec l'ID spécifié
            for ($i = 0; $i < count($xml->film); $i++) {
                $film = $xml->film[$i];
                if ((string)$film['id_film'] == $id) {
                    $notePresse = new NotePresse((string) $film->notePresse['valeur'], (string) $film->notePresse['base']);
                    $noteSpectateur = new NoteSpectateur((string) $film->noteSpectateur['valeur'], (string) $film->noteSpectateur['base']);
                
                    $acteurs = [];

                    foreach ($film->acteurs->acteur as $acteur) {
                        $acteurs[] = (string) $acteur;
                    }


                    $horaires = [];
                    foreach ($film->horaires->horaire as $horaire) {

                        $jours = [];
                        $heures = [];
                        foreach ($horaire->jour as $jour) {
                            $jours[] = (string) $jour["valeur"];
                        }

                        foreach ($horaire->heure as $heure) {
                            $heures[] = (string) $heure;
                        }

                        $horaires[] = new Horaire($jours, $heures);
                    }


                    return  new Film(
                        (string)$film['id_film'],
                        (string)$film->titre,
                        (string)$film->annee,
                        (string)$film->duree,
                        (string)$film->realisateur,
                        (string)$film->genre,
                        $acteurs,

                        (string)$film->langue,
                        (string)$film->synopsis,
                        $notePresse,
                        $noteSpectateur,
                        $horaires
                    );

                }
            }
        } else {
            exit('Echec lors de l\'ouverture du fichier cinema.xml.');
        }
    
        // Retourner null si aucun film n'est trouvé
        return null;
    }
    


    public function update($film) {
        if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/xml/storage/cinema.xml")) {
            $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"] . '/xml/storage/cinema.xml');
    
            // Utiliser une boucle for pour rechercher le film avec l'ID spécifié
            for ($i = 0; $i < count($xml->film); $i++) {
                $filmXML = $xml->film[$i];
                if ((string)$filmXML['id_film'] == $film->getId()) {
                    $filmXML->titre = $film->getTitre();
                    $filmXML->annee = $film->getAnnee();
                    $filmXML->duree = $film->getDuree();
                    $filmXML->realisateur = $film->getRealisateur();
                    $filmXML->genre = $film->getGenre();
                    $filmXML->langue = $film->getLangue();
                    $filmXML->synopsis = $film->getSynopsis();
    
                    $filmXML->notePresse['valeur'] = $film->getNotePresse()->getValeur();
                    $filmXML->notePresse['base'] = $film->getNotePresse()->getBase();
                    $filmXML->noteSpectateur['valeur'] = $film->getNoteSpectateur()->getValeur();
                    $filmXML->noteSpectateur['base'] = $film->getNoteSpectateur()->getBase();
    
                    // Supprimer les anciens acteurs
                    unset($filmXML->acteurs->acteur);
    
                    // Ajouter les nouveaux acteurs
                    foreach ($film->getActeurs() as $acteur) {
                        $filmXML->acteurs->addChild('acteur', $acteur);
                    }
    
                    // Supprimer les anciens horaires
                    unset($filmXML->horaires->horaire);
    
                    // Ajouter les nouveaux horaires
                    foreach ($film->getHoraires() as $horaire) {
                        $horaireXML = $filmXML->horaires->addChild('horaire');
                        foreach ($horaire->getJours() as $jour) {
                            $jourXML = $horaireXML->addChild('jour');
                            $jourXML->addAttribute('valeur', $jour);
                        }
                        foreach ($horaire->getHeures() as $heure) {
                            $horaireXML->addChild('heure', $heure);
                        }
                    }
                }
            }
    
            // Sauvegarder les modifications dans le fichier XML
            $xml->asXML($_SERVER["DOCUMENT_ROOT"] . '/xml/storage/cinema.xml');
        } else {
            exit('Echec lors de l\'ouverture du fichier cinema.xml.');
        }
    }
    
}