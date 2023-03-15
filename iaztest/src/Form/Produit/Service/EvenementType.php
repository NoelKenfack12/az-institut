<?php

namespace App\Form\Produit\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Produit\Service\Evenement;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class EvenementType extends AbstractType
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
            ->add('rang',IntegerType::class,array('attr'=>array('style'=>'width: 100%;')))
			->add('link',TextType::class,array('attr'=>array('style'=>'width: 100%;'), 'required'=>false))
            ->add('imgevenement', ImgevenementType::class,array('required'=>false))
			->add('breve',TextType::class,array('attr'=>array('style'=>'width: 100%;')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Evenement::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_evenement';
    }
}
