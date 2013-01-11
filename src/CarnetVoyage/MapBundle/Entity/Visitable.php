<?php

namespace CarnetVoyage\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarnetVoyage\MapBundle\Entity\Visitable
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CarnetVoyage\MapBundle\Entity\VisitableRepository")
 */
class Visitable
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
     * @var string $valeur
     *
     * @ORM\Column(name="valeur", type="string", length=255)
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity="CarnetVoyage\MapBundle\Entity\Region")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;
    
    /**
     * @ORM\ManyToOne(targetEntity="CarnetVoyage\MapBundle\Entity\TypeVisitable")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typevisitable;

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
     * Set valeur
     *
     * @param string $valeur
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

    /**
     * Get valeur
     *
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
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
     * Set typevisitable
     *
     * @param CarnetVoyage\MapBundle\Entity\TypeVisitable $typevisitable
     */
    public function setTypevisitable(\CarnetVoyage\MapBundle\Entity\TypeVisitable $typevisitable)
    {
        $this->typevisitable = $typevisitable;
    }

    /**
     * Get typevisitable
     *
     * @return CarnetVoyage\MapBundle\Entity\TypeVisitable 
     */
    public function getTypevisitable()
    {
        return $this->typevisitable;
    }
}