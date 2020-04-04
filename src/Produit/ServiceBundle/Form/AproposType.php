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
            ->add('nom','text',array('attr'=>array('placeholder'=>'Nom de l\'auteur','class'=>'form-control','style'=>'width: 100%;')))
            ->add('poste','text',array('attr'=>array('placeholder'=>'Poste de l\'auteur','class'=>'form-control','style'=>'width: 100%;'),'required'=>false))
            ->add('contenu','textarea',array('attr'=>array('placeholder'=>'Contenu','class'=>'form-control','style'=>'width: 100%;')))
            ->add('rang','integer',array('attr'=>array('placeholder'=>'Rang','class'=>'form-control','style'=>'width: 100%;')))
            ->add('facebook','text',array('attr'=>array('placeholder'=>'Adresse Facebook','class'=>'form-control','style'=>'width: 100%;'),'required'=>false))
            ->add('twitter','text',array('attr'=>array('placeholder'=>'Adresse twitter','class'=>'form-control','style'=>'width: 100%;'),'required'=>false))
            ->add('google','text',array('attr'=>array('placeholder'=>'Adresse google','class'=>'form-control','style'=>'width: 100%;'),'required'=>false))
            ->add('file','file')
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
