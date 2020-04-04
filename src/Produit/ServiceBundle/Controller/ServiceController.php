<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Form\ServiceType;
use Produit\ServiceBundle\Form\ServiceeditType;
use Produit\ServiceBundle\Entity\Service;
use Produit\ProduitBundle\Entity\Produit;
use Produit\ServiceBundle\Entity\Commentaireblog;
use Produit\ServiceBundle\Entity\Intervention;
use Produit\ServiceBundle\Form\CommentaireblogType;
use Produit\ServiceBundle\Form\InterventionType;
use Produit\ServiceBundle\Form\EvenementType;
use Produit\ServiceBundle\Form\ImgevenementType;
use Produit\ServiceBundle\Entity\Evenement;
use Produit\ServiceBundle\Entity\Imgevenement;
use General\TemplateBundle\Entites\Recherche;
use Produit\ProduitBundle\Entity\Panier;
use Produit\ProduitBundle\Entity\Produitpanier;

use Produit\ServiceBundle\Entity\Infoentreprise;
use Produit\ServiceBundle\Form\InfoentrepriseeditType;

use Produit\ServiceBundle\Entity\Detailinfoentreprise;
use Produit\ServiceBundle\Form\DetailinfoentrepriseType;
use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;

class ServiceController extends Controller
{
public function nouveauserviceAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$nosservice = new Service($service);
    $form = $this->createForm(new ServiceType, $nosservice);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$form->bind($request);
	$nosservice->setUser($this->getUser());
	if($nosservice->getImgservice() !== null)
	{
	$nosservice->getImgservice()->setServicetext($service);
	}
	if($nosservice->getImgservicesecond() !== null)
	{
	$nosservice->getImgservicesecond()->setServicetext($service);
	}
	$nosservice->setPrincipal(true);
	
	$valid  = false;
	$datetext = '00-00-0000';
	if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee'])){
		$date = ''.$_POST['jour'].'/'.$_POST['mois'].'/'.$_POST['annee'].'';
		$datetext = ''.$_POST['jour'].'-'.$_POST['mois'].'-'.$_POST['annee'].'';
		if($service->mydate($date))
		{
			$nosservice->setDatepicket($date);
			$nosservice->setDatebegin($datetext);
			$valid = true;
		}
	}

	$datetextend = '00-00-0000';
	if (isset($_POST['jourend']) and isset($_POST['moisend']) and isset($_POST['anneeend']) and $valid == true){
		$date = ''.$_POST['jourend'].'/'.$_POST['moisend'].'/'.$_POST['anneeend'].'';
		$datetextend = ''.$_POST['jourend'].'-'.$_POST['moisend'].'-'.$_POST['anneeend'].'';
		if($service->mydate($date))
		{
			$nosservice->setDatefin($datetextend);
			$valid = true;
		}
	}else{
		$valid = false;
	}
	
	if(isset($_POST['allposteservice']) and $valid == true)
	{
		$tabcours = explode('$$$$$$', $_POST['allposteservice']);
		$liste_cours = $em->getRepository('ProduitProduitBundle:Produit')
	                        ->findBy(array('id'=>$tabcours));
		if(count($liste_cours) > 0)
		{
			foreach($liste_cours as $cours)
			{
				$nosservice->addProduit($cours);
			}
		}else{
			$valid = false;
		}
	}else{
		$valid = false;
	}
			
    if ($form->isValid() and $valid == true and $_POST['dureeacces'] and $_POST['dureeacces'] != 0){
		$em->persist($nosservice);
		$nosservice->setDureeacces($_POST['dureeacces']);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
		return $this->redirect($this->generateUrl('users_adminuser_add_un_evenement',array('id'=>$nosservice->getId())));
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée');
	}
	}
	$liste_service = $em->getRepository('ProduitServiceBundle:Service')
	                    ->findBy(array('principal'=>1));
	return $this->render('UsersAdminuserBundle:Service:nouveauservice.html.twig',
	array('form'=>$form->createView(),'liste_service'=>$liste_service,'formsupp'=>$formsupp->createView()));
}

public function nouvellecompetitionAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$nosservice = new Service($service);
    $form = $this->createForm(new ServiceeditType, $nosservice);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$form->bind($request);
	$nosservice->setUser($this->getUser());
	if($nosservice->getImgservice() !== null)
	{
		$nosservice->getImgservice()->setServicetext($service);
	}
	$nosservice->setThemeforum(true);

    if ($form->isValid()){
		$em->persist($nosservice);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
		return $this->redirect($this->generateUrl('users_adminuser_add_un_evenement',array('id'=>$nosservice->getId())));
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée');
	}
	}
	$liste_service = $em->getRepository('ProduitServiceBundle:Service')
	                    ->findBy(array('themeforum'=>1));
	return $this->render('UsersAdminuserBundle:Competition:nouvellecompetition.html.twig',
	array('form'=>$form->createView(),'liste_service'=>$liste_service,'formsupp'=>$formsupp->createView()));
}

