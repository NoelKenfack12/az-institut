<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApplicationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('attr'=>array('style'=>'width: 100%;')))
			->add('description','textarea',array('attr'=>array('class'=>'materialize-textarea','style'=>'width: 100%;')))
            ->add('siteweb','text',array('attr'=>array('style'=>'width: 100%;')))
            ->add('file','file', array('required'=>false))
			->add('rang','integer')
            ->add('categorieappli','entity', array(
			'class'=>'ProduitServiceBundle:Categorieappli',
			'property'=>'nom',
			'multiple'=>false, 
			'attr'=>array('class'=>'form-control input-lg')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ServiceBundle\Entity\Application'
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