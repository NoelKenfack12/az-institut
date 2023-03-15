<?php

namespace App\Form\Produit\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Entity\Produit\Service\Apropos;

class AproposType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array('attr'=>array('placeholder'=>'Nom de l\'auteur ou titre ou de l\'entreprise')))
            ->add('poste',TextType::class,array('attr'=>array('placeholder'=>'Poste de l\'auteur'),'required'=>false))
            ->add('contenu',TextareaType::class,array('attr'=>array('placeholder'=>'Contenu')))
            ->add('facebook',TextType::class,array('attr'=>array('placeholder'=>'Adresse Facebook'),'required'=>false))
            ->add('twitter',TextType::class,array('attr'=>array('placeholder'=>'Adresse twitter'),'required'=>false))
            ->add('google',TextType::class,array('attr'=>array('placeholder'=>'Adresse google'),'required'=>false))
			->add('tel',TextType::class,array('required'=>false))
            ->add('email',TextType::class,array('required'=>false))
            ->add('file',FileType::class,array('attr'=>array('style'=>'opacity: 0.5;')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Apropos::class
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
