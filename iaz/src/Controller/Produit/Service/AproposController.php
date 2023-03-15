<?php
/*
	(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace App\Controller\Produit\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit\Service\Apropos;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Produit\Service\AproposType;
use App\Service\Servicetext\GeneralServicetext;
use App\Entity\Produit\Service\Infoentreprise;

class AproposController extends AbstractController
{
public function direapropos(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$apropos = new Apropos($service);
	$form = $this->createForm(AproposType::class, $apropos);
	$formsupp = $this->createFormBuilder()->getForm();
	
	if($request->getMethod() == 'POST')
	{
		$form->handleRequest($request);
		$apropos->setUser($this->getUser());
		if($form->isValid()){
			if (isset($_POST['nature']) and $_POST['nature'] == 'entreprise'){
			$apropos->setEntreprise(true);
			}
			if (isset($_POST['nature']) and $_POST['nature'] == 'particulier'){
			$apropos->setParticulier(true);
			}
			if (isset($_POST['nature']) and $_POST['nature'] == 'team'){
			$apropos->setTeam(true);
			}
			if (isset($_POST['nature']) and $_POST['nature'] == 'slider'){
			$apropos->setSlider(true);
			}
			$em->persist($apropos);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Publication enregistrée avec succès.');
		}
	}
	$alldire = $em->getRepository(Apropos::class)
	                      ->FindAll();
    return $this->render('Theme/Users/Adminuser/Apropos/direapropos.html.twig',
	array('form'=>$form->createView(),'alldire'=>$alldire,'formsupp'=>$formsupp->createView()));
}

public function deleteapropos(Apropos $apropos, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	if ($request->getMethod() == 'POST') {
		$formsupp->handleRequest($request);
		if($formsupp->isValid()){
			$em->remove($apropos);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
			return $this->redirect($this->generateUrl('users_adminuser_apropos_de_nous'));
		}
	}
    $this->get('session')->getFlashBag()->add('supprime_apropos',$apropos->getId());
	$this->get('session')->getFlashBag()->add('supprime_apropos',$apropos->getNom());
	return $this->redirect($this->generateUrl('users_adminuser_apropos_de_nous'));
}

public function modifreview(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$review = $em->getRepository(Apropos::class)
					->find($id);
	if($review != null)
	{
    $form = $this->createForm(AproposType::class, $review);

	if($request->getMethod() == 'POST'){
		$form->handleRequest($request);
		$review->setServicetext($service);
		if ($form->isValid()){
			if(isset($_POST['nature'])){
				$review->setNature($_POST['nature']);
			}
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_apropos_de_nous'));
	}
	return $this->render('Theme/Users/Adminuser/Apropos/modifreview.html.twig',
	array('form'=>$form->createView(),'review'=>$review));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function aproposdenous(GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	$repository = $em->getRepository(Apropos::class);
	$liste_slide = $repository->FindBy(array('slider'=>true));
	$liste_team = $repository->FindBy(array('team'=>true));
	$allinfo = $em->getRepository(Infoentreprise::class)
				  ->myFindAll();
	$team_select = $service->selectEntities($liste_team, 4);
	return $this->render('Theme/Produit/Service/Apropos/aproposdenous.html.twig',
	array('liste_slide'=>$liste_slide,'team_select'=>$team_select,'allinfo'=>$allinfo));
}
}