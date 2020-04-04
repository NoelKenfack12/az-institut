<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('attr'=>array('class'=>'form-control','placeholder'=>'Intitulé de l\'offre de formation','style'=>'width: 100%; border-radius: 0px;'),'required'=>false))
			->add('description','textarea',array('attr'=>array('class'=>'form-control tinymce-manager','placeholder'=>'Description de l\'offre de formation','style'=>'width: 100%'),'required'=>false))
			->add('detail','textarea',array('attr'=>array('class'=>'form-control tinymce-manager','placeholder'=>'Détail sur cette offre de formation','style'=>'width: 100%'),'required'=>false))
            ->add('pubinline','textarea',array('attr'=>array('class'=>'form-control','placeholder'=>'Message pub formation en ligne','style'=>'width: 100%; border-radius: 0px;')))
            ->add('puboffline','textarea',array('attr'=>array('class'=>'form-control','placeholder'=>'Message pub formation au centre','style'=>'width: 100%; border-radius: 0px;')))
			->add('keyword','text',array('attr'=>array('class'=>'form-control','placeholder'=>'Les mots clés rapportant à la formation','style'=>'width: 100%; border-radius: 0px;'),'required'=>false))
            ->add('rang','integer',array('attr'=>array('class'=>'form-control','placeholder'=>'Numéro de formation','style'=>'width: 100%; border-radius: 0px;')))
            ->add('nprix','integer',array('attr'=>array('class'=>'form-control','placeholder'=>'Prix de la formation en ligne','style'=>'width: 100%; border-radius: 0px;')))
            ->add('nprixoff','integer',array('attr'=>array('class'=>'form-control','placeholder'=>'Prix de la formation au centre','style'=>'width: 100%; border-radius: 0px;')))
            ->add('recrutement','checkbox',array('required'=>false))
            ->add('imgservice',new ImgserviceType())
            ->add('imgservicesecond',new ImgservicesecondType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ServiceBundle\Entity\Service'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_service';
    }
}
