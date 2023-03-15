<?php

namespace App\Form\Produit\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecrutementeditType extends RecrutementType
{
      /**
     * @param FormBuilderInterface $builder
     * @param array $options
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
	    $builder->add('file',FileType::class,array('required'=>false));
	    $builder->add('yourcv', YourcvType::class ,array('required'=>false));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_recrutement_edit';
    }
}
