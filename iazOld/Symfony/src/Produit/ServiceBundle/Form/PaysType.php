<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaysType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text')
            ->add('siteweb','text')
            ->add('citoyen','text')
            ->add('citoyenne','text')
            ->add('code','text')
            ->add('domaine','text')
            ->add('drapeau',new DrapeauType())
            ->add('file','file', array('required'=>false))
            ->add('continent','entity', array(
			'class'=>'ProduitServiceBundle:Continent',
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
            'data_class' => 'Produit\ServiceBundle\Entity\Pays'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_pays';
    }
}