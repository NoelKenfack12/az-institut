<?php

namespace Users\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImgslideeditType extends ImgslideType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
		$builder->add('file', 'file', array('required'=>false));
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'users_userbundle_imgslideedit';
    }
}
