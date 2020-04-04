<?php

namespace Produit\ProduitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChapitrecoursType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text',array('attr'=>array('class'=>'form-control','placeholder'=>'Titre du chapitre','style'=>'width: 100%; border-radius: 0px; font-size: 16px;')))
            ->add('contenu','textarea',array('attr'=>array('class'=>'form-control tinymce-manager','placeholder'=>'Présentation  votre cours','style'=>'width: 100%'),'required'=>false))
            ->add('rang','integer',array('attr'=>array('class'=>'form-control','placeholder'=>'Chapitre n°:','style'=>'width: 100%; border-radius: 0px;')))
			->add('imgchapitre',new ImgchapitreType())
			->add('videochapitre',new VideochapitreType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ProduitBundle\Entity\Chapitrecours'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_produitbundle_chapitrecours';
    }
}
