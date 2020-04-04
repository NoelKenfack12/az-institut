<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace Produit\ProduitBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Users\UserBundle\Entity\User;
use Produit\ProduitBundle\Entity\Partiecours;
use Produit\ProduitBundle\Entity\Produit;
use Produit\ProduitBundle\Entity\Supportchapitre;
use Produit\ProduitBundle\Entity\Pratiquechapitre;
use Produit\ProduitBundle\Entity\Exercicepartie;
use Produit\ProduitBundle\Entity\Chapitrecours;
use Produit\ProduitBundle\Form\ChapitrecoursType;
use Produit\ProduitBundle\Form\PartiecoursType;
use Produit\ProduitBundle\Form\SupportchapitreType;
use Produit\ProduitBundle\Form\ExercicepartieType;
use Produit\ProduitBundle\Form\PratiquechapitreType;

use Produit\ProduitBundle\Entity\Panier;
use Produit\ProduitBundle\Entity\Produitpanier;

use Produit\ProduitBundle\Entity\Questionnaire;
use Produit\ProduitBundle\Form\QuestionnaireType;
use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;

class ChapitrecoursController extends Controller
{
public function addnewchapterAction(Partiecours $partie)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');

	$chapitre = new Chapitrecours();
	$formchap = $this->createForm(new ChapitrecoursType(), $chapitre); 
	
	$request = $this->get('request');
	if($request->getMethod() == 'POST' and $this->getUser() != null and isset($_POST['radios1'])){
    $formchap->bind($request);
	if($formchap->isValid()){
		$chapitre->setPartiecours($partie);
		if($chapitre->getImgchapitre() != null)
		{
			$chapitre->getImgchapitre()->setServicetext($service);
		}
		if($chapitre->getVideochapitre() != null)
		{
			$chapitre->getVideochapitre()->setServicetext($service);
		}
		if($_POST['radios1'] == 'chapitre')
		{
			$chapitre->setType(0);
		}else if($_POST['radios1'] == 'ressource')
		{
			$chapitre->setType(1);
		}else if($_POST['radios1'] == 'conclusion'){
			$chapitre->setType(2);
		}
		$em->persist($chapitre);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','Le nouveau chapitre a été enregistré avec succès.');
		
		//envoie d'email
		return $this->redirect($this->generateUrl('produit_produit_presentation_chapter', array('id'=>$chapitre->getId())));
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
	}
	}
	$produit = $partie->getProduit();
	$liste_part = $em->getRepository('ProduitProduitBundle:Partiecours')
	                      ->findBy(array('produit'=>$produit), array('rang'=>'asc'));
	foreach($liste_part as $part)
	{
		$part->setEm($em);
	}
	
	$newpartie = new Partiecours();
	$form = $this->createForm(new PartiecoursType(), $newpartie); 
	
	return $this->render('ProduitProduitBundle:Chapitrecours:addnewchapter.html.twig', 
	array('formchap'=>$formchap->createView(),'partie'=>$partie,'produit'=>$produit,'liste_part'=>$liste_part,'form'=>$form->createView()));
}

