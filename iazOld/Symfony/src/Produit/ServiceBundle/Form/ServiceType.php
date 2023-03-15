<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('attr'=>array('style'=>'width: 100%;')))
            ->add('breve','text',array('attr'=>array('style'=>'width: 100%;')))
            ->add('link','text',array('attr'=>array('style'=>'width: 100%;'),'required'=>false))
            ->add('keyword','text',array('attr'=>array('style'=>'width: 100%;')))
            ->add('description','textarea',array('attr'=>array('class'=>'materialize-textarea','style'=>'width: 100%;')))
			->add('principal','checkbox',array('required'=>false))
			->add('rang','integer',array('required'=>false))
            ->add('imgservice',new ImgserviceType(),array('required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ServiceBundle\Entity\Service'
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
