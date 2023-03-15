<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*ce fichier est une proprietéde Zentsoft, 16 février 2015 (01h04min)--debut du Module utilisateurs
*/
namespace Produit\ProduitBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ProduitBundle\Entity\Cataloguechantier;
use Produit\ProduitBundle\Form\CataloguechantierType;

class CataloguechantierController extends Controller
{
public function modifcatalogueAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$request = $this->get('request');
	
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	
	$categorie = $em->getRepository('ProduitProduitBundle:Cataloguechantier')
					->find($id);

	if($categorie != null)
	{
		$form = $this->createForm(new CataloguechantierType, $categorie);
		if ($request->getMethod() == 'POST'){
			$form->bind($request);
			$categorie->setServicetext($service);
			if($form->isValid()){
				$em->flush();
				$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
			}else{
				$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
			}
			return $this->redirect($this->generateUrl('users_adminuser_catalogue_chantier_pro'));
		}
		return $this->render('UsersAdminuserBundle:Cataloguechantier:modifcatalogue.html.twig',
		array('form'=>$form->createView(),'categorie'=>$categorie));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function supprimercatalogueAction(Cataloguechantier $catalogue)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	$request = $this->get('request');
	
	if ($request->getMethod() == 'POST'){
	$formsupp->bind($request);
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

public function cataloguechantierAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
    $categorie = new Cataloguechantier($service);
	$form = $this->createForm(new CataloguechantierType, $categorie);
	$request = $this->get('request');
	
	if($request->getMethod() == 'POST'){
		$form->bind($request);
		if ($form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$categorie->setUser($this->getUser());
			$em->persist($categorie);
			$em->flush();
		$this->get('session')->getFlashBag()->add('information','la catégorie a été bien enregistrée.');
		}
	}
	
	$liste_categorie = $em->getRepository('ProduitProduitBundle:Cataloguechantier')
	                 ->findAll();

    $formsupp = $this->createFormBuilder()->getForm(); 					 
	return $this->render('UsersAdminuserBundle:Cataloguechantier:cataloguechantier.html.twig', 
	array('form' => $form->createView(),'liste_categorie'=>$liste_categorie,'formsupp'=>$formsupp->createView()));
}
}