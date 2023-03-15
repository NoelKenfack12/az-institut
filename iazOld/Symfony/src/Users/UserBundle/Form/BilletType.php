<?php

namespace Users\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BilletType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text',array('attr'=>array('class'=>'input-lg')))
            ->add('description','textarea',array('attr'=>array('class'=>'input-lg materialize-textarea')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Users\UserBundle\Entity\Billet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'users_userbundle_billet';
    }
}
