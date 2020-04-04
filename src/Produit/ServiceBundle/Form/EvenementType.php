<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EvenementType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('attr'=>array('class'=>'form-control','placeholder'=>'Titre de la partie','style'=>'width: 100%; border-radius: 0px;')))
            ->add('description','textarea',array('attr'=>array('class'=>'form-control tinymce-manager','placeholder'=>'Description de la partie','style'=>'width: 100%; border-radius: 0px;'),'required'=>false))
			->add('rang','text',array('attr'=>array('class'=>'form-control', 'placeholder'=>'Rang','style'=>'width: 100%; border-radius: 0px;')))
			->add('imgevenement',new ImgevenementType(),array('required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ServiceBundle\Entity\Evenement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_evenement';
    }
}
