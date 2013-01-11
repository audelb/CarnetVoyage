<?php

namespace CarnetVoyage\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarnetVoyage\MapBundle\Entity\Region
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CarnetVoyage\MapBundle\Entity\RegionRepository")
 */
class Region
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string $valeur
     *
     * @ORM\Column(name="valeur", type="string", length=255)
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity="CarnetVoyage\MapBundle\Entity\Pays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pays;

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
     * Set id
     *
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * Set pays
     *
     * @param CarnetVoyage\MapBundle\Entity\Pays $pays
     */
    public function setPays(\CarnetVoyage\MapBundle\Entity\Pays $pays)
    {
        $this->pays = $pays;
    }

    /**
     * Get pays
     *
     * @return CarnetVoyage\MapBundle\Entity\Pays 
     */
    public function getPays()
    {
        return $this->pays;
    }
}