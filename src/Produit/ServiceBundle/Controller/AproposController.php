<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Entity\Apropos;
use Produit\ServiceBundle\Form\AproposType;

class AproposController extends Controller
{
public function direaproposAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$apropos = new Apropos($service);
	$form = $this->createForm(new AproposType, $apropos);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
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
	$alldire = $em->getRepository('ProduitServiceBundle:Apropos')
	                      ->FindAll();
    return $this->render('UsersAdminuserBundle:Apropos:direapropos.html.twig',
	array('form'=>$form->createView(),'alldire'=>$alldire,'formsupp'=>$formsupp->createView()));
}

public function modifieraproposAction(Apropos $propos)
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$form = $this->createForm(new AproposType, $propos);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->getRequest();
	$propos->setServicetext($service);
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$propos->setUser($this->getUser());
		if($form->isValid()){
			if (isset($_POST['nature']) and $_POST['nature'] == 'entreprise'){
			$propos->setEntreprise(true);
			}
			if (isset($_POST['nature']) and $_POST['nature'] == 'particulier'){
			$propos->setParticulier(true);
			}
			if (isset($_POST['nature']) and $_POST['nature'] == 'team'){
			$propos->setTeam(true);
			}
			if (isset($_POST['nature']) and $_POST['nature'] == 'slider'){
			$propos->setSlider(true);
			}
			$em->persist($propos);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification enregistrée avec succès.');
		}
	}
	$alldire = $em->getRepository('ProduitServiceBundle:Apropos')
	                      ->FindAll();
    return $this->render('UsersAdminuserBundle:Apropos:modifierapropos.html.twig',
	array('form'=>$form->createView(),'apropos'=>$propos,'alldire'=>$alldire,'formsupp'=>$formsupp->createView()));
}

public function deleteaproposAction(Apropos $apropos)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
    $request = $this->get('request');
	if ($request->getMethod() == 'POST') {
    $formsupp->bind($request);
    if ($formsupp->isValid()){
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
public function aproposdenousAction()
{
	$em = $this->getDoctrine()->getManager();
	$repository = $em->getRepository('ProduitServiceBundle:Apropos');
	$liste_slide = $repository->FindBy(array('slider'=>true));
	
	$liste_team = $repository->FindBy(array('team'=>true));
	$liste_diapo = $em->getRepository('ProduitServiceBundle:Infoentreprise')
				  ->findBy(array('principal'=>1,'valeur'=>0), array('rang'=>'desc'));
				  
	$allinfo = $em->getRepository('ProduitServiceBundle:Infoentreprise')
				  ->findBy(array('principal'=>0,'valeur'=>0), array('rang'=>'desc'));
				  
	$service = $this->container->get('general_service.servicetext');
	$team_select = $service->selectEntities($liste_team, 4);
	$liste_categorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                    ->findAll();
	return $this->render('ProduitServiceBundle:Apropos:aproposdenous.html.twig',
	array('liste_slide'=>$liste_slide,'team_select'=>$team_select,'liste_categorie'=>$liste_categorie,'allinfo'=>$allinfo,'liste_diapo'=>$liste_diapo));
}
}