<?php
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Entity\Application;
use Symfony\Component\HttpFoundation\Request;
use Produit\ServiceBundle\Form\ApplicationType;

class ApplicationController extends Controller
{
public function ajouterappliAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$appli = new Application($service);
    $form2 = $this->createForm(new ApplicationType, $appli);
	
	$request = $this->get('request');
	if ($request->getMethod() == 'POST') {
	$form2->bind($request);
    if ($form2->isValid()){
		$em->persist($appli);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','le pays a été bien enregistrée.');
	}else{
		$appli->getCategorieappli()->removeApplication($appli);
		$this->get('session')->getFlashBag()->add('information','Echec, Une erreur a été rencontrée');
	}
	}
	return $this->redirect($this->generateUrl('users_adminuser_gestion_applications'));
}


public function changeapplicationAction($id)
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
	
	$application = $em->getRepository('ProduitServiceBundle:Application')
					->find($id);
	if($application != null)
	{
	$form2 = $this->createForm(new ApplicationType, $application);
	$application->setServicetext($service);
	if($request->getMethod() == 'POST'){
		$form2->bind($request);

		if($form2->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_gestion_applications'));
	}
	return $this->render('UsersAdminuserBundle:Categorieappli:changeapplication.html.twig',
	array('form2'=>$form2->createView(),'application'=>$application));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function delapplicationuserAction(Application $application)
{
	$form = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST') {
	$form->bind($request);
    if ($form->isValid()){
		$em = $this->getDoctrine()->getManager();
		$em->remove($application);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès.');
	return $this->redirect($this->generateUrl('users_adminuser_gestion_applications'));
	}
	}
	$this->get('session')->getFlashBag()->add('pays_supp',''.$application->getId().'');
	$this->get('session')->getFlashBag()->add('pays_supp',''.$application->getNom().'');
	return $this->redirect($this->generateUrl('users_adminuser_gestion_applications'));
}
}
