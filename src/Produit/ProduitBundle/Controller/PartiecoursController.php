<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace Produit\ProduitBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Users\UserBundle\Entity\User;
use Produit\ProduitBundle\Entity\Partiecours;
use Produit\ProduitBundle\Entity\Produit;
use Produit\ProduitBundle\Form\PartiecoursType;

class PartiecoursController extends Controller
{
public function addpartiecoursAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');

	$partie = new Partiecours();
	$form = $this->createForm(new PartiecoursType(), $partie); 
	
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
    $form->bind($request);
	if($form->isValid()){
		$partie->setProduit($produit);
		$produit->setDate(new \Datetime());
		$produit->setTimestamp(time());
		$em->persist($partie);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','Votre cours a été mise à jour avec succès.');

	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!! Vérifier la taille du titre [3,70]');
	}
	}
	return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId())));
}

public function detailpartieAction(Partiecours $partie, $number, $addform, $codeadmin = 0)
{
	$formedit = $this->createForm(new PartiecoursType(), $partie); 
	
	return $this->render('ProduitProduitBundle:Partiecours:detailpartie.html.twig', 
	array('partie'=>$partie,'produit'=>$partie->getProduit(),'number'=>$number,'codeadmin'=>$codeadmin,'formedit'=>$formedit->createView(),'addform'=>$addform));
}

public function modificationpartiecoursAction(Partiecours $partie)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');

	$formedit = $this->createForm(new PartiecoursType(), $partie); 
	$produit = $partie->getProduit();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
    $formedit->bind($request);
	if($formedit->isValid()){
		$produit->setDate(new \Datetime());
		$produit->setTimestamp(time());
		$em->persist($partie);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','Votre cours a été mise à jour avec succès.');

	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!! Vérifier la taille du titre [3,70]');
	}
	}
	return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId())));
}

public function supprimerpartiecoursAction(Partiecours $partie)
{
	$em = $this->getDoctrine()->getManager();
	$produit = $partie->getProduit();
	$liste_chapitre = $em->getRepository('ProduitProduitBundle:Chapitrecours')
								->findBy(array('partiecours'=>$partie), array('rang'=>'asc'));
	if($produit->getUser() == $this->getUser())
	{
		if(count($liste_chapitre) == 0)
		{
			$em->remove($partie);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Votre cours a été mise à jour avec succès.');
		}else{
			$this->get('session')->getFlashBag()->add('information','Echec ! Supprimer d\'abord les chapitres liés à cette partie.');
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec !! Vous n\'avez pas le droit d\'effectuer cette action.');
	}
	return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId())));
}
}