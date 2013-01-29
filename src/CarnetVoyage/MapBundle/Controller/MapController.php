<?php

// src/CarnetVoyage/MapBundle/Controller/MapController.php

namespace CarnetVoyage\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
//use CarnetVoyage\MapBundle\Entity\Voyage;
use CarnetVoyage\MapBundle\Form\Type\VoyageType;
//use CarnetVoyage\MapBundle\Entity\Pays;
//use CarnetVoyage\MapBundle\Entity\Region;
//use CarnetVoyage\MapBundle\Entity\DestinationRepository;
//use CarnetVoyage\MapBundle\Entity\Destination;
use CarnetVoyage\MapBundle\Model\Destination;
use CarnetVoyage\MapBundle\Model\DestinationQuery;
use CarnetVoyage\MapBundle\Model\Pays;
use CarnetVoyage\MapBundle\Model\PaysQuery;
use CarnetVoyage\MapBundle\Model\Region;
use CarnetVoyage\MapBundle\Model\RegionQuery;
use CarnetVoyage\MapBundle\Model\Voyage;
use CarnetVoyage\MapBundle\Model\VoyageQuery;
use CarnetVoyage\MapBundle\Model\Contenu;
use CarnetVoyage\MapBundle\Model\ContenuQuery;

class MapController extends Controller
{
    /**
     * Page d'accueil 
     */ 
    public function indexAction()
    {
        //récupérer toutes les destinations visitées
        /*$listDestination = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('CarnetVoyageMapBundle:Destination')
                ->findAll();*/
        $listDestination = DestinationQuery::create()
                ->find();        
                
        //liste des pays
        /*$listCountry = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Pays')
                ->findAll();*/
        $listCountry = PaysQuery::create()
		        ->find();         
                
        $listColorCountry = array(); //déclaration d'un tableau des pays visités
        $listLabelCountry = array(); //déclaration d'un tableau des labels par pays 

        //pour chaque pays de la liste
        foreach($listCountry as $country)
        {
            $idCountry = $country->getId(); //récupérer l'id
            $color = "#E0A000"; //initialisation de la couleur du pays (par défaut pays non visité)
            $text = "<ul>"; //initialisation du label du pays
            $listTripCountry = array();//déclaration d'un tableau des voyages pour chaque pays 
            
            //pour chaque destination visitée
            // dans cette boucle, on cherche d'une part à connaître les pays qui ont été visités pour en changer la couleur
            // et d'autre part, à récupérer le nom des voyages effectués dans chacun de ces pays
            foreach ($listDestination as $destination)
            {
                $idVisit = $destination->getRegion()->getPays()->getId(); //récupérer l'id du pays visité
                $tripTemp = $destination->getVoyage()->getId(); //récupérer l'id du voyage correspondant à la destination
                
                if ($idCountry == $idVisit) // si l'id du pays correspond à l'id d'un pays visité
                {
                    $color = "#D04000"; // on change la couleur du pays
                    
                    if (!in_array($tripTemp, $listTripCountry)) //si le voyage n'est pas dans la liste des voyage
                    {
                        $text .= "<li>" . $destination->getVoyage()->getNom() . "</li>"; //on complète le texte du label par le nom du voyage
                        $listTripCountry[] = $tripTemp; //on rajoute ce voyage à la liste des voyages (l'objectif étant d'éviter qu'on est 2 fois un même voyage dans le label d'un pays)
                    }
                }
            }
            
            $text .= "</ul>"; //fin du label 
            $listLabelCountry[$idCountry] = $text; //ajout dans le tableau des labels, du label pour le pays
            $listColorCountry[$idCountry] = $color; //ajout dans le tableau des pays vitité, la couleur du pays
        }
        
        $colorJson = json_encode($listColorCountry); //encodage json du tableau des pays visités (couleur)
        $labelJson = json_encode($listLabelCountry); //encodage json du tableau des labels
        
        return $this->render('CarnetVoyageMapBundle:Map:index.html.twig', array('colorCountry' => $colorJson, 'labelCountry' => $labelJson));
    }

