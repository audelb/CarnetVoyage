<?php

namespace CarnetVoyage\MapBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DestinationType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {   
        $builder
            ->add('region','entity',array(
                'class'=>'CarnetVoyageMapBundle:Region',
                'choices'=>$options['choices'],
                'attr'=>array('class'=>'select_region'),
                'property'=>'valeur',
                'label'=>'Quelle région du monde avez-vous visité ?'))
            ->add('dateDebut', 'date', array ('attr'=> array('class'=>'date'), 
                'widget' => 'single_text', 
                'input'=>'datetime', 
                'format'=>'yyyy-MM-dd', 
                'label'=>'Date de début' ))
            ->add('dateFin', 'date', array ('attr'=> array('class'=>'date'), 
                'widget' => 'single_text', 
                'input'=>'datetime', 
                'format'=>'yyyy-MM-dd',
                'label'=>'Date de fin'))
            ->add('commentaire', 'textarea', array('label'=>'quelques commentaires ...'))
            ;
        
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => 'CarnetVoyage\MapBundle\Entity\Destination'
      ));
    }
    
    public function getDefaultOptions(array $options){
        return array(
            'data_class'      => 'CarnetVoyage\MapBundle\Entity\Destination',
            'choices'   => array()
        );
    }

    public function getName()
    {
        return 'carnetvoyage_mapbundle_destinationtype';
    }
}