public function presentationchapterAction(Chapitrecours $chapitre)
{
	$partie = $chapitre->getPartiecours();
	$em = $this->getDoctrine()->getManager();
	$produit = $partie->getProduit();
	
	if($produit->getValide() == true or ($produit->getValide() == false and $produit->getUser() == $this->getUser()) or ($produit->getValide() == false and $this->get('security.context')->isGranted('ROLE_GESTION')) or (isset($_GET['codeadmin']) and $_GET['codeadmin'] == 10001))
	{
	if(isset($_GET['codeadmin']))
	{
		$codeadmin = $_GET['codeadmin'];
	}else{
		$codeadmin = 0;
	}
	$liste_part = $em->getRepository('ProduitProduitBundle:Partiecours')
	                      ->findBy(array('produit'=>$produit), array('rang'=>'asc'));
	foreach($liste_part as $part)
	{
		$part->setEm($em);
	}

	$bestpanier = null;
	$prodpan = null;
	if($this->getUser() != null)
	{
	$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
						  ->findBy(array('user'=>$this->getUser(),'valide'=>1));
	//on cherche à retenir le bon panier .
	foreach($liste_oldpanier as $panier)  //uno    -    le panier lié à un service (une offre de formation) est prio
	{
		$trouve = false;
		foreach($panier->getProduitpaniers() as $propan)
		{
			if($propan->getProduit() == $produit)
			{
				$trouve = true;
				break;
			}
		}
		if($panier->getservice() != null and $trouve == true)
		{
			$bestpanier = $panier;
			break;
		}
	}
	
	if($bestpanier == null)
	{
		foreach($liste_oldpanier as $panier)  // secondo    -    Le panier lié à un produit est bon, s'il ya aucun lié à un service
		{
			$trouve = false;
			foreach($panier->getProduitpaniers() as $propan)
			{
				if($propan->getProduit() == $produit)
				{
					$trouve = true;
					break;
				}
			}
			if($panier->getservice() == null and $panier->getChapitrecours() == null and $trouve == true)
			{
				$bestpanier = $panier;
				break;
			}
		}
	}
	
	if($bestpanier == null)
	{
		foreach($liste_oldpanier as $panier)  // tertio    -    Le panier lié à un chapitre est bon, s'il ya aucun lié à un service ou un produit l'est
		{
			$trouve = false;
			foreach($panier->getProduitpaniers() as $propan)
			{
				if($propan->getProduit() == $produit)
				{
					$trouve = true;
					break;
				}
			}
			if($panier->getservice() == null and $panier->getChapitrecours() == $chapitre and $trouve == true)
			{
				$bestpanier = $panier;
				break;
			}
		}
	}
	}
	
	if($bestpanier != null)
	{
		foreach($bestpanier->getProduitpaniers() as $propan)
		{
			if($propan->getProduit() == $produit)
			{
				$prodpan = $propan;
				break;
			}
		}
	}
	
	$service = $this->container->get('general_service.servicetext');
	
	$chapitre->setEm($em);		
	$liste_chapter = $em->getRepository('ProduitProduitBundle:Chapitrecours')
						->listechapitrecours($produit->getId());

	$newpartie = new Partiecours();
	$form = $this->createForm(new PartiecoursType(), $newpartie); 
	
	$session = $this->get('session');

	if($this->getUser() != null)
	{
	$listelikes = $produit->getUserlikes();
	$trouve = false;
	foreach($listelikes as $ser)
	{
		if($this->getUser() == $ser)
		{
			$trouve = true;
			break;
		}
	}
	
	if($trouve == false)
	{
		$produit->addUserlike($this->getUser());
	}
	}else{
		$liste_prod = $session->get('like_produit');
		if($liste_prod != null)
		{
		$tabprod = explode('-',$liste_prod);
		$addlike = true;
		for($i = 0; $i < count($tabprod); $i++)
		{
			if($tabprod[$i] == $produit->getId())
			{
				$addlike = false;
				break;
			}
		}
		
		if($addlike == true)
		{
			$session->set('like_produit',$session->get('like_produit').'-'.$produit->getId());
		}
		
		}else{
			$session->set('like_produit',$produit->getId());
			$addlike = true;
		}
		
		if($addlike == true)
		{
			$produit->setNblike($produit->getNblike() + 1);
		}
	}
	$em->flush();
	
	
	return $this->render('ProduitProduitBundle:Chapitrecours:presentationchapter.html.twig', 
	array('chapitre'=>$chapitre, 'partie'=>$partie,'prodpan'=>$prodpan,'codeadmin'=>$codeadmin,'bareme'=>$service->getBareme(),'liste_chapter'=>$liste_chapter,'produit'=>$produit,'liste_part'=>$liste_part,'form'=>$form->createView()));
	}else{
	
	$this->get('session')->getFlashBag()->add('alertnewsletter','<span class="fa fa-warning"></span> Echec ! vous n\\\'avez pas le droit d\\\'accéder à cette ressource !');

	}
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
}

