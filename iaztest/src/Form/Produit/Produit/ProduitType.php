<?php

namespace App\Form\Produit\Produit;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Produit\ProduitBundle\Entity\Categorie;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Produit\Produit\Souscategorie;
use Doctrine\ORM\EntityRepository;
use App\Entity\Produit\Produit\Cataloguechantier;
use App\Entity\Produit\Produit\Produit;

class ProduitType extends AbstractType
{
    private $idcat;
    public function __construct($cat = null)
    {
        if($cat != null)
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
		$cat = $options['cat'];
        if($cat != null)
		$id = $cat->getId();

        $builder
            ->add('nom',TextType::class,array('attr'=>array('style'=>'width: 100%')))
            ->add('rapport',TextType::class,array('attr'=>array('style'=>'width: 100%')))
            ->add('contenu',TextareaType::class,array('attr'=>array('class'=>'materialize-textarea','style'=>'width: 100%; border: none; border-bottom: 1px solid #ddd'),'required'=>false))
            ->add('newprise',TextType::class,array('attr'=>array('style'=>'width: 100%')))
            ->add('choixauteur',CheckboxType::class, array('required'=>false))
            ->add('prixlivraison',TextType::class,array('attr'=>array('style'=>'width: 100%')))
			->add('rang',IntegerType::class,array('attr'=>array('placeholder'=>'Rang')))
			->add('imgproduit', ImgproduitType::class,array('required'=>false))
            ->add('souscategorie',EntityType::class, array(
			'class'=> Souscategorie::class,
			'choice_label'=>'nom',
			'attr'=>array('style'=>'width: 100%'),
			'query_builder' => function(EntityRepository $d) use($id){
                      return $d->getSelectList($id);
					}
				))
            ->add('cataloguechantier','entity', array(
			'class'=> Cataloguechantier::class,
			'choice_label'=>'nom',
			'attr'=>array('style'=>'width: 100%'),
			'query_builder' => function(EntityRepository $d) use($id){
                      return $d->getSelectList();
					}
				))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Produit::class,
            'cat' => null
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
