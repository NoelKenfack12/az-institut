<?php

namespace Produit\ProduitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartiecoursType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text',array('attr'=>array('class'=>'form-control','placeholder'=>'Titre de la partie','style'=>'width: 100%;')))
            ->add('rang','integer',array('attr'=>array('class'=>'form-control','placeholder'=>'Titre de la partie','style'=>'width: 100%;')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ProduitBundle\Entity\Partiecours'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_produitbundle_partiecours';
    }
}
