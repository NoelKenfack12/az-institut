<?php

namespace App\Form\Produit\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Entity\Produit\Service\Continent;
use App\Entity\Produit\Service\Pays;

class PaysType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
            ->add('siteweb',TextType::class)
            ->add('citoyen',TextType::class)
            ->add('citoyenne',TextType::class)
            ->add('code',TextType::class)
            ->add('domaine',TextType::class)
            ->add('drapeau',DrapeauType::class)
            ->add('file',FileType::class, array('required'=>false))
            ->add('continent',EntityType::class, array(
                'class'=> Continent::class,
                'choice_label'=>'nom',
                'multiple'=>false, 
                'attr'=>array('class'=>'form-control input-lg')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Pays::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_pays';
    }
}