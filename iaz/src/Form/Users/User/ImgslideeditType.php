<?php

namespace App\Form\Users\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ImgslideeditType extends ImgslideType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
		$builder->add('file', FileType::class, array('required'=>false));
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
