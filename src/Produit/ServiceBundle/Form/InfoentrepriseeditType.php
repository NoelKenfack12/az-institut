<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InfoentrepriseeditType extends InfoentrepriseType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		parent::buildForm($builder, $options);
		$builder->remove('principal');
		$builder->add('titre','text',array('attr'=>array('placeholder'=>'Titre de la publication','class'=>'form-control','style'=>'width: 100%;')));
		$builder->add('link','url',array('attr'=>array('placeholder'=>'Ajouter un lien','class'=>'form-control','style'=>'width: 100%;'),'required'=>false));
        $builder->add('description','textarea',array('attr'=>array('placeholder'=>'Contenu de la publication','class'=>'form-control','style'=>'width: 100%;height: 60px;')));
        $builder->add('rang','integer',array('attr'=>array('placeholder'=>'Rang','class'=>'form-control','style'=>'width: 100%;')));
		$builder->add('imginfoentreprise', new ImginfoentrepriseType());
	}


    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_infoentrepriseedit';
    }
}
