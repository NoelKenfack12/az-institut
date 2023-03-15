<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*ce fichier est une proprietéde Zentsoft, 16 février 2015 (01h04min)--debut du Module utilisateurs
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Entity\Categorieappli;
use Produit\ServiceBundle\Entity\Application;
use Produit\ServiceBundle\Form\ApplicationType;
use Produit\ServiceBundle\Form\CategorieappliType;

class CategorieappliController extends Controller
{
public function modifcategorieAction($id)
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
	
	$categorie = $em->getRepository('ProduitServiceBundle:Categorieappli')
					->find($id);

	if($categorie != null)
	{
	$form = $this->createForm(new CategorieappliType, $categorie);
	if ($request->getMethod() == 'POST'){
		$form->bind($request);
		$categorie->setServiceaccent($service);
		if($form->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_gestion_applications'));
	}
	return $this->render('UsersAdminuserBundle:Categorieappli:modifcategorie.html.twig',
	array('form'=>$form->createView(),'categorie'=>$categorie));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
	
}
public function supprimercategorieAction(Categorieappli $categorieappli)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	$request = $this->get('request');
	
	if ($request->getMethod() == 'POST'){
	$formsupp->bind($request);
    if ($formsupp->isValid()){
		$liste_pays = $categorieappli->getApplications();
		if(count($liste_pays) > 0){
			$this->get('session')->getFlashBag()->add('information','Action réfusée: Cette catégorie contient déjà les applicationss.');
		}else{
			$em->remove($categorieappli);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Catégorie bien supprimée.');
		}
		return $this->redirect($this->generateUrl('users_adminuser_gestion_applications'));
	}
	}
    $this->get('session')->getFlashBag()->add('supprime_continent',$categorieappli->getId());
	$this->get('session')->getFlashBag()->add('supprime_continent',$categorieappli->getNom());
	return $this->redirect($this->generateUrl('users_adminuser_gestion_applications'));
}

public function gestionapplicationsAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
    $categorie = new Categorieappli($service);
	$form = $this->createForm(new CategorieappliType, $categorie);
	$request = $this->get('request');
	
	$appli = new Application($service);
	$formappli = $this->createForm(new ApplicationType, $appli);
	if($request->getMethod() == 'POST'){
		$form->bind($request);
		if ($form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($categorie);
			$em->flush();
		$this->get('session')->getFlashBag()->add('information','la catégorie a été bien enregistrée.');
		}
	}
	
	$liste_categorie = $em->getRepository('ProduitServiceBundle:Categorieappli')
	                 ->findAll();
					 
	$liste_application = $em->getRepository('ProduitServiceBundle:Application')
	                 ->findAll();
    $formsupp = $this->createFormBuilder()->getForm(); 					 
	return $this->render('UsersAdminuserBundle:Categorieappli:gestionapplications.html.twig', 
	array('form' => $form->createView(), 'form2'=>$formappli->createView(), 'liste_categorie'=>$liste_categorie,
	'liste_application'=>$liste_application,'formsupp'=>$formsupp->createView()));
}
}