public function modifierchapterAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$partie = $chapitre->getPartiecours();
	$formchap = $this->createForm(new ChapitrecoursType(), $chapitre); 
	
	$question = new Questionnaire();
	$formquestion = $this->createForm(new QuestionnaireType(), $question); 
	
	$request = $this->get('request');
	if ($request->getMethod() == 'POST' and $this->getUser() != null and isset($_POST['radios1'])){
    $formchap->bind($request);
	if($formchap->isValid()){
		$chapitre->setPartiecours($partie);
		if($chapitre->getImgchapitre() != null)
		{
			$chapitre->getImgchapitre()->setServicetext($service);
		}
		if($chapitre->getVideochapitre() != null)
		{
			$chapitre->getVideochapitre()->setServicetext($service);
		}
		if($_POST['radios1'] == 'chapitre')
		{
			$chapitre->setType(0);
		}else if($_POST['radios1'] == 'ressource')
		{
			$chapitre->setType(1);
		}else if($_POST['radios1'] == 'conclusion'){
			$chapitre->setType(2);
		}
		$em->persist($chapitre);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','Le chapitre a été modifié avec succès.');
		
		//envoie d'email
		return $this->redirect($this->generateUrl('produit_produit_presentation_chapter', array('id'=>$chapitre->getId())));
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
	}
	}
	$produit = $partie->getProduit();
	$liste_part = $em->getRepository('ProduitProduitBundle:Partiecours')
	                      ->findBy(array('produit'=>$produit), array('rang'=>'asc'));
	foreach($liste_part as $part)
	{
		$part->setEm($em);
	}
	
	$newpartie = new Partiecours();
	$form = $this->createForm(new PartiecoursType(), $newpartie); 
	
	$newsupport = new Supportchapitre();
	$formsupport = $this->createForm(new SupportchapitreType(), $newsupport); 
	
	$pratique = new Pratiquechapitre();
	$formpratique = $this->createForm(new PratiquechapitreType(), $pratique); 
	
	$exercice = new Exercicepartie();
	$formexercice = $this->createForm(new ExercicepartieType(), $exercice); 
	
	return $this->render('ProduitProduitBundle:Chapitrecours:modifierchapter.html.twig', 
	array('formchap'=>$formchap->createView(),'partie'=>$partie,'produit'=>$produit,'chapitre'=>$chapitre,'liste_part'=>$liste_part,
	'form'=>$form->createView(),'formsupport'=>$formsupport->createView(),'formquestion'=>$formquestion->createView(),'formpratique'=>$formpratique->createView(),'formexercice'=>$formexercice->createView()));
}

public function supprimerchapterAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	$partie = $chapitre->getPartiecours();
	$produit = $partie->getProduit();
	if($produit->getUser() == $this->getUser())
	{
		$em->remove($chapitre);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Votre cours a été mis à jour avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec !! Vous n\'avez pas le droit d\'effectuer cette action.');
	}
	return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId())));
}

public function ajoutnouveausupportAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');

	$newsupport = new Supportchapitre();
	$formsupport = $this->createForm(new SupportchapitreType(), $newsupport); 
	$newsupport->setServicetext($service);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST' and $this->getUser() != null){
    $formsupport->bind($request);
	if($formsupport->isValid()){
		$newsupport->setChapitrecours($chapitre);
		
		$em->persist($newsupport);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','Le nouveau support a été enregistré avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
	}
	}
	return $this->redirect($this->generateUrl('produit_produit_user_modif_chapter', array('id'=>$chapitre->getId())));
}

