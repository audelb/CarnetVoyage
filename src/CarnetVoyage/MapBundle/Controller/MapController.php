<?php

// src/CarnetVoyage/MapBundle/Controller/MapController.php

namespace CarnetVoyage\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use CarnetVoyage\MapBundle\Entity\Voyage;
use CarnetVoyage\MapBundle\Form\VoyageType;
use CarnetVoyage\MapBundle\Entity\Pays;
use CarnetVoyage\MapBundle\Entity\Region;
use CarnetVoyage\MapBundle\Entity\DestinationRepository;
use CarnetVoyage\MapBundle\Entity\Destination;

class MapController extends Controller
{
    //page d'accueil 
    public function indexAction()
    {
        //récupérer toutes les destinations visitées
        $liste_destination = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('CarnetVoyageMapBundle:Destination')
                ->findAll();

        //liste des pays
        $liste_pays = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Pays')
                ->findAll();

        $liste_couleur_pays = array(); //déclaration d'un tableau des pays visités
        $liste_label_pays = array(); //déclaration d'un tableau des labels par pays 

        //pour chaque pays de la liste
        foreach($liste_pays as $pays)
        {
            $id_pays = $pays->getId(); //récupérer l'id
            $couleur = "#E0A000"; //initialisation de la couleur du pays (par défaut pays non visité)
            $text = "<ul>"; //initialisation du label du pays
            $liste_voyage_pays = array();//déclaration d'un tableau des voyages pour chaque pays 
            //pour chaque destination visitée
            // dans cette boucle, on cherche d'une part à connaître les pays qui ont été visités pour en changer la couleur
            // et d'autre part, à récupérer le nom des voyages effectués dans chacun de ces pays
            foreach ($liste_destination as $destination)
            {
                $id_visite = $destination->getRegion()->getPays()->getId(); //récupérer l'id du pays visité
                $voyage_temp = $destination->getVoyage()->getId(); //récupérer l'id du voyage correspondant à la destination
                if ($id_pays == $id_visite) // si l'id du pays correspond à l'id d'un pays visité
                {
                    $couleur = "#D04000"; // on change la couleur du pays
                    if (!in_array($voyage_temp, $liste_voyage_pays)) //si le voyage n'est pas dans la liste des voyage
                    {
                        $text .= "<li>" . $destination->getVoyage()->getNom() . "</li>"; //on complète le texte du label par le nom du voyage
                        $liste_voyage_pays[] = $voyage_temp; //on rajoute ce voyage à la liste des voyages (l'objectif étant d'éviter qu'on est 2 fois un même voyage dans le label d'un pays)
                    }
                }
            }
            $text .= "</ul>"; //fin du label 
            $liste_label_pays[$id_pays] = $text; //ajout dans le tableau des labels, du label pour le pays
            $liste_couleur_pays[$id_pays] = $couleur; //ajout dans le tableau des pays vitité, la couleur du pays
        }
        $couleur_json = json_encode($liste_couleur_pays); //encodage json du tableau des pays visités (couleur)
        $label_json = json_encode($liste_label_pays); //encodage json du tableau des labels
        return $this->render('CarnetVoyageMapBundle:Map:index.html.twig', array('couleur_pays' => $couleur_json, 'label_pays' => $label_json));
    }

    // liste des voyages (affiché dans le menu)
    public function list_tripAction()
    {
        //liste des voyages
        $voyages = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Voyage')
                ->findAll();

        return $this->render('CarnetVoyageMapBundle:Map:list_trip.html.twig', array('voyages' => $voyages));
    }

