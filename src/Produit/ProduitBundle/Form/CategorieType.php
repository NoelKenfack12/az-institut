<?php

namespace Produit\ProduitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategorieType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('attr'=>array('placeholder'=>'Nom du module de formation')))
            ->add('rang','integer',array('attr'=>array('placeholder'=>'Rang')))
			->add('file','file',array('attr'=>array('style'=>'opacity: 0.5;'),'required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Produit\ProduitBundle\Entity\Categorie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'produit_produitbundle_categorie';
    }
}
