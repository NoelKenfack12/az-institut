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
            ->add('titre','text',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Titre du message','style'=>'width: 100%; border-radius: 0px;')))
            ->add('nom','text',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Votre nom','style'=>'width: 100%; border-radius: 0px;'),'required'=>false))
            ->add('contenu','textarea',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Contenu du message','style'=>'width: 100%;border-radius: 0px; height: 100px;')))
            ->add('email','text',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Adresse E-mail','style'=>'width: 100%; border-radius: 0px;'),'required'=>false))
            ->add('tel','number',array('attr'=>array('class'=>'mon-imput','placeholder'=>'Numéro de Téléphone','style'=>'width: 100%; border-radius: 0px;'),'required'=>false))
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