public function addnewserviceAction()
{
	
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$info = new Infoentreprise($service);
	$form = $this->createForm(new InfoentrepriseeditType, $info);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$info->setUser($this->getUser());
		if($info->getImginfoentreprise() !== null)
		{
		$info->getImginfoentreprise()->setServicetext($service);
		}
		$info->setValeur(true);
		if($form->isValid()){
			$em->persist($info);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Publication enregistrée avec succès.');
		}else{

			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée.');
		}
	}
	$allinfo = $em->getRepository('ProduitServiceBundle:Infoentreprise')
	                      ->FindAll();
    return $this->render('UsersAdminuserBundle:Servicestruct:addnewservice.html.twig',
	array('form'=>$form->createView(),'allinfo'=>$allinfo,'formsupp'=>$formsupp->createView()));
}

public function modifierserviceAction(Service $nosservice)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
    $form = $this->createForm(new ServiceType, $nosservice);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	$nosservice->setServicetext($service);
	$evenement = new Evenement($service);
    $formeven = $this->createForm(new EvenementType, $evenement);
	if ($request->getMethod() == 'POST'){
	$form->bind($request);
	$nosservice->setUser($this->getUser());
	if($nosservice->getImgservice() !== null)
	{
	$nosservice->getImgservice()->setServicetext($service);
	}
	if($nosservice->getImgservicesecond() !== null)
	{
	$nosservice->getImgservicesecond()->setServicetext($service);
	}
	$nosservice->setPrincipal(true);
	
	$valid  = false;
	$datetext = '00-00-0000';
	if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee'])){
		$date = ''.$_POST['jour'].'/'.$_POST['mois'].'/'.$_POST['annee'].'';
		$datetext = ''.$_POST['jour'].'-'.$_POST['mois'].'-'.$_POST['annee'].'';
		if($service->mydate($date))
		{
			$nosservice->setDatepicket($date);
			$nosservice->setDatebegin($datetext);
			$valid = true;
		}
	}

	$datetextend = '00-00-0000';
	if (isset($_POST['jourend']) and isset($_POST['moisend']) and isset($_POST['anneeend']) and $valid == true){
		$date = ''.$_POST['jourend'].'/'.$_POST['moisend'].'/'.$_POST['anneeend'].'';
		$datetextend = ''.$_POST['jourend'].'-'.$_POST['moisend'].'-'.$_POST['anneeend'].'';
		if($service->mydate($date))
		{
			$nosservice->setDatefin($datetextend);
			$valid = true;
		}
	}else{
		$valid = false;
	}
	
	if(isset($_POST['allposteservice']) and $valid == true)
	{
		$tabcours = explode('$$$$$$', $_POST['allposteservice']);
		$liste_cours = $em->getRepository('ProduitProduitBundle:Produit')
	                        ->findBy(array('id'=>$tabcours));
		foreach($liste_cours as $cours)
		{
			$exist = false;
			foreach($nosservice->getProduits() as $oldp)
			{
				if($oldp == $cours)
				{
					$exist = true;
					break;
				}
			}
			if($exist == false)
			{
				$nosservice->addProduit($cours);
			}
		}
	}else{
		$valid = false;
	}
			
    if ($form->isValid() and $valid == true and $_POST['dureeacces'] and $_POST['dureeacces'] != 0){
		$em->persist($nosservice);
		$nosservice->setDureeacces($_POST['dureeacces']);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
		return $this->redirect($this->generateUrl('users_adminuser_add_un_evenement',array('id'=>$nosservice->getId())));
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée');
	}
	}
	$liste_service = $em->getRepository('ProduitServiceBundle:Service')
	                    ->findBy(array('principal'=>1));
						
	return $this->render('UsersAdminuserBundle:Service:modifierservice.html.twig',
	array('form'=>$form->createView(),'formsupp'=>$formsupp->createView(),'liste_service'=>$liste_service,'service'=>$nosservice,'formeven'=>$formeven->createView()));
}

public function removecoursAction(Service $nosservice, Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$nosservice->removeProduit($produit);
	$nosservice->setServicetext($service);
	$em->flush();
	$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	return $this->redirect($this->generateUrl('users_adminuser_modifier_un_service',array('id'=>$nosservice->getId())));
}

