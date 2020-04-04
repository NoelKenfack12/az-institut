<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentaireblogType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text',array('attr'=>array('placeholder'=>'Titre du sujet','style'=>'width: 100%; border-radius: 0px;','class'=>'form-control')))
            ->add('contenu','textarea',array('attr'=>array('placeholder'=>'Contenu du message','style'=>'width: 100%; height: 120px;','class'=>'form-control tinymce-manager'), 'required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ServiceBundle\Entity\Commentaireblog'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_commentaireblog';
    }
}
