<?php

namespace CarnetVoyage\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarnetVoyage\MapBundle\Entity\Visite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CarnetVoyage\MapBundle\Entity\VisiteRepository")
 */
class Visite
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
     * @var text $commentaire
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="CarnetVoyage\MapBundle\Entity\Destination")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destination;
    
    /**
     * @ORM\ManyToOne(targetEntity="CarnetVoyage\MapBundle\Entity\Visitable")
     * @ORM\JoinColumn(nullable=false)
     */
    private $visitable;

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
     * Set destination
     *
     * @param CarnetVoyage\MapBundle\Entity\Destination $destination
     */
    public function setDestination(\CarnetVoyage\MapBundle\Entity\Destination $destination)
    {
        $this->destination = $destination;
    }

    /**
     * Get destination
     *
     * @return CarnetVoyage\MapBundle\Entity\Destination 
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set visitable
     *
     * @param CarnetVoyage\MapBundle\Entity\Visitable $visitable
     */
    public function setVisitable(\CarnetVoyage\MapBundle\Entity\Visitable $visitable)
    {
        $this->visitable = $visitable;
    }

    /**
     * Get visitable
     *
     * @return CarnetVoyage\MapBundle\Entity\Visitable 
     */
    public function getVisitable()
    {
        return $this->visitable;
    }
}