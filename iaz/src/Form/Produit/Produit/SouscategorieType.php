<?php

namespace App\Form\Produit\Produit;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use App\Entity\Produit\Produit\Categorie;
use App\Entity\Produit\Produit\Souscategorie;
use App\Entity\Produit\Produit\Cataloguechantier;

class SouscategorieType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
			->add('description',TextareaType::class,array('attr'=>array('class'=>'materialize-textarea')))
			->add('helpdashboard',TextareaType::class,array('attr'=>array('class'=>'materialize-textarea'),'required'=>false))
			->add('rang',IntegerType::class,array('required'=>false))
			->add('file',FileType::class,array('attr'=>array('style'=>'opacity: 0;'),'required'=>false))
            ->add('categorie',EntityType::class, array(
			'class'=> Categorie::class,
			'choice_label'=>'nom',
			'multiple'=>false))
            ->add('cataloguechantier',EntityType::class, array(
                'class'=> Cataloguechantier::class,
                'property'=>'nom',
                'multiple'=>false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Souscategorie::class
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
