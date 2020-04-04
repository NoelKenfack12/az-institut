<?php

namespace Users\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('attr'=>array('placeholder'=>'Entrez votre nom')))
            ->add('username','text',array('attr'=>array('placeholder'=>'Votre E-mail')))
            ->add('password','password',array('attr'=>array('placeholder'=>'Entrez votre mot de passe')))
            ->add('tel','text',array('attr'=>array('class'=>'number','placeholder'=>'Votre Téléphone'),'required'=>false))
			->add('ville','entity', array(
			'class'=>'ProduitServiceBundle:Ville',
			'property'=>'nom',
			'multiple'=>false, 
			'attr'=>array('class'=>'country','style'=>'width: 100%; text-transform: lowercase;')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Users\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'users_userbundle_user';
    }
}