public function telechargersupportAction(Supportchapitre $support)
{
	$em = $this->getDoctrine()->getManager();
	$chapitre = $support->getChapitrecours();
	$partie = $chapitre->getPartiecours();
	$produit = $partie->getProduit();
	$accesschapter = false;
	if($this->getUser() != null)
	{
	$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
						  ->findBy(array('user'=>$this->getUser(),'valide'=>1));
	
	foreach($liste_oldpanier as $panier)
	{
		$produitpaniers = $panier->getProduitpaniers();
		foreach($produitpaniers as $propan)
		{
			if(($propan->getProduit() == $produit and $panier->getChapitrecours() == null) or ($propan->getProduit() == $produit and $panier->getChapitrecours() == $chapitre))
			{
				$accesschapter = true;
				break;
			}
		}
		if($accesschapter == true)
		{
			break;
		}
	}
	}
	if($accesschapter == true)
	{
		$nameoffile = '/../../../'.$support->getWebPath();
		return $this->redirect($nameoffile);
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec du téléchargement !! Vous n\'avez pas le droit d\'accéder à ce support de cours.');
		return $this->redirect($this->generateUrl('produit_produit_presentation_chapter', array('id'=>$chapitre->getId())));
	}
}

public function supprimersupportAction(Supportchapitre $support)
{
	$em = $this->getDoctrine()->getManager();
	$chapitre = $support->getChapitrecours();
	$partie = $chapitre->getPartiecours();
	$produit = $partie->getProduit();
	if($produit->getUser() == $this->getUser())
	{
		$em->remove($support);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Votre cours a été mis à jour avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec !! Vous n\'avez pas le droit d\'effectuer cette action.');
	}
	return $this->redirect($this->generateUrl('produit_produit_user_modif_chapter', array('id'=>$chapitre->getId())));
}

public function ajoutnewtravauxpratiqueAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');

	$pratique = new Pratiquechapitre();
	$formpratique = $this->createForm(new PratiquechapitreType(), $pratique); 
	$pratique->setServicetext($service);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST' and $this->getUser() != null){
    $formpratique->bind($request);
	if($pratique->getCorrectionpratique() != null)
	{
		$pratique->getCorrectionpratique()->setServicetext($service);
	}
	if($formpratique->isValid()){
		$pratique->setChapitrecours($chapitre);
		
		$em->persist($pratique);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','Le nouveau TP a été enregistré avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
	}
	}
	return $this->redirect($this->generateUrl('produit_produit_user_modif_chapter', array('id'=>$chapitre->getId())));
}

public function formulairemodifpratiqueAction(Pratiquechapitre $pratique)
{
	$formpratique = $this->createForm(new PratiquechapitreType(), $pratique); 
	return $this->render('ProduitProduitBundle:Chapitrecours:formulairemodifpratique.html.twig',
	array('formpratique'=>$formpratique->createView(),'pratique'=>$pratique));
}

public function modifsupportchapterAction(Pratiquechapitre $pratique)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');

	$formpratique = $this->createForm(new PratiquechapitreType(), $pratique); 
	$pratique->setServicetext($service);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST' and $this->getUser() != null){
    $formpratique->bind($request);
	if($pratique->getCorrectionpratique() != null)
	{
		$pratique->getCorrectionpratique()->setServicetext($service);
	}
	if($formpratique->isValid()){
		$em->persist($pratique);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','Le nouveau TP a été modifié avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
	}
	}
	return $this->redirect($this->generateUrl('produit_produit_user_modif_chapter', array('id'=>$pratique->getChapitrecours()->getId())));
}

