<?php

namespace CarnetVoyage\MapBundle\Model;

use CarnetVoyage\MapBundle\Model\om\BaseContenu;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Skeleton subclass for representing a row from the 'Contenu' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.src.CarnetVoyage.MapBundle.Model
 */
class Contenu extends BaseContenu
{
	/**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

	public function getAbsolutePath()
    {
        return null === $this->chemin ? null : $this->getUploadRootDir().'/'.$this->chemin;
    }

    public function getWebPath()
    {
        return null === $this->chemin ? null : $this->getUploadDir().'/'.$this->chemin;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'upload/photos';
    }
	
	public function upload()
	{
	    // la propriété « file » peut être vide si le champ n'est pas requis
	    if (null === $this->file) {
	        return;
	    }
	
	    $extension = $this->file->guessExtension();
		if (!$extension) {
		    // l'extension n'a pas été trouvée
		    $extension = 'bin';
		}
		
		$name = rand(1, 99999).'.'.$extension;
	
	    // la méthode « move » prend comme arguments le répertoire cible et
	    // le nom de fichier cible où le fichier doit être déplacé
	    $this->file->move($this->getUploadRootDir(), $name);
	
	    // définit la propriété « path » comme étant le nom de fichier où vous
	    // avez stocké le fichier
	    
	    $this->setChemin($name);
	
	    // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
	    $this->file = null;
	}
	
}
