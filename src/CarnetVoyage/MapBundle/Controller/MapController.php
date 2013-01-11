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
    public function indexAction()
    {
        $liste_destnation = $this->getDoctrine()
                                ->getEntityManager()
                                ->getRepository('CarnetVoyageMapBundle:Destination')
                                ->findAll();
        
        
        $liste_pays = $this->getDoctrine()
            ->getRepository('CarnetVoyageMapBundle:Pays')
            ->findAll();
        
        $liste_pays_visite = array();
        
         foreach($liste_pays as $pays)
         {
           $id = $pays->getId();
           $visite = "#E0A000";
           foreach ($liste_destnation as $destination)
           {
               $id_visite = $destination->getRegion()->getPays()->getId()  ;
               if ($id == $id_visite)
               {
                   $visite = "#D04000";
               }
           } 
           $liste_pays_visite[$id] = $visite;
         }
         $pays_json = json_encode($liste_pays_visite);
               return $this->render('CarnetVoyageMapBundle:Map:index.html.twig', array('pays_visite' => $pays_json));
     }
    
    public function list_tripAction()
    {
        $voyages = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Voyage')
                ->findAll();
        
        return $this->render('CarnetVoyageMapBundle:Map:list_trip.html.twig', array('voyages' => $voyages)
        );
    }


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
        
        $liste_region_visite = array();
        
         foreach($liste_region as $region)
         {
           $id = $region->getId();
           $visite = "#E0A000";
           foreach ($liste_destination as $destination)
           {
               $id_visite = $destination->getRegion()->getId()  ;
               if ($id == $id_visite)
               {
                   $visite = "#D04000";
               }
           } 
           $liste_region_visite[$id] = $visite;
         }
         $region_json = json_encode($liste_region_visite);

        // On récupère l'entité correspondant à l'id $id
        $valeur_pays = $pays->getValeur_fichier();
        return $this->render('CarnetVoyageMapBundle:Map:see_country.html.twig', array('valeur' => $valeur_pays, 'region_visite' => $region_json));
    }
    
    public function new_tripAction()
    {
        $voyage = new Voyage();
        
        $tab = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('CarnetVoyageMapBundle:Region')
                ->getSelectList();
        
        $form = $this->createForm(new VoyageType, $voyage, array('pays_region' => $tab));
        
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

        return $this->render('CarnetVoyageMapBundle:Map:new_trip.html.twig', array(
          'form' => $form->createView(),
        ));
    }
    
    public function modify_tripAction($id)
    {
        $voyage = $this->getDoctrine()
                ->getRepository('CarnetVoyage\MapBundle\Entity\Voyage')
                ->find($id);
        
        $originalsDestinations = array();
        $em = $this->getDoctrine()->getEntityManager();
        foreach ($voyage->getDestinations() as $destination) $originalsDestinations[] = $destination;
        
        $form = $this->createForm(new VoyageType, $voyage);

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
                    // supprime la « Task » du Tag
                    $em->remove($destination);
                }
                $em->persist($voyage);
                $em->flush();

                return $this->redirect( $this->generateUrl('CarnetVoyageMapAcceuil') );
          }
        }

        return $this->render('CarnetVoyageMapBundle:Map:modify_trip.html.twig', array(
          'form' => $form->createView(), 'id' => $voyage->getNom()
        ));
    }
    
    public function tabPaysRegion()
    {
        $region_choice = array();
        
        $liste_pays = $this->getDoctrine()
                ->getRepository('CarnetVoyageMapBundle:Pays')
                ->findAll();
        
        foreach ($liste_pays as $pays){
            $region_choice[] = $pays->getValeur();
        }
        
        return $region_choice;
    }
}