public function modificationserviceAction(Infoentreprise $info)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$form = $this->createForm(new InfoentrepriseeditType, $info);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$info->setUser($this->getUser());
		if($info->getImginfoentreprise() !== null)
		{
		$info->getImginfoentreprise()->setServicetext($service);
		}
		$info->setValeur(true);
		if($form->isValid()){
			$em->persist($info);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée succès.');
			return $this->redirect($this->generateUrl('users_adminusers_add_new_service'));
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée.');
		}
	}
	$detailinfo = new Detailinfoentreprise();
	$formdetail = $this->createForm(new DetailinfoentrepriseType, $detailinfo);
	$allinfo = $em->getRepository('ProduitServiceBundle:Infoentreprise')
	                      ->FindAll();
    return $this->render('UsersAdminuserBundle:Servicestruct:modificationservice.html.twig',
	array('form'=>$form->createView(),'allinfo'=>$allinfo,'formsupp'=>$formsupp->createView(),'info'=>$info,'formdetail'=>$formdetail->createView()));
}

public function modifiercompetitionAction(Service $nosservice)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
    $form = $this->createForm(new ServiceeditType, $nosservice);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	
	$evenement = new Evenement($service);
    $formeven = $this->createForm(new EvenementType, $evenement);
	if ($request->getMethod() == 'POST'){
	$form->bind($request);
	$nosservice->setUser($this->getUser());
	if($nosservice->getImgservice() !== null)
	{
		$nosservice->getImgservice()->setServicetext($service);
	}

	$nosservice->setThemeforum(true);
	
    if ($form->isValid()){
		$em->persist($nosservice);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
		return $this->redirect($this->generateUrl('users_adminuser_add_un_evenement',array('id'=>$nosservice->getId())));
	}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée, Choisissez un type et retransmettez le formulaire!');
	}
	}
	$liste_service = $em->getRepository('ProduitServiceBundle:Service')
	                    ->findBy(array('themeforum'=>1));
						
	return $this->render('UsersAdminuserBundle:Competition:modifiercompetition.html.twig',
	array('form'=>$form->createView(),'formsupp'=>$formsupp->createView(),'liste_service'=>$liste_service,'service'=>$nosservice,'formeven'=>$formeven->createView()));
}

public function addevenementAction(Service $nosservice)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$request = $this->get('request');
	$evenement = new Evenement($service);
    $formeven = $this->createForm(new EvenementType, $evenement);
	$formsupp = $this->createFormBuilder()->getForm();
	if ($request->getMethod() == 'POST'){
	$formeven->bind($request);
	$evenement->setUser($this->getUser());
	if($evenement->getImgevenement() !== null)
	{
	$evenement->getImgevenement()->setServicetext($service);
	}
	$evenement->setService($nosservice);
    if ($formeven->isValid()){
		$em->persist($evenement);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée !');
	}
	}
	$liste_even = $em->getRepository('ProduitServiceBundle:Evenement')
	                    ->findBy(array('service'=>$nosservice),array('date'=>'asc'));
	return $this->render('UsersAdminuserBundle:Service:addevenement.html.twig',
	array('formeven'=>$formeven->createView(),'service'=>$nosservice,'liste_even'=>$liste_even,'formsupp'=>$formsupp->createView()));
}
public function supprimevenementAction(Evenement $even)
{
	    $em = $this->getDoctrine()->getManager();
		$formsupp = $this->createFormBuilder()->getForm();
		$service = $even->getService();
		$request = $this->get('request');
		if ($request->getMethod() == 'POST') {
		$formsupp->bind($request);
		if ($formsupp->isValid()){
		$em->remove($even);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
		}
		}else{
		$this->get('session')->getFlashBag()->add('supprime_prod',$even->getId());
	    $this->get('session')->getFlashBag()->add('supprime_prod',$even->getNom());
		}
	return $this->redirect($this->generateUrl('users_adminuser_add_un_evenement',array('id'=>$service->getId())));
}

public function supprimerserviceAction(Service $service)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST') {
	$formsupp->bind($request);
	if ($formsupp->isValid()){
	$liste_evenement = $em->getRepository('ProduitServiceBundle:Evenement')
					->findBy(array('service'=>$service));
	if(count($liste_evenement) == 0)
	{
		$em->remove($service);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Action réfusée ! Supprimez les articles liés à cette offre de formation.');
	}
	}
	}else{
	$this->get('session')->getFlashBag()->add('supprime_prod',$service->getId());
	$this->get('session')->getFlashBag()->add('supprime_prod',$service->getNom());
	}
	return $this->redirect($this->generateUrl('users_adminuser_ajouter_nouveau_service'));
}

