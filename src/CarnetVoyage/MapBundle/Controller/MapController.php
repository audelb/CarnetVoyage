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
    /**
     * Page d'accueil 
     */ 
    public function indexAction()
    {
        //récupérer toutes les destinations visitées
        $listeDestination = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('CarnetVoyageMapBundle:Destination')
                ->findAll();

        //liste des pays
        $listePays = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Pays')
                ->findAll();

        $listeCouleurPays = array(); //déclaration d'un tableau des pays visités
        $listeLabelPays = array(); //déclaration d'un tableau des labels par pays 

        //pour chaque pays de la liste
        foreach($listePays as $pays)
        {
            $idPays = $pays->getId(); //récupérer l'id
            $couleur = "#E0A000"; //initialisation de la couleur du pays (par défaut pays non visité)
            $text = "<ul>"; //initialisation du label du pays
            $listeVoyagePays = array();//déclaration d'un tableau des voyages pour chaque pays 
            
            //pour chaque destination visitée
            // dans cette boucle, on cherche d'une part à connaître les pays qui ont été visités pour en changer la couleur
            // et d'autre part, à récupérer le nom des voyages effectués dans chacun de ces pays
            foreach ($listeDestination as $destination)
            {
                $idVisite = $destination->getRegion()->getPays()->getId(); //récupérer l'id du pays visité
                $voyageTemp = $destination->getVoyage()->getId(); //récupérer l'id du voyage correspondant à la destination
                
                if ($idPays == $idVisite) // si l'id du pays correspond à l'id d'un pays visité
                {
                    $couleur = "#D04000"; // on change la couleur du pays
                    
                    if (!in_array($voyageTemp, $listeVoyagePays)) //si le voyage n'est pas dans la liste des voyage
                    {
                        $text .= "<li>" . $destination->getVoyage()->getNom() . "</li>"; //on complète le texte du label par le nom du voyage
                        $listeVoyagePays[] = $voyageTemp; //on rajoute ce voyage à la liste des voyages (l'objectif étant d'éviter qu'on est 2 fois un même voyage dans le label d'un pays)
                    }
                }
            }
            
            $text .= "</ul>"; //fin du label 
            $listeLabelPays[$idPays] = $text; //ajout dans le tableau des labels, du label pour le pays
            $listeCouleurPays[$idPays] = $couleur; //ajout dans le tableau des pays vitité, la couleur du pays
        }
        
        $couleurJson = json_encode($listeCouleurPays); //encodage json du tableau des pays visités (couleur)
        $labelJson = json_encode($listeLabelPays); //encodage json du tableau des labels
        
        return $this->render('CarnetVoyageMapBundle:Map:index.html.twig', array('couleurPays' => $couleurJson, 'labelPays' => $labelJson));
    }

    /**
     * Liste des voyages
     *
     */
    public function listTripAction()
    {
        //liste des voyages
        $voyages = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Voyage')
                ->findAll();

        return $this->render('CarnetVoyageMapBundle:Map:listTrip.html.twig', array('voyages' => $voyages));
    }

    /**
     * Vue d'un pays
     *
     * @param integer $id id du pays à afficher
     */
    public function seeCountryAction($id)
    {
        // récupérer l'id du pays
        $pays = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Pays')
                ->find($id);

        //liste des destinations
        $listeDestination = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('CarnetVoyageMapBundle:Destination')
                ->findAll();

        // liste des regions du pays
        $listeRegion = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Region')
                ->findBy(array ('pays' => $pays->getId()));

        $listeCouleurRegion = array(); //déclaration d'un tableau des couleurs de chaque région
        $listeLabelRegion = array(); //déclaration d'un tableau des labels de chaque région
        
        //pour chaque région de la liste
        //de même que pour la carte mondiale, on cherche dans cette boucle, d'une part, à récupérer les régions visitées pour en changer la couleur
        //et d'autre part le nom de chaque voyage dans la région pour l'ajouter au label
        foreach ($listeRegion as $region)
        {
            $idRegion = $region->getId(); // récupérer l'id de la région
            $couleur = "#E0A000"; //initier la couleur de la région (par défaut non visité)
            $text = "<ul>"; //début du label
            
            //pour chaque destination
            foreach ($listeDestination as $destination)
            {
                $idVisite = $destination->getRegion()->getId(); //récupérer l'id de la région visitée
                
                if ($idRegion == $idVisite) //si l'id de la région visitée correspond de à l'id de la région
                {
                    $couleur = "#D04000"; //on change la couleur
                    $text .= "<li>" . $destination->getVoyage()->getNom() . "</li>"; //on rajoute dans le label le nom du voyage
                }
            }
            
            $text .= "</ul>"; //fin du label
            $listeLabelRegion[$idRegion] = $text; //ajout dans le tableau des labels, le label pour la région
            $listeCouleurRegion[$idRegion] = $couleur; //ajout dans le tableau des couleur, la couleur de la région
        }
        
        $couleurJson = json_encode($listeCouleurRegion); //encodage json du tableau des couleurs
        $labelJson = json_encode($listeLabelRegion); //encodage json du tableau des labels
        $valeurPays = $pays->getValeur_fichier(); //récupérer le nom du fichier js du pays
        
        return $this->render('CarnetVoyageMapBundle:Map:seeCountry.html.twig', array('valeur' => $valeurPays, 'couleurRegion' => $couleurJson, 'labelRegion' => $labelJson));
    }
    
    /**
     * nouveau voyage
     *
     */
    public function newTripAction()
    {
        //nouvelle entité voyage
        $voyage = new Voyage();

        //créer un formulaire pour cette entité avec en option un tableau sur 2 niveau des régions (par pays)
        $form = $this->createForm(new VoyageType, $voyage, array('paysRegion' => $this->tabPaysRegion()));

        $request = $this->get('request');
        //si la méthode est de type POST, on soummet le formulaire
        if( $request->getMethod() == 'POST' ) 
        {
            $form = $this->createForm(new VoyageType, $voyage);
            $form->bindRequest($request);
            
            //vérifier que le formulaire est valide
            if( $form->isValid() )
            {
                //si oui, enregistrer les données
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($voyage);
                $em->flush();

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
        $voyage = $this->getDoctrine()
                ->getRepository('CarnetVoyage\MapBundle\Entity\Voyage')
                ->find($id);

        $originalsDestinations = array(); //déclaration d'un tableau des destinations pour ce voyage
        $em = $this->getDoctrine()->getEntityManager();
        
        //remplir le tableau des destinations 
        foreach ($voyage->getDestinations() as $destination)
        {
            $originalsDestinations[] = $destination;
        }

        //création du formulaire de voyage
        $form = $this->createForm(new VoyageType, $voyage, array('paysRegion' => $this->tabPaysRegion()));

        $request = $this->get('request');
        //si la méthode est de type POST, on soummet le formulaire
        if( $request->getMethod() == 'POST' )
        {
            $form->bindRequest($request);
            
            //si le formulaire est valide
            if( $form->isValid() )
            {
                //il faut vérifier que toutes les destinations présentes à l'origine le sont toujours
                //Faut-il en supprimer ?
                foreach ($voyage->getDestinations() as $destination) 
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
                    $em->remove($destination);
                }
                
                // on enregistre les données 
                $em->persist($voyage);
                $em->flush();

                // on redirige vers la page d'accueil
                return $this->redirect( $this->generateUrl('CarnetVoyageMapAcceuil') );
            }
        }

        // on affiche le formulaire de modification
            // soit parce que les données sont invalides
            // soit parce que la méthode n'est pas de type POST, on est dans la partie création du formulaire et non enregitrement
        return $this->render('CarnetVoyageMapBundle:Map:modifyTrip.html.twig', array('form' => $form->createView(), 'id' => $voyage->getNom()));
    }

    /**
     * tableau des régions par pays
     *
     * @return array 
     */
    public function tabPaysRegion()
    {
        $tab = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('CarnetVoyageMapBundle:Region')
                ->getSelectList();

        return $tab;
    }
}
