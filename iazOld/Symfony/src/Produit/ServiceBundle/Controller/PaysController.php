<?php
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Entity\Continent;
use Produit\ServiceBundle\Entity\Pays;
use Symfony\Component\HttpFoundation\Request;
use Produit\ServiceBundle\Form\PaysType;

class PaysController extends Controller
{
public function ajouterpaysAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$pays = new Pays($service);
    $form2 = $this->createForm(new PaysType, $pays);
	
	$request = $this->get('request');
	if ($request->getMethod() == 'POST') {
	$form2->bind($request);
    if ($form2->isValid()){
		if($pays->getDrapeau() !== null)
		{
			$pays->getDrapeau()->setServicefile($service);
		}

		$em->persist($pays);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','le pays a été bien enregistrée.');
	}else{
		$pays->getContinent()->removePay($pays);
		$this->get('session')->getFlashBag()->add('information','Echec, Une erreur a été rencontrée');
	}
	}
	return $this->redirect($this->generateUrl('users_adminuser_form_pays_continent'));
}

public function listepayscontinentAction(Continent $continent,$page)
{
	if($page < 1){
	return $this->redirect($this->generateUrl('admin_user_localisation'));
	}
	$form = $this->createFormBuilder()->getForm();
	$em = $this->getDoctrine()->getManager();
	$drapeau = $em->getRepository('AdministrationSuperadminBundle:Icone')
	             ->findOneBy(array('nom'=>'drapeau'));
	$liste_pays = $em->getRepository('UsersLocalisationuserBundle:Pays')
	                 ->myfindByContinent($continent->getId(),12, $page);
	return $this->render('UsersAdminuserBundle:Localisationuser:listepayscontinent.html.twig',
	array('nombrepage' => ceil(count($liste_pays)/12),'continent'=>$continent,'liste_pays'=>$liste_pays,
	'page'=>$page,'drapeau'=>$drapeau,'formsupp'=>$form->createView()));
}

public function modificationpaysAction($id)
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
	
	$pays = $em->getRepository('ProduitServiceBundle:Pays')
					->find($id);
	if($pays != null)
	{
	$form2 = $this->createForm(new PaysType, $pays);
	$pays->setServicetext($service);
	if($request->getMethod() == 'POST'){
		$form2->bind($request);
		if($pays->getDrapeau() != null)
		{
			$pays->getDrapeau()->setServicefile($service);
		}
		if($form2->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_form_pays_continent'));
	}
	return $this->render('UsersAdminuserBundle:Localisation:modificationpays.html.twig',
	array('form2'=>$form2->createView(),'pays'=>$pays));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function dropcountryuserAction(Pays $pays)
{
	$form = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST') {
	$form->bind($request);
    if ($form->isValid()){
	$em = $this->getDoctrine()->getManager();
	$liste_user = $em->getRepository('UsersUserBundle:User')
	                 ->findBy(array('pays'=>$pays));
	if(count($liste_user) == 0)
	{
		$em->remove($pays);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Action réfusée; ce pays est reservé par les utilisateurs');
	}
	return $this->redirect($this->generateUrl('users_adminuser_form_pays_continent'));
	}
	}
	$this->get('session')->getFlashBag()->add('pays_supp',''.$pays->getId().'');
	$this->get('session')->getFlashBag()->add('pays_supp',''.$pays->getNom().'');
	return $this->redirect($this->generateUrl('users_adminuser_form_pays_continent'));
}

public function serviceaddpaysAction()
{
	$service = $this->container->get('general_service.servicefile');
	$pays = new Pays();
	$formpays = $this->createForm(new PaysType, $pays);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
    $formpays->bind($request);
    if ($formpays->isValid()){
	$pays->getDrapeau()->setServicefile($service);
	$em = $this->getDoctrine()->getManager();
	$liste_pays = $em->getRepository('UsersLocalisationuserBundle:Pays')
	                 ->findAll();
	if(count($liste_pays) == 0)
	{
	$em->persist($pays);
    $em->flush();
	$this->get('session')->getFlashBag()->add('information','le pays a été bien enregistrée.');
	}else{
	$pays->getContinent()->removePay($pays);
	$this->get('session')->getFlashBag()->add('information','Action réfusée!!! Les données issus de cette interface ne peuvent plus être validées.');
	}
	}
	}
	return $this->redirect($this->generateUrl('general_service_pays_continent'));
}

public function autosearchcountryAction($position = 'other')
{
	$em = $this->getDoctrine()->getManager();
	$liste_pays = $em->getRepository('UsersLocalisationuserBundle:Pays')
	                 ->myFindBy(250);
	return $this->render('UsersLocalisationuserBundle:Pays:autosearchcountry.html.twig', 
	array('liste_pays'=>$liste_pays,'position'=>$position));
}
}