public function supprimervaleurformationAction(Infoentreprise $info)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
    $request = $this->get('request');
	if ($request->getMethod() == 'POST') {
    $formsupp->bind($request);
    if ($formsupp->isValid()){
	$details = $info->getDetailinfoentreprises();
	foreach($details as $detail)
	{
		$em->remove($detail);
	}
	$em->remove($info);
    $em->flush();
	$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	return $this->redirect($this->generateUrl('users_adminusers_add_new_service'));
	}
	}
    $this->get('session')->getFlashBag()->add('supprime_apropos',$info->getId());
	$this->get('session')->getFlashBag()->add('supprime_apropos',$info->getTitre());
	return $this->redirect($this->generateUrl('users_adminusers_add_new_service'));
}

public function supprimercompetitionAction(Service $service)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$formsupp->bind($request);
	if ($formsupp->isValid()){
		$liste_evenement = $em->getRepository('ProduitServiceBundle:Evenement')
						->findBy(array('service'=>$service));
		$liste_dom = $em->getRepository('ProduitProduitBundle:Produit')
						->findBy(array('equipedom'=>$service));
		$liste_ext = $em->getRepository('ProduitProduitBundle:Produit')
						->findBy(array('equipeext'=>$service));
		$liste_competition = $em->getRepository('ProduitProduitBundle:Produit')
						->findBy(array('competition'=>$service));
		if(count($liste_evenement) == 0 and count($liste_dom) == 0 and count($liste_ext) == 0 and count($liste_competition) == 0)
		{
		$em->remove($service);
		$em->flush();
			$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Action réfusée! Supprimez les articles liés à cette compétition.');
		}
	}
	}else{
	$this->get('session')->getFlashBag()->add('supprime_prod',$service->getId());
	$this->get('session')->getFlashBag()->add('supprime_prod',$service->getNom());
	}
	return $this->redirect($this->generateUrl('users_adminuser_ajouter_nouvelle_competition_user'));
}

public function presentationAction($id = 0)
{
	$em = $this->getDoctrine()->getManager();
	$liste_service = $em->getRepository('ProduitServiceBundle:Service')
	                    ->myfindAll();
	if($id != 0)
	{
		$service = $em->getRepository('ProduitServiceBundle:Service')
	                  ->find($id);
		$newliste = new \Doctrine\Common\Collections\ArrayCollection();
		if($service != null)
		{
		$newliste[] = $service;
		}
		foreach($liste_service as $courantservice)
		{
			if($service != $courantservice)
			{
				$newliste[] = $courantservice;
			}
		}
		$liste_service = $newliste;
	}else{
		$compt = 0;
	    foreach($liste_service as $ser)
		{
			if($compt == 0)
			{
				$service = $ser;
				break;
			}
		}
	}
	if($service != null)
	{
	$repository = $em->getRepository('ProduitServiceBundle:Apropos');
	$liste_team = $repository->FindBy(array('particulier'=>true));
	$ser = $this->container->get('general_service.servicetext');
	$team_select = $ser->selectEntities($liste_team, 3);
	$liste_envent = $em->getRepository('ProduitServiceBundle:Evenement')
	                   ->findBy(array('service'=>$service),array('rang'=>'asc'));
	return $this->render('ProduitServiceBundle:Service:presentation.html.twig', array('liste_envent'=>$liste_envent,'service'=>$service,'liste_service'=>$liste_service,'team_select'=>$team_select));
	}else{
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
}

public function nosformationsAction()
{
	$em = $this->getDoctrine()->getManager();
	return $this->render('ProduitServiceBundle:Service:nosformations.html.twig');
}

public function listeformationAction($page)
{
	if(isset($_GET['page']))
	{
	 $page = $_GET['page'];
	}else{
	 $page = $page;
	}
	
	$em = $this->getDoctrine()->getManager();
	$liste_formation = $em->getRepository('ProduitServiceBundle:Service')
	                      ->listeformation($page,6);
	return $this->render('ProduitServiceBundle:Service:listeformation.html.twig',
	array('nombrepage' => ceil(count($liste_formation)/6),'page'=>$page,'liste_formation'=>$liste_formation));
}

public function affichearticleAction(Service $service)
{
	$em = $this->getDoctrine()->getManager();
	$recherche = new Recherche();
	$formBuilder = $this->createFormBuilder($recherche);
	$formBuilder
              ->add('donnee', 'text',array('attr'=>array('class'=>'textbox','placeholder'=>'Lancer une recherche','type'=>'search')));
	$formrecher = $formBuilder->getForm();
	
	$liste_even = $em->getRepository('ProduitServiceBundle:Evenement')
	                 ->findBy(array('service'=>$service),array('rang'=>'desc'));
	$liste_com = $em->getRepository('ProduitServiceBundle:Commentaireblog')
	                 ->findBy(array('service'=>$service),array('date'=>'desc'));
	
	$liste_categorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                      ->findAll();
					 
	$comment = new Commentaireblog();
    $form = $this->createForm(new CommentaireblogType, $comment);
	return $this->render('ProduitServiceBundle:Service:affichearticle.html.twig',array('article'=>$service,'liste_categorie'=>$liste_categorie,'form'=>$form->createView(),'formrecher'=>$formrecher->createView(),'liste_even'=>$liste_even,'liste_com'=>$liste_com));
}

public function ajoutersujetforumAction(Service $nosservice, $page)
{
	$em = $this->getDoctrine()->getManager();
	$request = $this->get('request');
	$comment = new Commentaireblog();
    $form = $this->createForm(new CommentaireblogType, $comment);
	if ($request->getMethod() == 'POST'){
	$form->bind($request);

	$comment->setService($nosservice);
    if ($form->isValid() and $this->getUser() != null){
		$comment->setUser($this->getUser());
		$em->persist($comment);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
	}else{
		if($this->getUser() == null)
		{
			$this->get('session')->getFlashBag()->add('information','Une erreur ! vous n\'êtes pas connectez !');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !');
		}
	}
	}
	$sujet_forum = $em->getRepository('ProduitServiceBundle:Commentaireblog')
	                  ->findSujetForum($nosservice->getId(),$page,10);
				   
	if($nosservice->getThemeforum() == true)
	{
		return $this->render('ProduitServiceBundle:Forum:ajoutersujetforum.html.twig',
		array('nosservice'=>$nosservice,'form'=>$form->createView(), 'nombrepage' => ceil(count($sujet_forum)/10),'page'=>$page,'sujet_forum'=>$sujet_forum));
	}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée ! Aucun thème du forum choisi.');
		return $this->redirect($this->generateUrl('produit_service_forum_site'));
	}
}

