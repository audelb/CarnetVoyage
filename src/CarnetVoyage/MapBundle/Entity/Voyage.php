<?php

namespace CarnetVoyage\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarnetVoyage\MapBundle\Entity\Voyage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CarnetVoyage\MapBundle\Entity\VoyageRepository")
 */
class Voyage
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var date $dateDebut
     *
     * @ORM\Column(name="dateDebut", type="date")
     */
    private $dateDebut;

    /**
     * @var date $dateFin
     *
     * @ORM\Column(name="dateFin", type="date")
     */
    private $dateFin;

    /**
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var text $commentaire
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;
    
    /**
     * @ORM\OneToMany(targetEntity="CarnetVoyage\MapBundle\Entity\Destination", mappedBy="voyage", cascade={"persist"})
     */
    public $destinations;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateDebut
     *
     * @param date $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * Get dateDebut
     *
     * @return date 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param date $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * Get dateFin
     *
     * @return date 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set nom
     *
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set commentaire
     *
     * @param text $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * Get commentaire
     *
     * @return text 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
    
    public function __construct()
    {
      // Rappelez-vous, on a un attribut qui doit contenir un ArrayCollection, on doit l'initialiser dans le constructeur
      $this->destinations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addDestination(\CarnetVoyage\MapBundle\Entity\Destination $destination)
    {
      $this->destinations[] = $destination;
      return $this;
    }

    public function removeDestination(\CarnetVoyage\MapBundle\Entity\Destination $destination)
    {
      $this->destinations->removeElement($destination);
    }

    public function getDestinations()
    {
      return $this->destinations;
    }
    
    public function setDestinations($destinations){
        foreach ($destinations as $destination) {
            $destination->setVoyage($this);
        }    
        $this->destinations = $destinations;
    }
    
    public function getNbDestinations()
    {
        return $this->destinations->count();
    }
}