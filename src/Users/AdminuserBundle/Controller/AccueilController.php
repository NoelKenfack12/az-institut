<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace Users\AdminuserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ProduitBundle\Entity\Categorie;
use Produit\ProduitBundle\Form\CategorieType;
use Produit\ProduitBundle\Entity\Souscategorie;
use Produit\ProduitBundle\Form\SouscategorieType;
use Users\UserBundle\Entity\Imgslide;
use Users\UserBundle\Form\ImgslideType;

class AccueilController extends Controller
{
public function accueiladminAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$nbcategorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                      ->FindAll();
	$categorie = new Categorie($service);
	$form = $this->createForm(new CategorieType, $categorie);
	
	$souscategorie = new Souscategorie($service);
	$formcat = $this->createForm(new SouscategorieType, $souscategorie);
	
	$slide = new Imgslide($service);
	$formslide = $this->createForm(new ImgslideType, $slide);
	
	$formsupp = $this->createFormBuilder()->getForm();
	
    return $this->render('UsersAdminuserBundle:Accueil:accueiladmin.html.twig',
	array('form'=>$form->createView(),'nbcategorie'=>$nbcategorie,'formcat'=>$formcat->createView(),'formslide'=>$formslide->createView(),
	'formsupp'=>$formsupp->createView()));
}

public function categorieproduitAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$categorie = new Categorie($service);
	$form = $this->createForm(new CategorieType, $categorie);
	$souscategorie = new Souscategorie($service);
	$formcat = $this->createForm(new SouscategorieType, $souscategorie);
	$formsupp = $this->createFormBuilder()->getForm();
	
	$liste_categorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                      ->findAll();
						  
    return $this->render('UsersAdminuserBundle:Accueil:categorieproduit.html.twig',
	array('form'=>$form->createView(),'formcat'=>$formcat->createView(),
	'formsupp'=>$formsupp->createView(),'liste_categorie'=>$liste_categorie));
}

public function menuadminAction()
{
	$em = $this->getDoctrine()->getManager();
	$liste_commande = $em->getRepository('ProduitProduitBundle:Panier')
				         ->findOneBy(array('payer'=>1,'livrer'=>0));
	$liste_vente = $em->getRepository('ProduitProduitBundle:Panier')
				      ->findOneBy(array('payer'=>1,'livrer'=>1));
	$nbrecrutement = $em->getRepository('ProduitServiceBundle:Recrutement')
	                    ->findAll();
	return $this->render('UsersAdminuserBundle:Accueil:menuadmin.html.twig',array('nbcommande'=>count($liste_commande),'nbvente'=>count($liste_vente),'nbrecrutement'=>count($nbrecrutement)));
}	
}