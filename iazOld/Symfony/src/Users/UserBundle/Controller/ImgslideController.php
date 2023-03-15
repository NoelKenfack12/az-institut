<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace Users\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Users\UserBundle\Entity\Imgslide;
use Users\UserBundle\Form\ImgslideType;
use Users\UserBundle\Form\ImgslideeditType;

class ImgslideController extends Controller
{
public function addnewslideAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$slide = new Imgslide($service);
	$formslide = $this->createForm(new ImgslideType, $slide);
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$formslide->bind($request);
		$slide->setUser($this->getUser());
		$slide->setServicetext($service);
		$allslide = $em->getRepository('UsersUserBundle:Imgslide')
	                      ->FindAll();
		$nbslide = $this->container->getParameter('nbslide');
		if($slide->getBackgroundslide() != null)
		{
			$slide->getBackgroundslide()->setServicetext($service);
			$slide->getBackgroundslide()->setUser($this->getUser());
		}
		if ($formslide->isValid() and count($allslide) <= $nbslide){
			if (isset($_POST['nature']) and $_POST['nature'] == 'service'){
			$slide->setProduit(false);
			}
			if (isset($_POST['nature']) and $_POST['nature'] == 'produit'){
			$quartier->setProduit(true);
			}
			$em->persist($slide);
			$em->flush();
		}else{
			if(count($allslide) > $nbslide)
			{
				$this->get('session')->getFlashBag()->add('imgslide','Trop de slide.');
			}else{
				$this->get('session')->getFlashBag()->add('imgslide','Données invalides.');
			}
		}
	}
	return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
}
public function deleteslideAction(Imgslide $slide)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
    $request = $this->get('request');
	if ($request->getMethod() == 'POST') {
    $formsupp->bind($request);
    if ($formsupp->isValid()){
	$em->remove($slide);
    $em->flush();
	$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
	}
	}
    $this->get('session')->getFlashBag()->add('supprime_slide',$slide->getId());
	$this->get('session')->getFlashBag()->add('supprime_slide',$slide->getTitre());
	return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
}
public function listeslideAction()
{
	$em = $this->getDoctrine()->getManager();
	$allslide = $em->getRepository('UsersUserBundle:Imgslide')
	                      ->FindAll();
	return $this->render('UsersAdminuserBundle:Accueil:listeslide.html.twig', array('allslide'=>$allslide));
}

public function alterslideAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$slide = $em->getRepository('UsersUserBundle:Imgslide')
					->find($id);
	if($slide != null)
	{
		$form = $this->createForm(new ImgslideeditType, $slide);
		$request = $this->get('request');
		if ($request->getMethod() == 'POST'){
			$form->bind($request);
			$slide->setServicetext($service);
			
			if($slide->getBackgroundslide() != null)
			{
				$slide->getBackgroundslide()->setServicetext($service);
				$slide->getBackgroundslide()->setUser($this->getUser());
			}
		
			if ($form->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
			}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
			}
			return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
		}
		return $this->render('UsersAdminuserBundle:Accueil:alterslide.html.twig',
		array('form'=>$form->createView(),'slide'=>$slide));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

}