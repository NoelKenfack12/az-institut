<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*ce fichier est une proprietéde Zentsoft, 16 février 2015 (01h04min)--debut du Module utilisateurs
*/
namespace App\Controller\Produit\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit\Produit\Cataloguechantier;
use App\Form\Produit\Produit\CataloguechantierType;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\HttpFoundation\Request;

class CataloguechantierController extends AbstractController
{
public function modifcatalogue(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	
	$categorie = $em->getRepository(Cataloguechantier::class)
					->find($id);

	if($categorie != null)
	{
		$form = $this->createForm(CataloguechantierType::class, $categorie);
		if ($request->getMethod() == 'POST'){
			$form->handleRequest($request);
			$categorie->setServicetext($service);
			if($form->isValid()){
				$em->flush();
				$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
			}else{
				$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
			}
			return $this->redirect($this->generateUrl('users_adminuser_catalogue_chantier_pro'));
		}
		return $this->render('Theme/Users/Adminuser/Cataloguechantier/modifcatalogue.html.twig',
		array('form'=>$form->createView(),'categorie'=>$categorie));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function supprimercatalogue(Cataloguechantier $catalogue, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	if ($request->getMethod() == 'POST'){
	$formsupp->handleRequest($request);
    if ($formsupp->isValid()){
		
		$em->remove($catalogue);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Catégorie bien supprimée.');
			
		return $this->redirect($this->generateUrl('users_adminuser_catalogue_chantier_pro'));
	}
	}
    $this->get('session')->getFlashBag()->add('supprime_continent',$catalogue->getId());
	$this->get('session')->getFlashBag()->add('supprime_continent',$catalogue->getNom());
	return $this->redirect($this->generateUrl('users_adminuser_catalogue_chantier_pro'));
}

public function cataloguechantier(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
    $categorie = new Cataloguechantier($service);
	$form = $this->createForm(CataloguechantierType::class, $categorie);

	if($request->getMethod() == 'POST'){
		$form->handleRequest($request);
		if ($form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$categorie->setUser($this->getUser());
			$em->persist($categorie);
			$em->flush();
		$this->get('session')->getFlashBag()->add('information','la catégorie a été bien enregistrée.');
		}
	}
	
	$liste_categorie = $em->getRepository(Cataloguechantier::class)
	                 ->findAll();

    $formsupp = $this->createFormBuilder()->getForm(); 					 
	return $this->render('Theme/Users/Adminuser/Cataloguechantier/cataloguechantier.html.twig', 
	array('form' => $form->createView(),'liste_categorie'=>$liste_categorie,'formsupp'=>$formsupp->createView()));
}
}