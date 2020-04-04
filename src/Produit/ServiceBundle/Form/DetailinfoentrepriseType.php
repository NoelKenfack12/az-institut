<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DetailinfoentrepriseType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text',array('attr'=>array('placeholder'=>'Titre de la publication','style'=>'width: 100%; border: none;'),'required'=>false))
            ->add('description','textarea',array('attr'=>array('placeholder'=>'Contenu de la publication','style'=>'width: 100%; border: none; height: 60px;'),'required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ServiceBundle\Entity\Detailinfoentreprise'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_detailinfoentreprise';
    }
}
