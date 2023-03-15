<?php
/*
* (c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace App\Controller\Produit\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit\Service\Recrutement;
use App\Form\Produit\Service\RecrutementType;
use App\Form\Produit\Service\RecrutementeditType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;
use App\Entity\Produit\Service\Service;

class RecrutementController extends AbstractController
{
public function votredossier(GeneralServicetext $service, Request $request, $stage)
{
	$em = $this->getDoctrine()->getManager();
	$recrutement = new Recrutement($service);
	$form = $this->createForm(RecrutementType::class, $recrutement);
	$service_recrutement = $em->getRepository(Service::class)
	                          ->findBy(array('typearticle'=>'recrutement'));
    return $this->render('Theme/Produit/Service/Recrutement/votredossier.html.twig',
	array('form'=>$form->createView(),'service_recrutement'=>$service_recrutement,'stage'=>$stage));
}

public function ajoutdossieruser(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$recrutement = new Recrutement($service);
	$form = $this->createForm(RecrutementType::class, $recrutement);

	if($request->getMethod() == 'POST')
	{
		$form->handleRequest($request);
		$recrutement->getYourcv()->setServicetext($service);
		if($form->isValid() and $this->getUser() != null){
			$recrutement->setUser($this->getUser());
			$em->persist($recrutement);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Votre dossier a été soumis avec succès.');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée, Vérifiez la taille de votre message et de vos fichiers et retransmettez le formulaire.');
		}
	}
	return $this->redirect($this->generateUrl('produit_service_yourcv_recrutement'));
}

public function listedossier(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$recrutement = new Recrutement($service);
	$form = $this->createForm(RecrutementType::class, $recrutement);

	if($request->getMethod() == 'POST')
	{
		$form->handleRequest($request);
		$recrutement->getYourcv()->setServicetext($service);
		if($form->isValid() and $this->getUser() != null){
			if($_POST['typedocument'])
			{
				$recrutement->setTypedocument($_POST['typedocument']);
			}
			$recrutement->setUser($this->getUser());
			$em->persist($recrutement);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Votre dossier a été soumis avec succès.');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée, Vérifiez la taille de votre message et de vos fichiers et retransmettez le formulaire.');
		}
	}
	
	$formsupp = $this->createFormBuilder()->getForm(); 
	$liste_dossier = $em->getRepository(Recrutement::class)
	                          ->myfindAll();
	return $this->render('Theme/Users/Adminuser/Recrutement/listedossier.html.twig',
	array('liste_dossier'=>$liste_dossier,'formsupp'=>$formsupp->createView(),'form'=>$form->createView()));
}

public function updatedocument(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	
	$recrutement = $em->getRepository(Recrutement::class)
					  ->find($id);
	if($recrutement != null)
	{
    $form = $this->createForm(RecrutementeditType::class, $recrutement);

	if($request->getMethod() == 'POST'){
		$form->handleRequest($request);
		$recrutement->setServicetext($service);
		if($recrutement->getYourcv() != null)
		{
			$recrutement->getYourcv()->setServicetext($service);
		}
		
		if ($form->isValid()){
			if($_POST['typedocument'])
			{
				$recrutement->setTypedocument($_POST['typedocument']);
			}
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_liste_dossier_recrutement'));
	}
	return $this->render('Theme/Users/Adminuser/Recrutement/updatedocument.html.twig',
	array('form'=>$form->createView(),'recrutement'=>$recrutement));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function supprimerdossier(Recrutement $recrut, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 

	if ($request->getMethod() == 'POST') {
		$formsupp->handleRequest($request);
		if ($formsupp->isValid()){
			$em->remove($recrut);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
			return $this->redirect($this->generateUrl('users_adminuser_liste_dossier_recrutement'));
		}
	}
    $this->get('session')->getFlashBag()->add('supprime_dossier',$recrut->getId());
	$this->get('session')->getFlashBag()->add('supprime_dossier',$recrut->getMessage());
	return $this->redirect($this->generateUrl('users_adminuser_liste_dossier_recrutement'));
}

public function telechargercv(Recrutement $recrut)
{
	$em = $this->getDoctrine()->getManager();
	$recrut->getYourcv()->setNbtele($recrut->getYourcv()->getNbtele() + 1);
	$em->flush();
	$namefile = '/../../../Symfony/web/'.$recrut->getYourcv()->getWebPath();
	return $this->redirect($namefile);
}

public function telechargerlettre(Recrutement $recrut)
{
	$em = $this->getDoctrine()->getManager();
	$recrut->setNbtele($recrut->getNbtele() + 1);
	$em->flush();
	$namefile = '/../../../Symfony/web/'.$recrut->getWebPath();
	return $this->redirect($namefile);
}
}