public function telechargertpAction(Pratiquechapitre $tp)
{
	$em = $this->getDoctrine()->getManager();
	$chapitre = $tp->getChapitrecours();
	$partie = $chapitre->getPartiecours();
	$produit = $partie->getProduit();
	$accesschapter = false;
	if($this->getUser() != null)
	{
	$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
						  ->findBy(array('user'=>$this->getUser(),'valide'=>1));
	
	foreach($liste_oldpanier as $panier)
	{
		$produitpaniers = $panier->getProduitpaniers();
		foreach($produitpaniers as $propan)
		{
			if(($propan->getProduit() == $produit and $panier->getChapitrecours() == null) or ($propan->getProduit() == $produit and $panier->getChapitrecours() == $chapitre))
			{
				$accesschapter = true;
				break;
			}
		}
		if($accesschapter == true)
		{
			break;
		}
	}
	}
	if($accesschapter == true)
	{
		$nameoffile = '/../../../'.$tp->getWebPath();
		return $this->redirect($nameoffile);
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec du téléchargement !! Vous n\'avez pas le droit d\'accéder à ce TP.');
		return $this->redirect($this->generateUrl('produit_produit_presentation_chapter', array('id'=>$chapitre->getId())));
	}
}

public function suppressiontpAction(Pratiquechapitre $tp)
{
	$em = $this->getDoctrine()->getManager();
	$chapitre = $tp->getChapitrecours();
	$partie = $chapitre->getPartiecours();
	$produit = $partie->getProduit();
	if($produit->getUser() == $this->getUser())
	{
		$em->remove($tp);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Votre cours a été mis à jour avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec !! Vous n\'avez pas le droit d\'effectuer cette action.');
	}
	return $this->redirect($this->generateUrl('produit_produit_user_modif_chapter', array('id'=>$chapitre->getId())));
}

public function ajouterexerciceAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');

	$exercice = new Exercicepartie();
	$formexercice = $this->createForm(new ExercicepartieType(), $exercice);  
	$exercice->setServicetext($service);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST' and $this->getUser() != null){
    $formexercice->bind($request);
	if($exercice->getCorrectionexercice() != null)
	{
		$exercice->getCorrectionexercice()->setServicetext($service);
	}
	if($formexercice->isValid()){
		
		$exercice->setChapitrecours($chapitre);
		
		$em->persist($exercice);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','Le nouveau Exercice a été enregistré avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
	}
	}
	return $this->redirect($this->generateUrl('produit_produit_user_modif_chapter', array('id'=>$chapitre->getId())));
}

public function formulairemodifexerciceAction(Exercicepartie $exercice)
{
	$formexercice1 = $this->createForm(new ExercicepartieType(), $exercice); 
	return $this->render('ProduitProduitBundle:Chapitrecours:formulairemodifexercice.html.twig',
	array('formexercice1'=>$formexercice1->createView(),'exercice'=>$exercice));
}

public function modifexercicechapterAction(Exercicepartie $exercice)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');

	$formexercice1 = $this->createForm(new ExercicepartieType(), $exercice);  
	$exercice->setServicetext($service);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST' and $this->getUser() != null){
    $formexercice1->bind($request);
	if($exercice->getCorrectionexercice() != null)
	{
		$exercice->getCorrectionexercice()->setServicetext($service);
	}
	if($formexercice1->isValid()){
		$em->persist($exercice);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','L\'exercice a été modifié avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !');
	}
	}
	return $this->redirect($this->generateUrl('produit_produit_user_modif_chapter', array('id'=>$exercice->getChapitrecours()->getId())));
}

public function downloadcorrectionexoAction(Exercicepartie $exercice, Produitpanier $prodpan)
{
	$em = $this->getDoctrine()->getManager();
	$chapitre = $exercice->getChapitrecours();
	$partie = $chapitre->getPartiecours();
	$produit = $partie->getProduit();
	$accesschapter = false;
	$noteminexo = $this->container->getParameter('noteminexo');
	$chapitre->setEm($em);
	if($this->getUser() != null and $chapitre->getNoteExercice($prodpan) >= $noteminexo)
	{
		$accesschapter = true;
	}else{
		if($this->getUser() == $produit->getUser())
		{
			$accesschapter = true;
		}
	}
	if($accesschapter == true and $exercice->getCorrectionexercice() != null)
	{
		$nameoffile = '/../../../'.$exercice->getCorrectionexercice()->getWebPath();
		return $this->redirect($nameoffile);
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec du téléchargement !! Vous n\'avez pas le droit d\'accéder à cet éxercice.');
		return $this->redirect($this->generateUrl('users_user_detail_panier_user', array('panier'=>$prodpan->getPanier()->getId(), 'produit'=>$produit->getId())));
	}
}

