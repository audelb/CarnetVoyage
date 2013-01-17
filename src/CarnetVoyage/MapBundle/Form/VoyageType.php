<?php

namespace CarnetVoyage\MapBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class VoyageType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array ('required' => false, 
                'label'=>'Donnez un nom à votre voyage'))
            ->add('dateDebut', 'date', array ('required' => false, 
                'attr'=> array('class'=>'date'), 
                'widget' => 'single_text', 
                'input'=>'datetime', 
                'format'=>'yyyy-MM-dd',
                'label'=>'Date de début'))
            ->add('dateFin', 'date', array ('required' => false, 
                'attr'=> array('class'=>'date'), 
                'widget' => 'single_text', 
                'input'=>'datetime', 
                'format'=>'yyyy-MM-dd',
                'label'=>'Date de fin'))
            ->add('commentaire', 'textarea', array ('required' => false,
                'label'=>'quelques commentaires ...'))
            ->add('destinations', 'collection', array('type' => new DestinationType(),
                'options'  => array(
                    'choices'  => $options['paysRegion']),
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                'required' => false))    
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => 'CarnetVoyage\MapBundle\Entity\Voyage'
      ));
    }
    
    public function getDefaultOptions(array $options){
        return array(
            'data_class'      => 'CarnetVoyage\MapBundle\Entity\Voyage',
            'paysRegion'   => array()
        );
    }

    public function getName()
    {
        return 'carnetvoyage_mapbundle_voyagetype';
    }
}