    //vue d'un pays
    public function see_countryAction($id)
    {
        // récupérer l'id du pays
        $pays = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Pays')
                ->find($id);

        //liste des destinations
        $liste_destination = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('CarnetVoyageMapBundle:Destination')
                ->findAll();

        // liste des regions du pays
        $liste_region = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Region')
                ->findBy(array ('pays' => $pays->getId()));

        $liste_couleur_region = array(); //déclaration d'un tableau des couleurs de chaque région
        $liste_label_region = array(); //déclaration d'un tableau des labels de chaque région
        
        //pour chaque région de la liste
        //de même que pour la carte mondiale, on cherche dans cette boucle, d'une part, à récupérer les régions visitées pour en changer la couleur
        //et d'autre part le nom de chaque voyage dans la région pour l'ajouter au label
        foreach($liste_region as $region)
        {
            $id_region = $region->getId(); // récupérer l'id de la région
            $couleur = "#E0A000"; //initier la couleur de la région (par défaut non visité)
            $text = "<ul>"; //début du label
            
            //pour chaque destination
            foreach ($liste_destination as $destination)
            {
                $id_visite = $destination->getRegion()->getId(); //récupérer l'id de la région visitée
                if ($id_region == $id_visite) //si l'id de la région visitée correspond de à l'id de la région
                {
                    $couleur = "#D04000"; //on change la couleur
                    $text .= "<li>" . $destination->getVoyage()->getNom() . "</li>"; //on rajoute dans le label le nom du voyage
                }
            }
            
            $text .= "</ul>"; //fin du label
            $liste_label_region[$id_region] = $text; //ajout dans le tableau des labels, le label pour la région
            $liste_couleur_region[$id_region] = $couleur; //ajout dans le tableau des couleur, la couleur de la région
        }
        
        $couleur_json = json_encode($liste_couleur_region); //encodage json du tableau des couleurs
        $label_json = json_encode($liste_label_region); //encodage json du tableau des labels
        $valeur_pays = $pays->getValeur_fichier(); //récupérer le nom du fichier js du pays
        
        return $this->render('CarnetVoyageMapBundle:Map:see_country.html.twig', array('valeur' => $valeur_pays, 'couleur_region' => $couleur_json, 'label_region' => $label_json));
    }
    
    //formulaire d'un nouveau voyage
    public function new_tripAction()
    {
        $voyage = new Voyage();

        $form = $this->createForm(new VoyageType, $voyage, array('pays_region' => $this->tabPaysRegion()));

        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form = $this->createForm(new VoyageType, $voyage);
            $form->bindRequest($request);
            if( $form->isValid() )
            {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($voyage);
                $em->flush();

                return $this->redirect( $this->generateUrl('CarnetVoyageMapAcceuil') );
            }
        }

        return $this->render('CarnetVoyageMapBundle:Map:new_trip.html.twig', array('form' => $form->createView()));
    }

    //formulaire de modification d'un voyage
    public function modify_tripAction($id)
    {
        $voyage = $this->getDoctrine()
                ->getRepository('CarnetVoyage\MapBundle\Entity\Voyage')
                ->find($id);

        $originalsDestinations = array();
        $em = $this->getDoctrine()->getEntityManager();
        
        foreach ($voyage->getDestinations() as $destination)
        {
            $originalsDestinations[] = $destination;
        }

        $form = $this->createForm(new VoyageType, $voyage, array('pays_region' => $this->tabPaysRegion()));

        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form->bindRequest($request);
            if( $form->isValid() )
            {
                foreach ($voyage->getDestinations() as $destination) 
                {
                    foreach ($originalsDestinations as $key => $toDel) 
                    {
                        if ($toDel->getId() === $destination->getId()) 
                        {
                            unset($originalsDestinations[$key]);
                        }
                    }
                }

                // supprime la relation entre le tag et la « Task »
                foreach ($originalsDestinations as $destination) 
                {
                    $em->remove($destination);
                }
                $em->persist($voyage);
                $em->flush();

                return $this->redirect( $this->generateUrl('CarnetVoyageMapAcceuil') );
            }
        }

        return $this->render('CarnetVoyageMapBundle:Map:modify_trip.html.twig', array('form' => $form->createView(), 'id' => $voyage->getNom()));
    }

    //tableau des régions par pays
    public function tabPaysRegion()
    {
        $tab = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('CarnetVoyageMapBundle:Region')
                ->getSelectList();

        return $tab;
    }
}