public function interventionsujetAction(Commentaireblog $comment, $page)
{
	$em = $this->getDoctrine()->getManager();
	$request = $this->get('request');
	$intervention = new Intervention();
    $form = $this->createForm(new InterventionType, $intervention);
	if ($request->getMethod() == 'POST'){
	$form->bind($request);

	$intervention->setCommentaireblog($comment);
    if ($form->isValid() and $this->getUser() != null){
		$intervention->setUser($this->getUser());
		$em->persist($intervention);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
	}else{
		if($this->getUser() == null)
		{
			$this->get('session')->getFlashBag()->add('information','Une erreur ! vous n\'êtes pas connectez !');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !');
		}
	}
	}
	$liste_intervention = $em->getRepository('ProduitServiceBundle:Intervention')
	                         ->findInterventionSujet($comment->getId(),$page,10);

	return $this->render('ProduitServiceBundle:Forum:interventionsujet.html.twig',
	array('comment'=>$comment,'form'=>$form->createView(), 'nombrepage' => ceil(count($liste_intervention)/10),'page'=>$page,'liste_intervention'=>$liste_intervention));
}

public function deleteinterventionAction(Intervention $intervention)
{
	$comment = $intervention->getCommentaireblog();
	$em = $this->getDoctrine()->getManager();
	if($this->get('security.context')->isGranted('ROLE_GESTION') or $this->getUser() == $comment->getUser()){
	$em->remove($intervention);
	$em->flush();
	}
	return $this->redirect($this->generateUrl('produit_service_interventions_sujets_courant',array('id'=>$comment->getId())));
}

public function banniereforumAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$allslide = $em->getRepository('UsersUserBundle:Imgslide')
	               ->findSlideAnnonce();
	$slideaccueil = $service->selectEntity($allslide);
	
	$recherche = new Recherche();
	$formBuilder = $this->createFormBuilder($recherche);
	$formBuilder
              ->add('donnee', 'text',array('attr'=>array('class'=>'form-control','placeholder'=>'Recherchez dans le forum','style'=>'height: 43px;')));
	$formrecher = $formBuilder->getForm();
	
	return $this->render('ProduitServiceBundle:Forum:banniereforum.html.twig', array('slideaccueil'=>$slideaccueil,'formrecher'=>$formrecher->createView()));
}

