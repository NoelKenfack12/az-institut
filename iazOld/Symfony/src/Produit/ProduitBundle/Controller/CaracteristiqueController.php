<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace Produit\ProduitBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ProduitBundle\Entity\Caracteristiqueproduit;
use Produit\ProduitBundle\Entity\Caracteristique;
use Produit\ProduitBundle\Form\CaracteristiqueType;

class CaracteristiqueController extends Controller
{
public function updatecaracteristiqueproduitAction($idproduit, $idoffre)
{
	$em = $this->getDoctrine()->getManager();
	$validator = $this->get('validator');
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['idproduit']) and isset($_GET['idoffre']))
	{
		$idproduit = $_GET['idproduit'];
		$idoffre = $_GET['idoffre'];
	}else{
		$idproduit = $idproduit;
		$idoffre = $idoffre;
	}
	
	$produit = $em->getRepository('ProduitProduitBundle:Produit')
					->find($idproduit);
	$caracteristique = $em->getRepository('ProduitProduitBundle:Caracteristique')
					->find($idoffre);
	if($produit != null and $caracteristique != null)
	{
	$caracteristiqueplan = $em->getRepository('ProduitProduitBundle:Caracteristiqueproduit')
					          ->findOneBy(array('produit'=>$idproduit,'caracteristique'=>$idoffre));

	if($caracteristiqueplan == null)
	{
		$caracteristiqueplan = new Caracteristiqueproduit();
	}
	
	$caracteristiqueplan->setCaracteristique($caracteristique);
	$caracteristiqueplan->setProduit($produit);
	$caracteristiqueplan->setUser($this->getUser());
	
	if(isset($_POST['valeur']))
	{
		$caracteristiqueplan->setValeur($_POST['valeur']);
	}
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){

		$liste_erreurs = $validator->validate($caracteristiqueplan);
		if(count($liste_erreurs) <= 0){
			$em->persist($caracteristiqueplan);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie', array('id'=>$produit->getSouscategorie()->getId())));
	}
	return $this->render('UsersAdminuserBundle:Caracteristique:updatecaracteristiqueproduit.html.twig',
	array('produit'=>$produit,'caracteristique'=>$caracteristique,'caracteristiqueplan'=>$caracteristiqueplan));
	
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function modifiercaracteristiqueAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$caracteristique = $em->getRepository('ProduitProduitBundle:Caracteristique')
				          ->find($id);
	if($caracteristique != null)
	{
    $form = $this->createForm(new CaracteristiqueType($caracteristique->getsouscategorie()->getCategorie()), $caracteristique);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		$form->bind($request);
		if ($form->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie', array('id'=>$caracteristique->getSouscategorie()->getId())));
	}

	return $this->render('UsersAdminuserBundle:Caracteristique:modifiercaracteristique.html.twig',
	array('caracteristique'=>$caracteristique,'form'=>$form->createView()));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function supprimercaracteristiqueAction(Caracteristique $caracteristique)
{
	$em = $this->getDoctrine()->getManager();
	$scat = $caracteristique->getSouscategorie();
	foreach($caracteristique->getCaracteristiqueproduits() as $carprod)
	{
		$em->remove($carprod);
	}
	$em->remove($caracteristique);
	$em->flush();
	$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie', array('id'=>$scat->getId())));
}
}