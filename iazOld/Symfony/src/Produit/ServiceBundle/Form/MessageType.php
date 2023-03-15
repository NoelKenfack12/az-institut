<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Titre du message','style'=>'width: 100%;')))
            ->add('nom','text',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Votre nom','style'=>'width: 100%;'),'required'=>false))
            ->add('contenu','textarea',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Contenu du message','style'=>'width: 100%;')))
            ->add('email','text',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Email','style'=>'width: 100%;'),'required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ServiceBundle\Entity\Message'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_message';
    }
}
