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
            ->add('nom','text',array('attr'=>array('placeholder'=>'Votre non','style'=>'width: 100%;','class'=>'form-control')))
            ->add('email','email',array('attr'=>array('placeholder'=>'Votre email','style'=>'width: 100%;','class'=>'form-control')))
            ->add('url','url',array('attr'=>array('placeholder'=>'Site web','style'=>'width: 100%;','class'=>'form-control'),'required'=>false))
            ->add('contenu','textarea',array('attr'=>array('placeholder'=>'Description du service','style'=>'width: 100%; height: 120px;','class'=>'form-control','row'=>'8')))
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
