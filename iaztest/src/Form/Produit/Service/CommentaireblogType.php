<?php
namespace App\Form\Produit\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use App\Entity\Produit\Service\Commentaireblog;

class CommentaireblogType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array('attr'=>array('placeholder'=>'Votre non','style'=>'width: 100%;','class'=>'form-control')))
            ->add('email',EmailType::class,array('attr'=>array('placeholder'=>'Votre email','style'=>'width: 100%;','class'=>'form-control')))
            ->add('url',UrlType::class,array('attr'=>array('placeholder'=>'Site web','style'=>'width: 100%;','class'=>'form-control'),'required'=>false))
            ->add('contenu',TextareaType::class,array('attr'=>array('placeholder'=>'Description du service','style'=>'width: 100%; height: 120px;','class'=>'form-control','row'=>'8')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Commentaireblog::class
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
