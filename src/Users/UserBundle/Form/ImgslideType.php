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
            ->add('file','file',array('attr'=>array('style'=>'opacity: 0.5; width: 100%;')))
            ->add('titre','text',array('attr'=>array('placeholder'=>'Titre du slide','style'=>'width: 100%;'),'required'=>false))
            ->add('rang','integer',array('attr'=>array('placeholder'=>'Rang','style'=>'width: 100%;')))
            ->add('description','text',array('attr'=>array('placeholder'=>'Contenu du slide','style'=>'width: 100%;'),'required'=>false))
            ->add('link','url',array('attr'=>array('placeholder'=>'Lien vers une page web','style'=>'width: 100%;'),'required'=>false))
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