public function rechercheforumAction($donnee, $page)
{
	$em = $this->getDoctrine()->getManager();
	$recherche = new Recherche();
	$formBuilder = $this->createFormBuilder($recherche);
	$formBuilder
              ->add('donnee', 'text',array('attr'=>array('class'=>'form-control police2','placeholder'=>'Retrouver un produit','type'=>'search')));
	$formrecher = $formBuilder->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		$formrecher->bind($request);
	}else{
		$recherche->setDonnee($donnee);
	}
	$liste_sujet = $em->getRepository('ProduitServiceBundle:Commentaireblog')
						->searchSujetForum($recherche->getDonnee(), $page, 10);
	return $this->render('ProduitServiceBundle:Forum:rechercheforum.html.twig', array('liste_sujet'=>$liste_sujet,'nombrepage' => ceil(count($liste_sujet)/10),'recherche'=>$recherche,'page'=>$page));
}

public function supprimercommentaireAction(Commentaireblog $com)
{
	$service = $com->getService();
	$em = $this->getDoctrine()->getManager();
	if($this->get('security.context')->isGranted('ROLE_GESTION') or $this->getUser() == $com->getUser()){
	$em->remove($com);
	$em->flush();
	}
	return $this->redirect($this->generateUrl('produit_service_affiche_contenu_detaille_article_blog',array('id'=>$service->getId())));
}

public function ajouterimgserviceAction(Service $service)
{
	$servicetext = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$imgservice = new Imgevenement();
	$form = $this->createForm(new ImgevenementType, $imgservice);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$imgservice->setUser($this->getUser());
		$imgservice->setService($service);
		$imgservice->setServicetext($servicetext);
		if($form->isValid()){
			$em->persist($imgservice);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Publication enregistrée avec succès.');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée. Vérifiez la taille du fichié');
		}
	}
	$allimage = $em->getRepository('ProduitServiceBundle:Imgevenement')
	                      ->findBy(array('service'=>$service));
    return $this->render('UsersAdminuserBundle:Service:ajouterimgservice.html.twig',
	array('form'=>$form->createView(),'allimage'=>$allimage,'formsupp'=>$formsupp->createView(),'service'=>$service));
}
public function supprimerimgserviceAction(Imgevenement $image)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	$service = $image->getService();
    $request = $this->get('request');
	if ($request->getMethod() == 'POST') {
    $formsupp->bind($request);
    if ($formsupp->isValid()){
	$em->remove($image);
    $em->flush();
	$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	return $this->redirect($this->generateUrl('users_adminuser_ajouter_image_service_courant',array('id'=>$service->getId())));
	}
	}
    $this->get('session')->getFlashBag()->add('supprime_apropos',$image->getId());
	$this->get('session')->getFlashBag()->add('supprime_apropos',$image->getService()->getNom());
	return $this->redirect($this->generateUrl('users_adminuser_ajouter_image_service_courant',array('id'=>$service->getId())));
}
public function modifierevenementAction(Evenement $event)
{
	$em = $this->getDoctrine()->getManager();
	$servicetext = $this->container->get('general_service.servicetext');
    $formeven = $this->createForm(new EvenementType, $event);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$formeven->bind($request);
	if($event->getImgevenement() !== null)
	{
	$event->getImgevenement()->setServicetext($servicetext);
	}
    if ($formeven->isValid()){
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
		return $this->redirect($this->generateUrl('users_adminuser_add_un_evenement',array('id'=>$event->getService()->getId())));
	}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée, Choisissez un type et retransmettez le formulaire!');
	}
	}
	$liste_evenement = $em->getRepository('ProduitServiceBundle:Evenement')
	                    ->findBy(array('service'=>$event->getService()), array('rang'=>'asc'));
	return $this->render('UsersAdminuserBundle:Service:modifierevenement.html.twig',
	array('formeven'=>$formeven->createView(),'event'=>$event,'liste_evenement'=>$liste_evenement));
}

public function formateurstructAction()
{
	return $this->render('ProduitServiceBundle:Service:formateurstruct.html.twig');
}

public function listeformateurAction($page)
{
	if(isset($_GET['page']))
	{
	 $page = $_GET['page'];
	}else{
	 $page = $page;
	}
	
	$em = $this->getDoctrine()->getManager();
	$liste_formateur = $em->getRepository('UsersUserBundle:User')
	                      ->listeformateur($page,6);
	return $this->render('ProduitServiceBundle:Service:listeformateur.html.twig',
	array('nombrepage' => ceil(count($liste_formateur)/6),'page'=>$page,'liste_formateur'=>$liste_formateur));
}

