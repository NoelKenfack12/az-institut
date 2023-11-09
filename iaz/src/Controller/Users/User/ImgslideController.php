<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace App\Controller\Users\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users\User\Imgslide;
use App\Form\Users\User\ImgslideType;
use App\Form\Users\User\ImgslideeditType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ImgslideController extends AbstractController
{
private $params;

public function __construct(ParameterBagInterface $params)
{
	$this->params = $params;
}
public function addnewslide(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$slide = new Imgslide($service);
	$formslide = $this->createForm(ImgslideType::class, $slide);

	if($request->getMethod() == 'POST')
	{
		$formslide->handleRequest($request);
		$slide->setUser($this->getUser());
		$slide->setServicetext($service);
		$allslide = $em->getRepository(Imgslide::class)
	                      ->FindAll();
		$nbslide = $this->params->get('nbslide');

		if($slide->getBackgroundslide() != null)
		{
			$slide->getBackgroundslide()->setServicetext($service);
			$slide->getBackgroundslide()->setUser($this->getUser());
		}
		if($formslide->isValid() and count($allslide) <= $nbslide){
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

public function deleteslide(Imgslide $slide, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 

	if ($request->getMethod() == 'POST') {
		$formsupp->handleRequest($request);
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

public function listeslide()
{
	$em = $this->getDoctrine()->getManager();
	$allslide = $em->getRepository(Imgslide::class)
	                      ->FindAll();
	return $this->render('Theme/Users/Adminuser/Accueil/listeslide.html.twig', array('allslide'=>$allslide));
}

public function alterslide(Request $request, GeneralServicetext $service, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$slide = $em->getRepository(Imgslide::class)
					->find($id);
	if($slide != null)
	{
		$form = $this->createForm(ImgslideeditType::class, $slide);

		if ($request->getMethod() == 'POST'){
			$form->handleRequest($request);
			$slide->setServicetext($service);
			
			if($slide->getBackgroundslide() != null)
			{
				$slide->getBackgroundslide()->setServicetext($service);

				if($this->getUser() != null)
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
		return $this->render('Theme/Users/Adminuser/Accueil/alterslide.html.twig',
		array('form'=>$form->createView(),'slide'=>$slide));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

}