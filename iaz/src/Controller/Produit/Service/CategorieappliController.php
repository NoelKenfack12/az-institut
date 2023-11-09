<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*ce fichier est une proprietéde Zentsoft, 16 février 2015 (01h04min)--debut du Module utilisateurs
*/
namespace App\Controller\Produit\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit\Service\Categorieappli;
use App\Entity\Produit\Service\Application;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Produit\Service\ApplicationType;
use App\Form\Produit\Service\CategorieappliType;
use App\Service\Servicetext\GeneralServicetext;

class CategorieappliController extends AbstractController
{
public function modifcategorie(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	
	$categorie = $em->getRepository(Categorieappli::class)
					->find($id);

	if($categorie != null)
	{
	$form = $this->createForm(CategorieappliType::class, $categorie);
	if ($request->getMethod() == 'POST'){
		$form->handleRequest($request);
		$categorie->setServiceaccent($service);
		if($form->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_gestion_applications'));
	}
	return $this->render('Theme/Users/Adminuser/Categorieappli/modifcategorie.html.twig',
	array('form'=>$form->createView(),'categorie'=>$categorie));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function supprimercategorie(Categorieappli $categorieappli, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 

	if ($request->getMethod() == 'POST'){
	$formsupp->handleRequest($request);
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

public function gestionapplications(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
    $categorie = new Categorieappli($service);
	$form = $this->createForm(CategorieappliType::class, $categorie);
	
	$appli = new Application($service);
	$formappli = $this->createForm(ApplicationType::class, $appli);
	if($request->getMethod() == 'POST'){
		$form->handleRequest($request);
		if ($form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($categorie);
			$em->flush();
		$this->get('session')->getFlashBag()->add('information','la catégorie a été bien enregistrée.');
		}
	}
	
	$liste_categorie = $em->getRepository(Categorieappli::class)
	                      ->findAll();
	$liste_application = $em->getRepository(Application::class)
	                        ->findAll();

    $formsupp = $this->createFormBuilder()->getForm(); 					 
	return $this->render('Theme/Users/Adminuser/Categorieappli/gestionapplications.html.twig', 
	array('form' => $form->createView(), 'form2'=>$formappli->createView(), 'liste_categorie'=>$liste_categorie,
	'liste_application'=>$liste_application,'formsupp'=>$formsupp->createView()));
}
}