public function telechargcorrectiontpAction(Pratiquechapitre $pratique, Produitpanier $prodpan)
{
	$em = $this->getDoctrine()->getManager();
	$chapitre = $pratique->getChapitrecours();
	$partie = $chapitre->getPartiecours();
	$produit = $partie->getProduit();
	$accesschapter = false;
	$noteminexo = $this->container->getParameter('noteminexo');
	$chapitre->setEm($em);
	if($this->getUser() != null and $chapitre->getNotePratique($prodpan) >= $noteminexo)
	{
		$accesschapter = true;
	}else{
		if($this->getUser() == $produit->getUser())
		{
			$accesschapter = true;
		}
	}
	if($accesschapter == true and $pratique->getCorrectionpratique() != null)
	{
		$nameoffile = '/../../../'.$pratique->getCorrectionpratique()->getWebPath();
		return $this->redirect($nameoffile);
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec du téléchargement !! Vous n\'avez pas le droit d\'accéder à cet éxercice.');
		return $this->redirect($this->generateUrl('users_user_detail_panier_user', array('panier'=>$prodpan->getPanier()->getId(), 'produit'=>$produit->getId())));
	}
}

public function downloadexerciceAction(Exercicepartie $exercice)
{
	$em = $this->getDoctrine()->getManager();
	$chapitre = $exercice->getChapitrecours();
	$partie = $chapitre->getPartiecours();
	$produit = $partie->getProduit();
	$accesschapter = false;
	if($this->getUser() != null)
	{
	$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
						  ->findBy(array('user'=>$this->getUser(),'valide'=>1));
	
	foreach($liste_oldpanier as $panier)
	{
		$produitpaniers = $panier->getProduitpaniers();
		foreach($produitpaniers as $propan)
		{
			if(($propan->getProduit() == $produit and $panier->getChapitrecours() == null) or ($propan->getProduit() == $produit and $panier->getChapitrecours() == $chapitre))
			{
				$accesschapter = true;
				break;
			}
		}
		if($accesschapter == true)
		{
			break;
		}
	}
	}
	if($accesschapter == true)
	{
		$nameoffile = '/../../../'.$exercice->getWebPath();
		return $this->redirect($nameoffile);
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec du téléchargement !! Vous n\'avez pas le droit d\'accéder à cet éxercice.');
		return $this->redirect($this->generateUrl('produit_produit_presentation_chapter', array('id'=>$chapitre->getId())));
	}
}

public function supprimeexerciceAction(Exercicepartie $exercice)
{
	$em = $this->getDoctrine()->getManager();
	$chapitre = $exercice->getChapitrecours();
	$partie = $chapitre->getPartiecours();
	$produit = $partie->getProduit();
	if($produit->getUser() == $this->getUser())
	{
		$em->remove($exercice);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Votre cours a été mis à jour avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec !! Vous n\'avez pas le droit d\'effectuer cette action.');
	}
	return $this->redirect($this->generateUrl('produit_produit_user_modif_chapter', array('id'=>$chapitre->getId())));
}