public function accueilforumAction()
{
	$em = $this->getDoctrine()->getManager();

	$categorie_forum = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                      ->souscategorieforum();
	foreach($categorie_forum as $categorie)
	{
		$categorie->setEm($em);
	}		
	return $this->render('ProduitServiceBundle:Forum:accueilforum.html.twig',
	array('categorie_forum'=>$categorie_forum));
}

public function presentationformationAction(Service $service)
{
	$em = $this->getDoctrine()->getManager();
	$liste_cours = $service->getProduits();
	$nbvideo = 1;
	$nbsupport = 0;
	$nbpratique = 0;
	$nbexercice = 0;
	foreach($liste_cours as $cours)
	{
		$liste_video = $em->getRepository('ProduitProduitBundle:Chapitrecours')
	                      ->listechapitrecours($cours->getId());
		$nbvideo = $nbvideo + count($liste_video) + 1;
		
		$liste_support = $em->getRepository('ProduitProduitBundle:Supportchapitre')
	                      ->myFindByCours($cours->getId());
		$nbsupport = $nbsupport + count($liste_support);
		
		$liste_tp = $em->getRepository('ProduitProduitBundle:Pratiquechapitre')
	                      ->myFindByCours($cours->getId());
		$nbpratique = $nbpratique + count($liste_tp);
		
		$liste_exercice = $em->getRepository('ProduitProduitBundle:Exercicepartie')
	                      ->myFindByCours($cours->getId());
		$nbexercice = $nbexercice + count($liste_exercice);
	}
	return $this->render('ProduitServiceBundle:Service:presentationformation.html.twig', 
	array('service'=>$service,'nbvideo'=>$nbvideo,'nbsupport'=>$nbsupport,'nbpratique'=>$nbpratique,'nbexercice'=>$nbexercice));
}

