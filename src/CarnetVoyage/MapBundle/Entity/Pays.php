<?php

namespace CarnetVoyage\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarnetVoyage\MapBundle\Entity\Pays
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CarnetVoyage\MapBundle\Entity\PaysRepository")
 */
class Pays
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
     * @var string $nom_fichier
     *
     * @ORM\Column(name="nom_fichier", type="string", length=255)
     */
    private $nom_fichier;
    
    /**
     * @var string $valeur_fichier
     *
     * @ORM\Column(name="valeur_fichier", type="string", length=255)
     */
    private $valeur_fichier;


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
     * Set nom_fichier
     *
     * @param string $nom_fichier
     */
    public function setNom_fichier($nom_fichier)
    {
        $this->nom_fichier = $nom_fichier;
    }

    /**
     * Get nom_fichier
     *
     * @return string 
     */
    public function getNom_fichier()
    {
        return $this->nom_fichier;
    }
    
    /**
     * Set valeur_fichier
     *
     * @param string $valeur_fichier
     */
    public function setValeur_fichier($valeur_fichier)
    {
        $this->valeur_fichier = $valeur_fichier;
    }

    /**
     * Get valeur_fichier
     *
     * @return string 
     */
    public function getValeur_fichier()
    {
        return $this->valeur_fichier;
    }
}