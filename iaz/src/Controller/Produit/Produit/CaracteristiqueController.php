<?php
/*
	(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace App\Controller\Produit\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit\Produit\Caracteristiqueproduit;
use App\Entity\Produit\Produit\Caracteristique;
use App\Form\Produit\Produit\CaracteristiqueType;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Produit\Produit\Produit;

class CaracteristiqueController extends AbstractController
{
public function updatecaracteristiqueproduit(ValidatorInterface $validator, GeneralServicetext $service, Request $request, $idproduit, $idoffre)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['idproduit']) and isset($_GET['idoffre']))
	{
		$idproduit = $_GET['idproduit'];
		$idoffre = $_GET['idoffre'];
	}else{
		$idproduit = $idproduit;
		$idoffre = $idoffre;
	}
	
	$produit = $em->getRepository(Produit::class)
					->find($idproduit);
	$caracteristique = $em->getRepository(Caracteristique::class)
					->find($idoffre);
	if($produit != null and $caracteristique != null)
	{
	$caracteristiqueplan = $em->getRepository(Caracteristiqueproduit::class)
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
	if($request->getMethod() == 'POST'){
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
	return $this->render('Theme/Users/Adminuser/Caracteristique/updatecaracteristiqueproduit.html.twig',
	array('produit'=>$produit,'caracteristique'=>$caracteristique,'caracteristiqueplan'=>$caracteristiqueplan));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function modifiercaracteristique(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$caracteristique = $em->getRepository(Caracteristique::class)
				          ->find($id);
	if($caracteristique != null)
	{
    $form = $this->createForm(CaracteristiqueType::class, $caracteristique, array('cat'=>$caracteristique->getsouscategorie()->getCategorie()));

	if ($request->getMethod() == 'POST'){
		$form->handleRequest($request);
		if ($form->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie', array('id'=>$caracteristique->getSouscategorie()->getId())));
	}

	return $this->render('Theme/Users/Adminuser/Caracteristique/modifiercaracteristique.html.twig',
	array('caracteristique'=>$caracteristique,'form'=>$form->createView()));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function supprimercaracteristique(Caracteristique $caracteristique)
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