public function ajouterpanierAction(Chapitrecours $chapitre)
{
if(isset($_POST['_password']))
{
	$em = $this->getDoctrine()->getManager();
	//$nbjour = $this->date->diff(new \Datetime())->days;
	$produit = $chapitre->getPartiecours()->getProduit();
	$liste_chapter = $em->getRepository('ProduitProduitBundle:Chapitrecours')
						->listechapitrecours($produit->getId());
	$montant = 	ceil($produit->getNewprise()/count($liste_chapter));		
	if($this->getUser()->getSoldeprincipal() >= $montant)
	{
		if($this->getUser()->getPassword() == $_POST['_password'])
		{
			$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
							      ->findBy(array('user'=>$this->getUser(),'valide'=>1));
			$souscription = true;
			foreach($liste_oldpanier as $panier)
			{
				$produitpaniers = $panier->getProduitpaniers();
				foreach($produitpaniers as $propan)
				{
					if(($propan->getProduit() == $produit and $panier->getChapitrecours() == null) or ($propan->getProduit() == $produit and $panier->getChapitrecours() == $chapitre))
					{
						$souscription = false;
						break;
					}
				}
				if($souscription == false)
				{
					break;
				}
			}
			
			
			if($souscription == true)
			{
				$this->getUser()->setSoldeprincipal($this->getUser()->getSoldeprincipal() - $montant);
				
				
				$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
									  ->findBy(array('user'=>$this->getUser(),'valide'=>0));
				$lastpanier = null;
				foreach($liste_oldpanier as $panier)
				{
					$produitpaniers = $panier->getProduitpaniers();
					foreach($produitpaniers as $propan)
					{
						if(($propan->getProduit() == $produit) and  ($panier->getChapitrecours() == $chapitre))
						{
							$lastpanier = $panier;
							break;
						}
					}
					if($lastpanier != null)
					{
						break;
					}
				}
				if($lastpanier == null)
				{
					$panier = new Panier();
					$panier->setUser($this->getUser());
					$panier->setChapitrecours($chapitre);
					$em->persist($panier);
					
					$produitpanier = new Produitpanier();
					$produitpanier->setPanier($panier);
					$produitpanier->setProduit($produit);
					$produitpanier->setQuantite(1);
					$em->persist($produitpanier);
					
					$produit->setNbcertificat($produit->getNbcertificat() + 1);
					
					
					//envoie d'email
					$service = $this->container->get('general_service.servicetext');
					$siteweb = $this->container->getParameter('siteweb');
					$sitename = $this->container->getParameter('sitename');
					$emailadmin = $this->container->getParameter('emailadmin');
					if($service->email($emailadmin))
					{
						$mail = new Afmail();
						
						$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
						$mail->setSubject($this->getUser()->name(30).' vient de s\'inscrire au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' sur '.$sitename); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>'Team '.$sitename,'titre' => $this->getUser()->name(30).' vient de s\'inscrire au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' sur '.$sitename,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/user/detail/user/commande/'.$panier->getId().'/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($emailadmin));
					}
					
					if($service->email($produit->getUser()->getUsername()))
					{
						$mail = new Afmail();
						
						$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
						$mail->setSubject($this->getUser()->name(30).' vient de s\'inscrire au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' sur '.$sitename); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$produit->getUser()->name(50),'titre' => $this->getUser()->name(30).' vient de s\'inscrire au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' sur '.$sitename,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/user/detail/user/commande/'.$panier->getId().'/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($produit->getUser()->getUsername()));
					}
					
					if($service->email($this->getUser()->getUsername()))
					{
						$mail = new Afmail();
						
						$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
						$mail->setSubject('Votre inscription au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' a été effectuée avec succès sur '.$sitename.' !'); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$this->getUser()->name(50), 'titre' =>'Votre inscription au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' a été effectuée avec succès sur '.$sitename.' !','contenu'=> 'Accédez à votre bableau de bord pour suivre votre progression à cette formation .</br><a href="'.$siteweb.'/accueil/user/'.$this->getUser()->getId().'">Lien vers votre tableau de bord.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($this->getUser()->getUsername()));
					}
					
				}else{
					$lastpanier->setDate(new \Datetime());
					$lastpanier->setValide(true);
					
					//envoie d'email
					$service = $this->container->get('general_service.servicetext');
					$siteweb = $this->container->getParameter('siteweb');
					$sitename = $this->container->getParameter('sitename');
					$emailadmin = $this->container->getParameter('emailadmin');
					if($service->email($emailadmin))
					{
						$mail = new Afmail();
						
						$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
						$mail->setSubject($this->getUser()->name(30).' vient de renouvéler son inscription au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' sur '.$sitename); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>'Team '.$sitename,'titre' => $this->getUser()->name(30).' vient de renouvéler son inscription au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' sur '.$sitename,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/user/detail/user/commande/'.$lastpanier->getId().'/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($emailadmin));
					}
					
					if($service->email($produit->getUser()->getUsername()))
					{
						$mail = new Afmail();
						
						$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
						$mail->setSubject($this->getUser()->name(30).' vient de renouvéler son inscription au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' sur '.$sitename); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$produit->getUser()->name(50),'titre' => $this->getUser()->name(30).' vient de renouvéler son inscription au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' sur '.$sitename,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/user/detail/user/commande/'.$lastpanier->getId().'/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($produit->getUser()->getUsername()));
					}
					
					if($service->email($this->getUser()->getUsername()))
					{
						$mail = new Afmail();
						
						$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
						$mail->setSubject('Votre inscription au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' a été renouvelée avec succès sur '.$sitename.' !'); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$this->getUser()->name(50), 'titre' =>'Votre inscription au chapitre '.$chapitre->getTitre().' du cours '.$produit->getTitre().' a été renouvelée avec succès sur '.$sitename.' !','contenu'=> 'Accédez à votre bableau de bord pour suivre votre progression à cette formation .</br><a href="'.$siteweb.'/accueil/user/'.$this->getUser()->getId().'">Lien vers votre tableau de bord.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($this->getUser()->getUsername()));
					}
				}
				
				$this->get('session')->getFlashBag()->add('information','Inscription au cours effectuée avec succès !');
				$em->flush();
			}else{
				$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Vous êtes déjà inscrit à une formation contennant ce cours.');
			}
				 
		}else{
			$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Le mot de passe que vous avez entré est invalid. <a href="#!" class="souscription-cours-online" value="0">Reéssayez</a>');
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Vous n\'avez pas assez de fond pour souscrire à cette formation. <a href="'.$this->generateUrl("produit_service_yourcv_recrutement").'">Créditez votre compte !</a>');
	}
}else{
	$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Toutes les données n\'ont pas été reçu.');
}

return $this->redirect($this->generateUrl('produit_produit_presentation_chapter', array('id'=>$chapitre->getId())));
}

public function downloadvideochapitreAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	$partie = $chapitre->getPartiecours();
	$produit = $partie->getProduit();
	$accesschapter = false;
	if($this->getUser() != null)
	{
	$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
						  ->findBy(array('user'=>$this->getUser(),'valide'=>1));
	
	foreach($liste_oldpanier as $panier)
	{
		$produitpaniers = $panier->getProduitpaniers();
		foreach($produitpaniers as $propan)
		{
			if(($propan->getProduit() == $produit and $panier->getChapitrecours() == null) or ($propan->getProduit() == $produit and $panier->getChapitrecours() == $chapitre))
			{
				$accesschapter = true;
				break;
			}
		}
		if($accesschapter == true)
		{
			break;
		}
	}
	}
	if($accesschapter == true)
	{
		$chapitre->getVideochapitre()->setNbtele($chapitre->getVideochapitre()->getNbtele() + 1);
		$em->flush();
		$nameoffile = '/../../../'.$chapitre->getVideochapitre()->getWebPath();
		return $this->redirect($nameoffile);
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec du téléchargement !! Vous n\'avez pas le droit d\'accéder à cette vidéo.');
		return $this->redirect($this->generateUrl('produit_produit_presentation_chapter', array('id'=>$chapitre->getId())));
	}
}
}