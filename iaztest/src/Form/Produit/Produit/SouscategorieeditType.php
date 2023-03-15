<?php

namespace App\Form\Produit\Produit;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SouscategorieeditType extends SouscategorieType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
	    $builder->add('link',TextType::class,array('attr'=>array('placeholder'=>'Ajouter un lien vers cette offre'),'required'=>false));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_produitbundle_souscategorie_edit';
    }
}
