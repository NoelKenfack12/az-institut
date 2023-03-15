<?php

namespace App\Form\Produit\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Entity\Produit\Service\Infoentreprise;

class InfoentrepriseType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class,array('attr'=>array('placeholder'=>'Titre de la publication','style'=>'width: 100%; border: none;'),'required'=>false))
            ->add('description',TextareaType::class,array('attr'=>array('placeholder'=>'Contenu de la publication','style'=>'width: 100%; border: none; height: 60px;'),'required'=>false))
            ->add('rang',IntegerType::class,array('attr'=>array('placeholder'=>'Rang','style'=>'width: 100%; border: none;')))
            ->add('imginfoentreprise', ImginfoentrepriseType::class,array('required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Infoentreprise::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_infoentreprise';
    }
}
