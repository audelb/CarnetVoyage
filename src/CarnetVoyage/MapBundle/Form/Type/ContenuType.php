<?php

namespace CarnetVoyage\MapBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\Options;

class ContenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $builder
            ->add('nom','text',array ('label'=>'Donnez un nom à cette photo'))
            ->add('file','file',array ('label'=>'Votre photo'))
			->add('destination', 'model', array(
                'class' => 'CarnetVoyage\MapBundle\Model\Destination'
				))
            ->add('date', 'date', array ('required' => false,
                'attr'=> array('class'=>'date'), 
                'widget' => 'single_text', 
                'input'=>'datetime', 
                'format'=>'yyyy-MM-dd',
                'label'=>'Date'))
            ->add('commentaire', 'textarea', array('required' => false,
                'label'=>'quelques commentaires ...'))
            ;
        
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => 'CarnetVoyage\MapBundle\Model\Contenu'
      ));
    }
    
    /*public function getDefaultOptions(array $options){
        return array(
            'data_class'      => 'CarnetVoyage\MapBundle\Model\Destination',
            'choices'   => array()
        );
    }*/

    public function getName()
    {
        return 'carnetvoyage_mapbundle_contenutype';
    }
}
