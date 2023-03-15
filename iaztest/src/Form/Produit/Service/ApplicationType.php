<?php

namespace App\Form\Produit\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Produit\Service\Categorieappli;
use App\Entity\Produit\Service\Application;

class ApplicationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array('attr'=>array('style'=>'width: 100%;')))
			->add('description',TextareaType::class,array('attr'=>array('class'=>'materialize-textarea','style'=>'width: 100%;')))
            ->add('siteweb',TextType::class,array('attr'=>array('style'=>'width: 100%;')))
            ->add('file',FileType::class, array('required'=>false))
            ->add('categorieappli',EntityType::class, array(
			'class'=> Categorieappli::class,
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
            'data_class' => Application::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_application';
    }
}