<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InfoentrepriseType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text',array('attr'=>array('placeholder'=>'Titre de la publication','style'=>'width: 100%;','class'=>'form-control'),'required'=>false))
            ->add('description','textarea',array('attr'=>array('placeholder'=>'Contenu de la publication','style'=>'width: 100%;height: 60px;','class'=>'form-control'),'required'=>false))
            ->add('rang','integer',array('attr'=>array('placeholder'=>'Rang','style'=>'width: 100%;','class'=>'form-control')))
            ->add('imginfoentreprise', new ImginfoentrepriseType(),array('required'=>false))
			->add('principal','checkbox',array('required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ServiceBundle\Entity\Infoentreprise'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_infoentreprise';
    }
}
