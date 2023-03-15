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
            ->add('nom','text')
			->add('description','textarea',array('attr'=>array('class'=>'materialize-textarea')))
			->add('helpdashboard','textarea',array('attr'=>array('class'=>'materialize-textarea'),'required'=>false))
			->add('rang','integer',array('required'=>false))
			->add('file','file',array('attr'=>array('style'=>'opacity: 0;'),'required'=>false))
            ->add('categorie','entity', array(
			'class'=>'ProduitProduitBundle:Categorie',
			'property'=>'nom',
			'multiple'=>false))
			->add('cataloguechantier','entity', array(
			'class'=>'ProduitProduitBundle:Cataloguechantier',
			'property'=>'nom',
			'multiple'=>false))
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
