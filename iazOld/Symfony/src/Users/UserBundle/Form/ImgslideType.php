<?php

namespace Users\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImgslideType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file','file')
            ->add('titre','text')
            ->add('backgroundslide', new BackgroundslideType(),array('required'=>false))
            ->add('link','url',array('required'=>false))
            ->add('slide','checkbox',array('required'=>false))
            ->add('description','textarea',array('attr'=>array('class'=>'materialize-textarea')))
            ->add('rang','integer',array('attr'=>array('placeholder'=>'Rang')))
            ->add('souscategorie','entity', array(
			'class'=>'ProduitProduitBundle:Souscategorie',
			'property'=>'nom',
			'multiple'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Users\UserBundle\Entity\Imgslide'
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