    /**
     * Liste des voyages
     *
     */
    public function listTripAction()
    {
        //liste des voyages
        /*$trips = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Voyage')
                ->findAll();*/                
        $trips = VoyageQuery::create()
		        ->find();        

        return $this->render('CarnetVoyageMapBundle:Map:listTrip.html.twig', array('trips' => $trips));
    }

    /**
     * Vue d'un pays
     *
     * @param integer $id id du pays à afficher
     */
    public function seeCountryAction($id)
    {
        // récupérer l'id du pays
        /*$country = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Pays')
                ->find($id);*/
        $country = PaysQuery::create()
                ->findPk($id);
				
        //liste des destinations
        /*$listDestination = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('CarnetVoyageMapBundle:Destination')
                ->findAll();*/
        $listDestination = DestinationQuery::create()
	            ->find();
                
        // liste des regions du pays
        /*$listRegion = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Region')
                ->findBy(array ('pays' => $country->getId()));*/
        $listRegion = RegionQuery::create()
		        ->findByPays($country);        

        $listColorRegion = array(); //déclaration d'un tableau des couleurs de chaque région
        $listLabelRegion = array(); //déclaration d'un tableau des labels de chaque région
        
        //pour chaque région de la liste
        //de même que pour la carte mondiale, on cherche dans cette boucle, d'une part, à récupérer les régions visitées pour en changer la couleur
        //et d'autre part le nom de chaque voyage dans la région pour l'ajouter au label
        foreach ($listRegion as $region)
        {
            $idRegion = $region->getId(); // récupérer l'id de la région
            $color = "#E0A000"; //initier la couleur de la région (par défaut non visité)
            $text = "<ul>"; //début du label
            
            //pour chaque destination
            foreach ($listDestination as $destination)
            {
                $idVisit = $destination->getRegion()->getId(); //récupérer l'id de la région visitée
                
                if ($idRegion == $idVisit) //si l'id de la région visitée correspond de à l'id de la région
                {
                    $color = "#D04000"; //on change la couleur
                    $text .= "<li>" . $destination->getVoyage()->getNom() . "</li>"; //on rajoute dans le label le nom du voyage
                }
            }
            
            $text .= "</ul>"; //fin du label
            $listLabelRegion[$idRegion] = $text; //ajout dans le tableau des labels, le label pour la région
            $listColorRegion[$idRegion] = $color; //ajout dans le tableau des couleur, la couleur de la région
        }
        
        $colorJson = json_encode($listColorRegion); //encodage json du tableau des couleurs
        $labelJson = json_encode($listLabelRegion); //encodage json du tableau des labels
        $valueCountry = $country->getValeurFichier(); //récupérer le nom du fichier js du pays
        
        return $this->render('CarnetVoyageMapBundle:Map:seeCountry.html.twig', array('value' => $valueCountry, 'colorRegion' => $colorJson, 'labelRegion' => $labelJson));
    }

     /**
     * Photos list
     *
     */
    public function listPhotosAction($id)
    {
    	/*$region = RegionQuery::create()
		        ->findPk(214);*/
        //$id = 214;
    	//list Destination by region
    	$destinations = DestinationQuery::create()
		        ->findByRegionId($id); 
		foreach ($destinations as $destination) 
		{
			$photos = ContenuQuery::create()
			        ->findByDestination($destination);     
		}
     

        return $this->render('CarnetVoyageMapBundle:Map:listPhotos.html.twig', array('photos' => $photos));
    }
    
