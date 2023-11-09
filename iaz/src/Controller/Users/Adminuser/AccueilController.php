<?php
/*
* (c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace App\Controller\Users\Adminuser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit\Produit\Categorie;
use App\Form\Produit\Produit\CategorieType;
use App\Entity\Produit\Produit\Souscategorie;
use App\Form\Produit\Produit\SouscategorieType;
use App\Entity\Users\User\Imgslide;
use App\Form\Users\User\ImgslideType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;
use App\Entity\Produit\Produit\Panier;
use App\Entity\Produit\Service\Recrutement;

class AccueilController extends AbstractController
{
public function accueiladmin(GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	$allslide = $em->getRepository(Imgslide::class)
	                      ->FindAll();
	$nbcategorie = $em->getRepository(Categorie::class)
	                      ->FindAll();
	$liste_scategorie = $em->getRepository(Souscategorie::class)
	                      ->findAll();
						  
	$categorie = new Categorie($service);
	$form = $this->createForm(CategorieType::class, $categorie);
	
	$souscategorie = new Souscategorie($service);
	$formcat = $this->createForm(SouscategorieType::class, $souscategorie);
	
	$slide = new Imgslide($service);
	$formslide = $this->createForm(ImgslideType::class, $slide);
	$formsupp = $this->createFormBuilder()->getForm();
	
    return $this->render('Theme/Users/Adminuser/Accueil/accueiladmin.html.twig',
	array('form'=>$form->createView(),'nbcategorie'=>$nbcategorie,'formcat'=>$formcat->createView(),'formslide'=>$formslide->createView(),
	'formsupp'=>$formsupp->createView(),'allslide'=>$allslide,'liste_scategorie'=>$liste_scategorie));
}

public function menuadmin()
{
	$em = $this->getDoctrine()->getManager();
	$liste_commande = $em->getRepository(Panier::class)
				         ->findBy(array('payer'=>1,'livrer'=>0));
	$liste_vente = $em->getRepository(Panier::class)
				      ->findBy(array('payer'=>1,'livrer'=>1));
	$nbrecrutement = $em->getRepository(Panier::class)
	                    ->findAll();
	return $this->render('Theme/Users/Adminuser/Accueil/menuadmin.html.twig',
	array('nbcommande'=>count($liste_commande),'nbvente'=>count($liste_vente),'nbrecrutement'=>count($nbrecrutement)));
}	
}