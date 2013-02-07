<?php

namespace CarnetVoyage\MapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\Options;



class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array ('label'=>'Donnez un nom à votre voyage'))
            ->add('dateDebut', 'date', array ('attr'=> array('class'=>'date'), 
                'widget' => 'single_text', 
                'input'=>'datetime', 
                'format'=>'yyyy-MM-dd',
                'label'=>'Date de début'))
            ->add('dateFin', 'date', array ('attr'=> array('class'=>'date'), 
                'widget' => 'single_text', 
                'input'=>'datetime', 
                'format'=>'yyyy-MM-dd',
                'label'=>'Date de fin'))
            ->add('commentaire', 'textarea', array ('required' => false,
                'label'=>'quelques commentaires ...'))
            ->add('destinations', 'collection', array('type' => new DestinationType(),
                /*'options'  => array(
                    'choices'  => $options['paysRegion']),*/
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                'required' => false,
				'label'=>' '))    
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => 'CarnetVoyage\MapBundle\Model\Voyage'
      ));
    }
    
    /*public function getDefaultOptions(array $options){
        return array(
            'data_class'      => 'CarnetVoyage\MapBundle\Model\Voyage',
            'paysRegion'   => array()
        );
    }*/

    public function getName()
    {
        return 'carnetvoyage_mapbundle_voyagetype';
    }
}
