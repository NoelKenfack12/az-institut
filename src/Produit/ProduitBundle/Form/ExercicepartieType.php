<?php

namespace Produit\ProduitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExercicepartieType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file','file')
            ->add('correctionexercice',new CorrectionexerciceType(),array('required'=>false))
            ->add('num','integer',array('attr'=>array('class'=>'form-control','placeholder'=>'Numéro de l\'éxercice','style'=>'width: 100%; border-radius: 0px; font-size: 16px;')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ProduitBundle\Entity\Exercicepartie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_produitbundle_exercicepartie';
    }
}
