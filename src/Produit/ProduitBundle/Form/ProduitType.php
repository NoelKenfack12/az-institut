<?php

namespace Produit\ProduitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Produit\ProduitBundle\Entity\Categorie;

class ProduitType extends AbstractType
{
private $idcat;
public function __construct($cat = null)
{
	if($cat != null)
	{
		$this->idcat = $cat->getId();
	}else{
		$this->idcat = 0;
	}
}
public function getIdCat()
{
return $this->idcat;
}
public function setIdCat($id)
{
$this->idcat = $id;
}
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$id = $this->getIdCat();
        $builder
		    ->add('titre','text',array('attr'=>array('class'=>'form-control','placeholder'=>'Titre du cours','style'=>'width: 100%; border-radius: 0px; font-size: 16px;')))
		    ->add('description','textarea',array('attr'=>array('class'=>'form-control tinymce-manager','placeholder'=>'Présentation  votre cours','style'=>'width: 100%'),'required'=>false))
		    ->add('objectif','textarea',array('attr'=>array('class'=>'form-control tinymce-manager','placeholder'=>'Quels sont les objectifs de votre cours  ?','style'=>'width: 100%'),'required'=>false))
		    ->add('prerequis','textarea',array('attr'=>array('class'=>'form-control tinymce-manager','placeholder'=>'Quel sont les prérequis de votre cours ?','style'=>'width: 100%'),'required'=>false))
			->add('imgproduit',new ImgproduitType())
			->add('videoproduit',new VideoproduitType())
			->add('souscategorie','entity', array(
			'class'=>'ProduitProduitBundle:Souscategorie',
			'property'=>'nom',
			'attr'=>array('class'=>'form-control', 'style'=>'width: 100%; border-radius: 0px; font-size: 16px;'),
			'query_builder' => function(\Produit\ProduitBundle\Entity\SouscategorieRepository $d){
                      return $d->getSelectList();
					  }
					  ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ProduitBundle\Entity\Produit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_produitbundle_produit';
    }
}
