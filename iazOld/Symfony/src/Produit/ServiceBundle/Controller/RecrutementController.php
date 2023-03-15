<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Entity\Recrutement;
use Produit\ServiceBundle\Form\RecrutementType;
use Produit\ServiceBundle\Form\RecrutementeditType;

class RecrutementController extends Controller
{
public function votredossierAction($stage)
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	
	$recrutement = new Recrutement($service);
	$form = $this->createForm(new RecrutementType, $recrutement);
	$request = $this->getRequest();
	$service_recrutement = $em->getRepository('ProduitServiceBundle:Service')
	                          ->findBy(array('typearticle'=>'recrutement'));
    return $this->render('ProduitServiceBundle:Recrutement:votredossier.html.twig',array('form'=>$form->createView(),
	'service_recrutement'=>$service_recrutement,'stage'=>$stage));
}

public function ajoutdossieruserAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$recrutement = new Recrutement($service);
	$form = $this->createForm(new RecrutementType, $recrutement);
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
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
public function listedossierAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$recrutement = new Recrutement($service);
	$form = $this->createForm(new RecrutementType, $recrutement);
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
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
	$liste_dossier = $em->getRepository('ProduitServiceBundle:Recrutement')
	                          ->myfindAll();
	return $this->render('UsersAdminuserBundle:Recrutement:listedossier.html.twig',
	array('liste_dossier'=>$liste_dossier,'formsupp'=>$formsupp->createView(),'form'=>$form->createView()));
}

public function updatedocumentAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	
	$recrutement = $em->getRepository('ProduitServiceBundle:Recrutement')
					->find($id);
	if($recrutement != null)
	{
    $form = $this->createForm(new RecrutementeditType, $recrutement);
	$request = $this->get('request');
	if($request->getMethod() == 'POST'){
		$form->bind($request);
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
	return $this->render('UsersAdminuserBundle:Recrutement:updatedocument.html.twig',
	array('form'=>$form->createView(),'recrutement'=>$recrutement));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function supprimerdossierAction(Recrutement $recrut)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
    $request = $this->get('request');
	if ($request->getMethod() == 'POST') {
    $formsupp->bind($request);
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

public function telechargercvAction(Recrutement $recrut)
{
	$em = $this->getDoctrine()->getManager();
	$recrut->getYourcv()->setNbtele($recrut->getYourcv()->getNbtele() + 1);
	$em->flush();
	$namefile = '/../../../Symfony/web/'.$recrut->getYourcv()->getWebPath();
	return $this->redirect($namefile);
}

public function telechargerlettreAction(Recrutement $recrut)
{
	$em = $this->getDoctrine()->getManager();
	$recrut->setNbtele($recrut->getNbtele() + 1);
	$em->flush();
	$namefile = '/../../../Symfony/web/'.$recrut->getWebPath();
	return $this->redirect($namefile);
}
}