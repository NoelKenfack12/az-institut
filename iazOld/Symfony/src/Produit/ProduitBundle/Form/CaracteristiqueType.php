<?php

namespace Produit\ProduitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CaracteristiqueType extends AbstractType
{
	private $idcat;
	public function __construct($cat)
	{
		$this->idcat = $cat->getId();
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
            ->add('nom','text',array('attr'=>array('style'=>'width: 100%;')))
			->add('rang','integer',array('attr'=>array('placeholder'=>'Rang')))
            ->add('description','textarea',array('attr'=>array('style'=>'border: none; border-bottom: 1px solid #ddd')))
            ->add('icon','text',array('attr'=>array('style'=>'width: 100%;')))
            ->add('souscategorie','entity', array(
			'class'=>'ProduitProduitBundle:Souscategorie',
			'property'=>'nom',
			'attr'=>array('style'=>'width: 100%'),
			'query_builder' => function(\Produit\ProduitBundle\Entity\SouscategorieRepository $d) use($id){
                      return $d->getSelectList($id);
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
            'data_class' => 'Produit\ProduitBundle\Entity\Caracteristique'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_produitbundle_caracteristique';
    }
}
