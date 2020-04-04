<?php

namespace Produit\ProduitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SouscategorieType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('attr'=>array('placeholder'=>'Nom du module')))
			->add('contenu','textarea',array('attr'=>array('placeholder'=>'Contenu'),'required'=>false))
			->add('rang','integer',array('attr'=>array('placeholder'=>'rang'),'required'=>false))
			->add('file','file',array('attr'=>array('style'=>'opacity: 0.5;'),'required'=>false))
            ->add('categorie','entity', array(
			'class'=>'ProduitProduitBundle:Categorie',
			'property'=>'nom',
			'multiple'=>false, 
			'attr'=>array('style'=>'width: 100%; padding-left: 30px;')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ProduitBundle\Entity\Souscategorie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_produitbundle_souscategorie';
    }
}
