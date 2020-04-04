<?php

namespace Produit\ServiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServiceeditType extends ServiceType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
		$builder->remove('detail');
		$builder->remove('pubinline');
		$builder->remove('puboffline');
		$builder->remove('nprix');
		$builder->remove('nprixoff');
		$builder->remove('recrutement');
		$builder->remove('imgservicesecond');
		$builder->add('nom','text',array('attr'=>array('class'=>'form-control','placeholder'=>'Titre du cours','style'=>'width: 100%; border-radius: 0px; font-size: 16px;'),'required'=>true));
		$builder->add('description','textarea',array('attr'=>array('class'=>'form-control tinymce-manager','placeholder'=>'Présentation  votre cours','style'=>'width: 100%'),'required'=>true));
		$builder->add('souscategorie','entity', array(
			'class'=>'ProduitProduitBundle:Souscategorie',
			'property'=>'nom',
			'attr'=>array('class'=>'form-control', 'style'=>'width: 100%; border-radius: 0px; font-size: 16px;'),
			'query_builder' => function(\Produit\ProduitBundle\Entity\SouscategorieRepository $d){
                      return $d->getSelectList();
					  }
					  ));
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_servicebundle_serviceedit';
    }
}
