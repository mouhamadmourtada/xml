<?php

namespace services;

use Models\Dao\RestaurantDao;
use models\domaine\composants\Paragraphe;
use models\domaine\composants\Image;
use models\domaine\composants\Coordonnee;
use models\domaine\composants\Plat;
use Models\Domaine\composants\PlatRef;
use models\domaine\composants\Prix;
use models\domaine\composants\Menu;


class RestaurantDaoService {
    public function __construct(){
    }

    public function getParagrapheFromXML($xmlParagraphe){
        $paragraphe = new Paragraphe();
        
      
        foreach($xmlParagraphe->children() as $element){

            if($element->getName() == "text"){
                $paragraphe->addElement(["text", $element]);
            }else if($element->getName() == "important"){
                $paragraphe->addElement(["important", $element]);
            }else if($element->getName() == "liste"){
                $myLIste = [];
                foreach($element as $li){
                    $myLIste[] = $li;
                }
                $paragraphe->addElement(["liste", $myLIste]);
            }else if($element->getName() == "image"){
                $image = new Image($element["url"], $element["position"]);
                $paragraphe->addElement(["image", $image]);
            }
        } 
   
        return $paragraphe;
    }


    
    public function getCoordonneesFromXMLCoordonnees($xmlCoordonnees){
        
        $coordonnees = new Coordonnee(
            $xmlCoordonnees->nom,
            $xmlCoordonnees->adresse,
            $xmlCoordonnees->restaurateur,
        );
        return $coordonnees;
    }

    public function getPlatFromXML($xmlPlat){
        
      
        $plat = new Plat(
            $this->getPrixFromXML($xmlPlat->prix),
            $this->getParagrapheFromXML($xmlPlat->descriptionPlat->paragraphe),
            $xmlPlat["type"],
            $xmlPlat["plat_id"]
        );
        
        return $plat;
    }

    public function getPrixFromXML($xmlPrix){
        $prix = new Prix($xmlPrix["montant"], $xmlPrix["devise"]);
        return $prix;
    }

    


    public function getElementsFromXML($xmlElements){
        $elements = [];
        foreach($xmlElements->children() as $element){
            $elements[] = new PlatRef($element["plat_id"]);
        }
        return $elements;
    }
   
    public function getMenuFromXML($xmlMenu){
        
        $elements = $this->getElementsFromXML($xmlMenu->elements);
            // il faut parcourir descriptionMenu pour avoir les paragraphe
        
        $paragraphes = [];
        foreach($xmlMenu->descriptionMenu->children() as $paragraphe){
            $paragraphes[] = $this->getParagrapheFromXML($paragraphe);
        };

        $menu = new Menu(
            $xmlMenu->titre,
           
            $paragraphes,
            
            $this->getPrixFromXML($xmlMenu->prix),
            $elements
        );
        return $menu;
    }


