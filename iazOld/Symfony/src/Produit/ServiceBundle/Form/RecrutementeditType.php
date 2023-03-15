<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RecrutementeditType extends RecrutementType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
	    $builder->add('file','file',array('required'=>false));
	    $builder->add('yourcv',new YourcvType(),array('required'=>false));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_recrutement_edit';
    }
}