    /**
     * nouveau voyage
     *
     */
    public function newTripAction()
    {
        //nouvelle entité voyage
        $trip = new Voyage();

        //créer un formulaire pour cette entité avec en option un tableau sur 2 niveau des régions (par pays)
        $form = $this->createForm(new VoyageType(), $trip/*, array('paysRegion' => $this->tabCountryRegion())*/);

        $request = $this->get('request');
        //si la méthode est de type POST, on soummet le formulaire
        if( $request->getMethod() === 'POST' ) 
        {
            $form = $this->createForm(new VoyageType(), $trip);
            $form->bindRequest($request);
            
            //vérifier que le formulaire est valide
            if( $form->isValid() )
            {
                //si oui, enregistrer les données
                /*$em = $this->getDoctrine()->getEntityManager();
                $em->persist($trip);
                $em->flush();*/
                $trip->save();

                //et rediriger vers la page d'accueil
                return $this->redirect( $this->generateUrl('CarnetVoyageMapAcceuil') );
            }
        }

        //si non 
            //le formulaire n'est pas valide, on renvoie la page, avec données et message d'erreur
            //la méthode n'est pas de type POST, on est dans la partie création du formulaire et non enregitrement des données
        return $this->render('CarnetVoyageMapBundle:Map:newTrip.html.twig', array('form' => $form->createView()));
    }

    /**
     * Modifier un pays
     *
     * @param integer $id id du voyage à modifier
     */
    public function modifyTripAction($id)
    {
        //récupérer le voyage de l'id renseigné
        /*$trip = $this->getDoctrine()
                ->getRepository('CarnetVoyage\MapBundle\Entity\Voyage')
                ->find($id);*/
        $trip = VoyageQuery::create()
		        ->findPk($id);

        $originalsDestinations = array(); //déclaration d'un tableau des destinations pour ce voyage
        //$em = $this->getDoctrine()->getEntityManager();
        
        //remplir le tableau des destinations 
        foreach ($trip->getDestinations() as $destination)
        {
            $originalsDestinations[] = $destination;
        }

        //création du formulaire de voyage
        $form = $this->createForm(new VoyageType(), $trip/*, array('paysRegion' => $this->tabCountryRegion())*/);

        $request = $this->get('request');
        //si la méthode est de type POST, on soummet le formulaire
        if( $request->getMethod() === 'POST' )
        {
            $form->bindRequest($request);
            
            //si le formulaire est valide
            if( $form->isValid() )
            {
                //il faut vérifier que toutes les destinations présentes à l'origine le sont toujours
                //Faut-il en supprimer ?
                foreach ($trip->getDestinations() as $destination) 
                {
                    foreach ($originalsDestinations as $key => $toDel) 
                    {
                        //si la destination est toujours présente, on la supprime du tableau construit initialement
                        if ($toDel->getId() === $destination->getId()) 
                        {
                            unset($originalsDestinations[$key]);
                        }
                    }
                }

                // on supprime chaque destination "restante" 
                foreach ($originalsDestinations as $destination) 
                {
                    //$em->remove($destination);
                    $trip->removeDestination($destination);
                }
                
                // on enregistre les données 
                /*$em->persist($trip);
                $em->flush();*/
                $trip->save();

                // on redirige vers la page d'accueil
                return $this->redirect( $this->generateUrl('CarnetVoyageMapAcceuil') );
            }
        }

        // on affiche le formulaire de modification
            // soit parce que les données sont invalides
            // soit parce que la méthode n'est pas de type POST, on est dans la partie création du formulaire et non enregitrement
        return $this->render('CarnetVoyageMapBundle:Map:modifyTrip.html.twig', array('form' => $form->createView(), 'id' => $trip->getNom()));
    }

    /**
     * tableau des régions par pays
     *
     * @return array 
     */
    public function tabCountryRegion()
    {
        /*$tab = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('CarnetVoyageMapBundle:Region')
                ->getSelectList();*/
        $tab = RegionQuery::create()->getSelectList();

        return $tab;
    }
	
	public function deleteTripAction($id)
    {
        return $this->render('CarnetVoyageMapBundle:Map:deleteTrip.html.twig');
    }
}