public function addformationpanierAction(Service $service)
{
if(isset($_POST['_typedeformation']) and isset($_POST['_password']))
{
	$em = $this->getDoctrine()->getManager();
	if($_POST['_typedeformation'] == 1)
	{
		$montant = $service->getNprix();
		$value = 1;
	}else{
		$montant = $service->getNprixoff();
		$value = 0;
	}
	//$nbjour = $this->date->diff(new \Datetime())->days;
	if($this->getUser()->getSoldeprincipal() >= $montant)
	{
		if($this->getUser()->getPassword() == $_POST['_password'])
		{
			$oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
							->findOneBy(array('user'=>$this->getUser(),'service'=>$service));
			if($oldpanier == null)//s'il n'a jamais été inscrit à cette formation, on l'inscrit
			{
				$this->getUser()->setSoldeprincipal($this->getUser()->getSoldeprincipal() - $montant);
				$panier = new Panier();
				$panier->setUser($this->getUser());
				$panier->setService($service);
				$em->persist($panier);
				foreach($service->getProduits() as $produit)
				{
					$produitpanier = new Produitpanier();
					$produitpanier->setPanier($panier);
					$produitpanier->setProduit($produit);
					$produitpanier->setQuantite(1);
					$em->persist($produitpanier);
					$produit->setNbcertificat($produit->getNbcertificat() + 1);
				}
				$service->setNbcertificat($service->getNbcertificat() + 1);
				$this->get('session')->getFlashBag()->add('information','Inscription à la formation effectuée avec succès !');
				$em->flush();
				
				
				//envoie d'email
					$serviceadd = $this->container->get('general_service.servicetext');
					$siteweb = $this->container->getParameter('siteweb');
					$sitename = $this->container->getParameter('sitename');
					$emailadmin = $this->container->getParameter('emailadmin');
					if($serviceadd->email($emailadmin))
					{
						$mail = new Afmail();
						
						$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
						$mail->setSubject($this->getUser()->name(30).' vient de s\'inscrire à la formation '.$service->getNom().' sur '.$sitename); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>'Team '.$sitename,'titre' => $this->getUser()->name(30).' vient de s\'inscrire à la formation '.$service->getNom().' sur '.$sitename ,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/accueil/user/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($emailadmin));
					}
					
					foreach($service->getProduits() as $produit)
					{
						if($serviceadd->email($produit->getUser()->getUsername()))
						{
							$mail = new Afmail();
							
							$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
							$mail->setSubject($this->getUser()->name(30).' vient de s\'inscrire au cours '.$produit->getTitre().' sur '.$sitename); 
							$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$produit->getUser()->name(50),'titre' => $this->getUser()->name(30).' vient de s\'inscrire au cours '.$produit->getTitre().' sur '.$sitename ,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/user/detail/user/commande/'.$panier->getId().'/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
							$mail->setTextCharset('utf-8');
							$mail->setHTMLCharset('utf-8');
							$result = $mail->send(array($produit->getUser()->getUsername()));
						}
						sleep(2);
					}
					
					if($serviceadd->email($this->getUser()->getUsername()))
					{
						$mail = new Afmail();
						
						$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
						$mail->setSubject('Votre inscription à la formation '.$service->getNom().' a été effectuée avec succès sur '.$sitename.' !'); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$this->getUser()->name(50),'titre' =>'Votre inscription à la formation '.$service->getNom().' a été effectuée avec succès sur '.$sitename.' !' ,'contenu'=> 'Accédez à votre bableau de bord pour suivre votre progression à cette formation .</br><a href="'.$siteweb.'/accueil/user/'.$this->getUser()->getId().'">Lien vers votre tableau de bord.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($this->getUser()->getUsername()));
					}
					
			}else{
				if($oldpanier->getValide() == true)//s'il est encore inscrit
				{
					$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Vous êtes déjà inscrit à cette formation.');
				}else{  //si son inscription a expiré.
					$this->getUser()->setSoldeprincipal($this->getUser()->getSoldeprincipal() - $montant);
					$oldpanier->setDate(new \Datetime());
					$oldpanier->setValide(true);
					$em->flush();
					
					//envoie d'email
					$serviceadd = $this->container->get('general_service.servicetext');
					$siteweb = $this->container->getParameter('siteweb');
					$sitename = $this->container->getParameter('sitename');
					$emailadmin = $this->container->getParameter('emailadmin');
					if($serviceadd->email($emailadmin))
					{
						$mail = new Afmail();
						
						$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
						$mail->setSubject($this->getUser()->name(30).' vient de renouveler son inscription à la formation '.$service->getNom().' sur '.$sitename); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>'Team '.$sitename,'titre' => $this->getUser()->name(30).' vient de renouveler son inscription à la formation '.$service->getNom().' sur '.$sitename,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/accueil/user/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($emailadmin));
					}
					
					foreach($service->getProduits() as $produit)
					{
						if($serviceadd->email($produit->getUser()->getUsername()))
						{
							$mail = new Afmail();
							
							$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
							$mail->setSubject($this->getUser()->name(30).' vient de renouveler son inscription au cours '.$produit->getTitre().' sur '.$sitename); 
							$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$produit->getUser()->name(50),'titre' => $this->getUser()->name(30).' vient de renouveler son inscription au cours '.$produit->getTitre().' sur '.$sitename ,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/user/detail/user/commande/'.$oldpanier->getId().'/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
							$mail->setTextCharset('utf-8');
							$mail->setHTMLCharset('utf-8');
							$result = $mail->send(array($produit->getUser()->getUsername()));
						}
						sleep(2);
					}
					
					if($serviceadd->email($this->getUser()->getUsername()))
					{
						$mail = new Afmail();
						
						$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
						$mail->setSubject('Votre inscription à la formation '.$service->getNom().' a été renouvelée avec succès sur '.$sitename.' !'); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$this->getUser()->name(50),'titre' =>'Votre inscription à la formation '.$service->getNom().' a été renouvelé avec succès sur '.$sitename.' !' ,'contenu'=> 'Accédez à votre bableau de bord pour suivre votre progression à cette formation .</br><a href="'.$siteweb.'/accueil/user/'.$this->getUser()->getId().'">Lien vers votre tableau de bord.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($this->getUser()->getUsername()));
					}
				}
			} 
		}else{
			$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Le mot de passe que vous avez entré est invalid. <a href="#!" class="souscription-cours-offline" value="'.$value.'">Reéssayez</a>');
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Vous n\'avez pas assez de fond pour souscrire à cette formation. <a href="'.$this->generateUrl("produit_service_yourcv_recrutement").'">Créditez votre compte !</a>');
	}
	$oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
					->findOneBy(array('user'=>$this->getUser(),'payer'=>0));
}else{
	$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Toutes les données n\'ont pas été reçu.');
}
return $this->redirect($this->generateUrl('produit_service_assistance_entreprise', array('id'=>$service->getId())));
}

public function downloadvideoformationAction(Service $service)
{
	$em = $this->getDoctrine()->getManager();
	$service->getImgservicesecond()->setNbtele($service->getImgservicesecond()->getNbtele() + 1);
	$em->flush();
	$nameoffile = '/../../../'.$service->getImgservicesecond()->getWebPath();
	return $this->redirect($nameoffile);
}
}