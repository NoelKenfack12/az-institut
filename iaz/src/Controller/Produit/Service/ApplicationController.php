<?php
namespace App\Controller\Produit\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit\Service\Application;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Produit\Service\ApplicationType;
use App\Service\Servicetext\GeneralServicetext;

class ApplicationController extends AbstractController
{
public function ajouterappli(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$appli = new Application($service);
    $form2 = $this->createForm(ApplicationType::class, $appli);
	
	if ($request->getMethod() == 'POST'){
		$form2->handleRequest($request);
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


public function changeapplication(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	
	$application = $em->getRepository(Application::class)
					->find($id);
	if($application != null)
	{
	$form2 = $this->createForm(ApplicationType::class, $application);
	$application->setServicetext($service);
	if($request->getMethod() == 'POST'){
		$form2->handleRequest($request);

		if($form2->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_gestion_applications'));
	}
	return $this->render('Theme/Users/Adminuser/Categorieappli/changeapplication.html.twig',
	array('form2'=>$form2->createView(),'application'=>$application));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function delapplicationuser(Application $application, Request $request)
{
	$form = $this->createFormBuilder()->getForm();
	if ($request->getMethod() == 'POST'){
		$form->handleRequest($request);
		if($form->isValid()){
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