    public function getRestaurantXMLfromRestaurant($restaurant){

        $xmlRestaurant = new \SimpleXMLElement('<restaurant></restaurant>');
        $xmlRestaurant->addAttribute('id_restaurant', $restaurant->getId());

        // coordonnées
        $xmlCoordonnees = $xmlRestaurant->addChild('coordonnees');
        $xmlCoordonnees->addChild('nom', $restaurant->getCoordonnees()->getNom());
        
        $xmlCoordonnees->addChild('adresse', $restaurant->getCoordonnees()->getAdresse());
        $xmlCoordonnees->addChild('restaurateur', $restaurant->getCoordonnees()->getRestaurateur());

        
        $xmlDescriptionRestaurant = $xmlRestaurant->addChild('descriptionRestaurant');
        
        // description restaurant
       
        foreach($restaurant->getDescriptionRestaurant() as $paragraphe){
                
            foreach ($paragraphe->getContent() as $partieParagraphe) {
                
                $xmlParagraphe = $xmlDescriptionRestaurant->addChild('paragraphe');
    
                if($partieParagraphe[0] == "text"){
                    $xmlParagraphe->addChild('text', $partieParagraphe[1]);
                }else if($partieParagraphe[0] == "important"){
                    $xmlParagraphe->addChild('important', $partieParagraphe[1]);
                }else if($partieParagraphe[0] == "liste"){
    
                    $xmlParagrapheListe = $xmlParagraphe->addChild('liste');
                    foreach($partieParagraphe["message"] as $li){
                        $xmlParagrapheListe->addChild('item', $li);
                    }
                }else if($partieParagraphe[0] == "image"){
    
                    $xmlParagrapheImage = $xmlParagraphe->addChild('image');
                    $xmlParagrapheImage->addAttribute('url', $partieParagraphe[1]->getUrl());
                    $xmlParagrapheImage->addAttribute('position', $partieParagraphe[1]->getPosition());
                }

            }
                

            
        }
        

        $xmlCarte = $xmlRestaurant->addChild('carte');
        $lastPlatId = RestaurantDao::getLastIdPlat()+1;
        foreach($restaurant->getCartes() as $plat){

            $xmlPlat = $xmlCarte->addChild('plat');

            $xmlPlat->addAttribute('type', $plat->getType());
            
            $xmlPlat->addAttribute('plat_id', "plat_".$lastPlatId++ );

            $xmlPrix = $xmlPlat->addChild('prix');
            $xmlPrix->addAttribute('montant', $plat->getPrix()->getMontant());
            $xmlPrix->addAttribute('devise', $plat->getPrix()->getDevise());

            $xmlDescriptionPlat = $xmlPlat->addChild('descriptionPlat');

           

            $xmlParagraphe = $xmlDescriptionPlat->addChild('paragraphe');
            foreach($plat->getDescriptionPlat()->getContent() as $element){
                if($element[0] == "text"){
                    $xmlElement = $xmlParagraphe->addChild('text', $element[1]);
                }else if($element[0] == "important"){
                    $xmlElement = $xmlParagraphe->addChild('important', $element[1]);
                }else if($element[0] == "liste"){
                    $xmlElement = $xmlParagraphe->addChild('liste');
                    foreach($element[1] as $li){
                        $xmlElement->addChild('item', $li);
                    }
                }else if($element[0] == "image"){
                    $xmlElement = $xmlParagraphe->addChild('image');
                    $xmlElement->addAttribute('url', $element[1]->getUrl());
                    $xmlElement->addAttribute('position', $element[1]->getPosition());
                }
            }

        }

        $xmlMenus = $xmlRestaurant->addChild('menus');
        foreach($restaurant->getMenus() as $menu){
            $xmlMenu = $xmlMenus->addChild('menu');

            $xmlMenu->addChild('titre', $menu->getTitre());

            

            $xmlDescriptionMenu = $xmlMenu->addChild('descriptionMenu');
           
            
            $descriptionMenu = $menu->getDescriptionMenu();
            $size = count($descriptionMenu);

            for ($i = 0; $i < $size; $i++) {
               
                $mdParagraphe = $descriptionMenu[$i];

                $xmlParagraphe = $xmlDescriptionMenu->addChild('paragraphe');

                foreach ($mdParagraphe->getContent() as $mdParagrapheContent) {
                    if($mdParagrapheContent[0] == "text"){
                        $xmlElement = $xmlParagraphe->addChild('text', $mdParagrapheContent[1]);
                        // echo($mdParagrapheContent[1]);
                        // die();
                    }else if($mdParagrapheContent[0] == "important"){
                        $xmlElement = $xmlParagraphe->addChild('important', $mdParagrapheContent[1]);
                    }else if($mdParagrapheContent[0] == "liste"){
                        $xmlElement = $xmlParagraphe->addChild('liste');
                        foreach($mdParagrapheContent[1] as $li){
                            $xmlElement->addChild('item', $li);
                        }
                    }else if($mdParagrapheContent[0] == "image"){
                        $xmlElement = $xmlParagraphe->addChild('image');
                        $xmlElement->addAttribute('url', $mdParagrapheContent[1]->getUrl());
                        $xmlElement->addAttribute('position', $mdParagrapheContent[1]->getPosition());
                    }
                }
            }

            $xmlPrix = $xmlMenu->addChild('prix');
            $xmlPrix->addAttribute('montant', $menu->getPrix()->getMontant());
            $xmlPrix->addAttribute('devise', $menu->getPrix()->getDevise());

            $xmlElements = $xmlMenu->addChild('elements');
            foreach($menu->getElements() as $element){
                // element platRef
                $xmlElement = $xmlElements->addChild('platRef');
                $xmlElement->addAttribute('plat_id', $element->getPlatId());
            }
        }

        return $xmlRestaurant;
    }

    public function addRestaurantToXML($xml, $xmlRestaurant){
        
        // Importer l'élément $xmlRestaurant dans le document $xml
        $domXml = dom_import_simplexml($xml);
        $domXmlRestaurant = dom_import_simplexml($xmlRestaurant);
        $domXmlRestaurant = $domXml->ownerDocument->importNode($domXmlRestaurant, true);
        $domXml->appendChild($domXmlRestaurant);
    }

}