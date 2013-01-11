<?php

namespace CarnetVoyage\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarnetVoyage\MapBundle\Entity\Destination
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CarnetVoyage\MapBundle\Entity\DestinationRepository")
 */
class Destination
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
     * @var text $commentaire
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="CarnetVoyage\MapBundle\Entity\Region", inversedBy="destinations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;
    
    /**
     * @ORM\ManyToOne(targetEntity="CarnetVoyage\MapBundle\Entity\Voyage", inversedBy="destinations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voyage;

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

    /**
     * Set region
     *
     * @param CarnetVoyage\MapBundle\Entity\Region $region
     */
    public function setRegion(\CarnetVoyage\MapBundle\Entity\Region $region)
    {
        $this->region = $region;
    }

    /**
     * Get region
     *
     * @return CarnetVoyage\MapBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set voyage
     *
     * @param CarnetVoyage\MapBundle\Entity\Voyage $voyage
     */
    public function setVoyage(\CarnetVoyage\MapBundle\Entity\Voyage $voyage)
    {
        $this->voyage = $voyage;
    }

    /**
     * Get voyage
     *
     * @return CarnetVoyage\MapBundle\Entity\Voyage 
     */
    public function getVoyage()
    {
        return $this->voyage;
    }
    
    public function addVoyage(Voyage $voyage) {
        if (!$this->voyages->contains($voyage))  {
            $this->voyages->add($voyage);
        }
    }
}