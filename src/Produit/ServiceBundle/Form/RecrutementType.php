<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RecrutementType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Rentrez votre nom','style'=>'width: 100%; border-radius: 0px;')))
            ->add('villeactuel','text',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Ville actuelle','style'=>'width: 100%; border-radius: 0px;')))
            ->add('mail','text',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Votre adresse E-mail','style'=>'width: 100%; border-radius: 0px;')))
            ->add('tel','number',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Numéro de Téléphone','style'=>'width: 100%; border-radius: 0px;')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ServiceBundle\Entity\Recrutement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_recrutement';
    }
}
