<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AproposType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('attr'=>array('placeholder'=>'Nom de l\'auteur ou titre ou de l\'entreprise')))
            ->add('poste','text',array('attr'=>array('placeholder'=>'Poste de l\'auteur'),'required'=>false))
            ->add('contenu','textarea',array('attr'=>array('placeholder'=>'Contenu')))
            ->add('facebook','text',array('attr'=>array('placeholder'=>'Adresse Facebook'),'required'=>false))
            ->add('twitter','text',array('attr'=>array('placeholder'=>'Adresse twitter'),'required'=>false))
            ->add('google','text',array('attr'=>array('placeholder'=>'Adresse google'),'required'=>false))
			->add('tel','text',array('required'=>false))
            ->add('email','text',array('required'=>false))
            ->add('file','file',array('attr'=>array('style'=>'opacity: 0.5;')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ServiceBundle\Entity\Apropos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_apropos';
    }
}
