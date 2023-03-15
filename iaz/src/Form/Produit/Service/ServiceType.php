<?php

namespace App\Form\Produit\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Entity\Produit\Service\Service;

class ServiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array('attr'=>array('style'=>'width: 100%;')))
            ->add('breve',TextType::class,array('attr'=>array('style'=>'width: 100%;')))
            ->add('link',TextType::class,array('attr'=>array('style'=>'width: 100%;'),'required'=>false))
            ->add('keyword',TextType::class,array('attr'=>array('style'=>'width: 100%;')))
            ->add('description',TextareaType::class,array('attr'=>array('class'=>'materialize-textarea','style'=>'width: 100%;')))
			->add('principal',CheckboxType::class,array('required'=>false))
			->add('rang',IntegerType::class,array('required'=>false))
            ->add('imgservice',ImgserviceType::class,array('required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Service::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_service';
    }
}
