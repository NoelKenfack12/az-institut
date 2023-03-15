<?php

namespace App\Form\Users\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Produit\Produit\Souscategorie;
use App\Entity\Users\User\Imgslide;

class ImgslideType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file',FileType::class)
            ->add('titre',TextType::class)
            ->add('backgroundslide', BackgroundslideType::class,array('required'=>false))
            ->add('link',UrlType::class,array('required'=>false))
            ->add('slide',CheckboxType::class,array('required'=>false))
            ->add('description',TextareaType::class,array('attr'=>array('class'=>'materialize-textarea')))
            ->add('rang',IntegerType::class,array('attr'=>array('placeholder'=>'Rang')))
            ->add('souscategorie',EntityType::class, array(
			'class'=> Souscategorie::class,
			'choice_label'=>'nom',
			'multiple'=>false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Imgslide::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'users_userbundle_imgslide';
    }
}
