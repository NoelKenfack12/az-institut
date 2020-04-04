<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace Produit\ProduitBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ProduitBundle\Entity\Categorie;
use Produit\ProduitBundle\Form\CategorieType;
use Produit\ProduitBundle\Entity\Souscategorie;
use Produit\ProduitBundle\Form\SouscategorieType;
use Produit\ProduitBundle\Entity\Produit;
use Produit\ProduitBundle\Form\ProduitType;
use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;
use Users\UserBundle\Entity\Notification;

class CategorieController extends Controller
{
public function savecategorieAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$categorie = new Categorie($service);
	$request = $this->getRequest();
	$form = $this->createForm(new CategorieType, $categorie);
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$categorie->setUser($this->getUser());
		$categorie->setServicetext($service);
		$nbcategorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                      ->FindAll();
		$nbcategoriemax = $this->container->getParameter('nbcategorie');
		if ($form->isValid() and count($nbcategorie) <= $nbcategoriemax){
			$em->persist($categorie);
			$em->flush();
		}else{
			if(count($nbcategorie) > $nbcategoriemax)
			{
				$this->get('session')->getFlashBag()->add('image','Trop de catégorie.');
			}else{
				$this->get('session')->getFlashBag()->add('image','Données invalides.');
			}
		}
	}else{
	$this->get('session')->getFlashBag()->add('image','Données en mode get.');
	}
	return $this->redirect($this->generateUrl('users_adminuser_categorisation_produit_plateforme'));
}
public function ajoutersouscategorieAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$souscategorie = new Souscategorie($service);
	$request = $this->getRequest();
	$form = $this->createForm(new SousCategorieType, $souscategorie);
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$souscategorie->setUser($this->getUser());
		$souscategorie->setServicetext($service);
		$liste_souscategorie = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                              ->FindBy(array('categorie'=>$souscategorie->getCategorie()));
		$nbcategoriemax = $this->container->getParameter('nbsouscategorie');
		if($form->isValid() and count($liste_souscategorie) <= $nbcategoriemax){

			$em->persist($souscategorie);
			$em->flush();
		}else{
			if( count($liste_souscategorie) > $nbcategoriemax )
			{
			  $this->get('session')->getFlashBag()->add('images','Trop de sous-catégorie.');
			}else{
			  $this->get('session')->getFlashBag()->add('images','Données invalides.');
			}
		}
	}
	return $this->redirect($this->generateUrl('users_adminuser_categorisation_produit_plateforme'));
}
public function listecategorieAction(Categorie $cat, $pagesuivante)
{
	if(isset($_POST['page']))
	{
		$pagesuivante = $_POST['page'];
	}else{
		$pagesuivante = $pagesuivante;
	}
	$em = $this->getDoctrine()->getManager();
	$nbcategorie = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                  ->findScatcourantCat($cat->getId(), $pagesuivante, 10);
	$repository = $em->getRepository('ProduitProduitBundle:Produit');
	$repositorypan = $em->getRepository('ProduitProduitBundle:Panier');
	foreach($nbcategorie as $scat)
	{
		$cours_inval = $repository->listeProduitInval($scat->getId());
		$scat->setnbprodinval(count($cours_inval));
		
		$cours_val = $repository->listeProduitVal($scat->getId());
		$scat->setNbprodval(count($cours_val));
		
		$cours_pan = $repositorypan->getPanierScategorie($scat->getId());
		$scat->setNbprodachive(count($cours_pan));
	}
	return $this->render('UsersAdminuserBundle:Categorie:listecategorie.html.twig',
	array('cat'=>$cat,'liste_scat'=>$nbcategorie,'nombrepage' => ceil(count($nbcategorie)/10),'pagesuivante'=>$pagesuivante));
}
public function modificationcategorieAction(Categorie $categorie)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
    $formcat = $this->createForm(new CategorieType, $categorie);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$formcat->bind($request);
	$categorie->setServicetext($service);
    if ($formcat->isValid()){
    $em->flush();
	$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
	}else{
	$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
	}
	}
	return $this->render('UsersAdminuserBundle:Categorie:modificationcategorie.html.twig',
	array('form'=>$formcat->createView(),'cat'=>$categorie));
}

public function SupprimercategorieAction(Categorie $categorie)
{
	$em = $this->getDoctrine()->getManager();
	if(count($categorie->getSouscategories()) == 0)
	{
		$em->remove($categorie);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec ! Cette catégorie contient les sous-catégories, Supprimez lès en premier.');
	}
	return $this->redirect($this->generateUrl('users_adminuser_categorisation_produit_plateforme'));
}

public function SupprimersouscategorieAction(Souscategorie $scategorie)
{
	$em = $this->getDoctrine()->getManager();
	if(count($scategorie->getProduits()) == 0)
	{
		$em->remove($scategorie);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec ! Cette sous-catégorie contient les produits, Supprimez lès en premier.');
	}
	return $this->redirect($this->generateUrl('users_adminuser_categorisation_produit_plateforme'));
}

public function listeproduitadminAction(Souscategorie $souscategorie)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$produit = new Produit($service);
	$request = $this->getRequest();
	$formpro = $this->createForm(new ProduitType(), $produit);
	if($request->getMethod() == 'POST')
	{
		$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                    ->myFindBy($souscategorie->getId());
		$nbprodsouscat = $this->container->getParameter('nbproduitsouscat');
		if($formpro->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Rencontre enregirtrée avec succès !');
		}else{
			 $this->get('session')->getFlashBag()->add('information','Données invalides.');
		}
	}
	
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                    ->myFindBy($souscategorie->getId());
	$form = $this->createFormBuilder()->getForm();
	return $this->render('UsersAdminuserBundle:Categorie:listeproduitadmin.html.twig', 
	array('souscategorie'=>$souscategorie,'liste_produit'=>$liste_produit,'form'=>$form->createView()));
}

public function listeproduitinvalideAction(Souscategorie $souscategorie)
{
	$em = $this->getDoctrine()->getManager();
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                    ->listeProduitInval($souscategorie->getId());

	$form = $this->createFormBuilder()->getForm();
	return $this->render('UsersAdminuserBundle:Categorie:listeproduitinvalide.html.twig', 
	array('souscategorie'=>$souscategorie,'liste_produit'=>$liste_produit,'form'=>$form->createView()));
}

public function demandegagnantAction(Souscategorie $souscategorie)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$souscategorie->setServicetext($service);
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                    ->findBySouscategorie($souscategorie->getId());
	$listevalide = true;
	foreach($liste_produit as $produit)
	{
		if($produit->getUpdatescore() == false)
		{
			$listevalide = false;
			break;
		}
	}
	if($listevalide == true and $souscategorie->getFermer() == false)
	{
		$liste_panier = $em->getRepository('ProduitProduitBundle:Panier')
	                       ->getPanierScategorie($souscategorie->getId());
		foreach($liste_panier as $panier)
		{
			$nbgagner = 0;
			foreach($panier->getProduitpaniers() as $propan)
			{
				$produit = $em->getRepository('ProduitProduitBundle:Produit')
	                          ->find($propan->getProduit()->getId());
				if($produit !=  null and $produit->getIssue() == $propan->getQuantite())
				{
					$nbgagner = $nbgagner + 1;
				}
			}
			$panier->setNbgagner($nbgagner);
			$em->flush();
		}
		
		//---------------------------------------------------
		$panier_gagnant = $em->getRepository('ProduitProduitBundle:Panier') //Les gagnants de trois matchs
	                       ->getPanierScategorieGagnant($souscategorie->getId());
		$nbgagnant = 0; //nombre de gaganants
		foreach($panier_gagnant as $gagnant)
		{
			$nbgagnant = $nbgagnant + $gagnant->getNbticket();
		}
		$motiercagnote = floor(($souscategorie->getCagnote()*50)/100); //montant à partager
		if($nbgagnant > 0)
		{
			$montantgagnant = floor($motiercagnote/$nbgagnant); //montant par gagnant. 
		}else{
			$montantgagnant = 0;
		}
		foreach($panier_gagnant as $gagnant)
		{
			$gagnant->getUser()->setSoldetransit($gagnant->getUser()->getSoldetransit() + ($montantgagnant * $gagnant->getNbticket()));
			$gagnant->setGain($gagnant->getGain() + ($montantgagnant * $gagnant->getNbticket()));
		}
		$souscategorie->setNbgagnant($nbgagnant);
		$em->flush();
		
		
		//---------------------------------------------------
		$panier_gagnant = $em->getRepository('ProduitProduitBundle:Panier') //Les gagnants de quatre maths
	                         ->getPanierScategorieGagnantQuartre($souscategorie->getId());
		$nbgagnant = 0; //nombre de gaganants
		foreach($panier_gagnant as $gagnant)
		{
			$nbgagnant = $nbgagnant + $gagnant->getNbticket();
		}
		$motiercagnote = floor(($souscategorie->getCagnote()*40)/100); //montant à partager
		if($nbgagnant > 0)
		{
			$montantgagnant = floor($motiercagnote/$nbgagnant); //montant par gagnant. 
		}else{
			$montantgagnant = 0;
		}
		foreach($panier_gagnant as $gagnant)
		{
			$gagnant->getUser()->setSoldetransit($gagnant->getUser()->getSoldetransit() + ($montantgagnant * $gagnant->getNbticket()));
			$gagnant->setGain($gagnant->getGain() + ($montantgagnant * $gagnant->getNbticket()));
		}
		$em->flush();
		
		
		//---------------------------------------------------
		$panier_gagnant = $em->getRepository('ProduitProduitBundle:Panier') //Les gagnants de cinq maths
	                         ->getPanierScategorieGagnantCinq($souscategorie->getId());
		$nbgagnant = 0; //nombre de gaganants
		foreach($panier_gagnant as $gagnant)
		{
			$nbgagnant = $nbgagnant + $gagnant->getNbticket();
		}
		$motiercagnote = floor(($souscategorie->getCagnote()*10)/100); //montant à partager
		if($nbgagnant > 0)
		{
			$montantgagnant = floor($motiercagnote/$nbgagnant); //montant par gagnant. 
		}else{
			$montantgagnant = 0;
		}
		foreach($panier_gagnant as $gagnant)
		{
			$gagnant->getUser()->setSoldetransit($gagnant->getUser()->getSoldetransit() + ($montantgagnant * $gagnant->getNbticket()));
			$gagnant->setGain($gagnant->getGain() + ($montantgagnant * $gagnant->getNbticket()));
		}
		$souscategorie->setFermer(true);
		$em->flush();
		
		$liste_gagnant = $em->getRepository('UsersUserBundle:User') //Les gagnants de cinq maths
	                         ->findAllGagnant();
		foreach($liste_gagnant as $user)
		{
			$total = $user->getSoldetransit();
			$principal = floor(($user->getSoldetransit()*25)/100);
			$gain = $user->getSoldetransit() - $principal;
			$user->setSoldeprincipal($user->getSoldeprincipal() + $principal);
			$user->setSoldegain($user->getSoldegain() + $gain);
			$user->setNbgaim($user->getNbgaim() + 1);
			$user->setSoldetransit(0);
			
			//envoie d'email
			$siteweb = $this->container->getParameter('siteweb');
			$sitename = $this->container->getParameter('sitename');
			$emailadmin = $this->container->getParameter('emailadmin');
			
			$notif = new Notification();
			$notif->setTitre('Vous avez parié et gagné sur '.$sitename.' !');
			$notif->setContenu('Votre ticket de la journée du'.$souscategorie->getDatetext().' vous a permis de gagner une somme de '.$total.' Fcfa, repartie comme suit: </br> Compte principale : '.$principal.'Fcfa, </br> Compte Gains: '.$gain.'Fcfa');
			$notif->setUser($user);
			$em->persist($notif);
			$em->flush();
			
			
			if($service->email($user->getUsername()))
			{
				$mail = new Afmail();
				
				$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
				$mail->setSubject('Vous avez parié et gagné sur '.$sitename.' !'); 
				$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$user->name(40),'titre' => 'Vous avez parié et gagné sur '.$sitename.' !','contenu'=> 'Votre ticket de la journée du'.$souscategorie->getDatetext().' vous a permis de gagner une somme de '.$total.' Fcfa, repartie comme suit: </br> Compte principale : '.$principal.'Fcfa, </br> Compte Gains: '.$gain.'Fcfa')));
				$mail->setTextCharset('utf-8');
				$mail->setHTMLCharset('utf-8');
				$result = $mail->send(array($user->getUsername()));
			}
		}
		$this->get('session')->getFlashBag()->add('information','Succès !');
		return $this->redirect($this->generateUrl('users_adminuser_categorisation_produit_plateforme',array('id'=>$souscategorie->getId())));		
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec, L\'issue de toutes les rencontres de cette liste n\'est pas encore connue.');
		return $this->redirect($this->generateUrl('users_adminuser_categorisation_produit_plateforme',array('id'=>$souscategorie->getId())));
	}
}

public function listeprodarchiveAction(Souscategorie $souscategorie)
{
	$em = $this->getDoctrine()->getManager();
	$panier_trois = $em->getRepository('ProduitProduitBundle:Panier')
	                    ->getPanierTroisGagnant($souscategorie->getId());
	$panier_quatre = $em->getRepository('ProduitProduitBundle:Panier')
	                    ->getPanierQuartreGagnant($souscategorie->getId());
	$panier_cinq = $em->getRepository('ProduitProduitBundle:Panier')
	                    ->getPanierCinqGagnant($souscategorie->getId());
	$form = $this->createFormBuilder()->getForm();
	return $this->render('UsersAdminuserBundle:Categorie:listeprodarchive.html.twig', 
	array('souscategorie'=>$souscategorie,'panier_trois'=>$panier_trois,'panier_quatre'=>$panier_quatre,'panier_cinq'=>$panier_cinq,'form'=>$form->createView()));
}

public function addproduitaccueilAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$request = $this->get('request');
	$form = $this->createFormBuilder()->getForm();
	if ($request->getMethod() == 'POST'){
	$form->bind($request);
    if ($form->isValid()){
		if($produit->getValide() == true)
		{
			if($produit->getAvant() == true)
			{
				$produit->setAvant(false);
			}else{
				$produit->setAvant(true);
			}
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Echec ! état du produit invalide.');
		}
		$em->flush();
		return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie',array('id'=>$produit->getSouscategorie()->getId())));
	}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
	}
	}
	$this->get('session')->getFlashBag()->add('upgrade_prod',$produit->getId());
	$this->get('session')->getFlashBag()->add('upgrade_prod',$produit->getTitre());

	return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie',array('id'=>$produit->getSouscategorie()->getId())));
}

public function publierproduitadminAction(Produit $produit, $guide)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$request = $this->get('request');
	$form = $this->createFormBuilder()->getForm();
	if ($request->getMethod() == 'POST'){
	$form->bind($request);
    if ($form->isValid()){
	if($guide == 0)
	{
		if($produit->getGuide() == false)
		{
			if($produit->getValide() == true)
			{
				$produit->setValide(false);
			}else{
				$produit->setValide(true);
			}
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Echec ! Vous ne pouvez pas publier un guide de rédaction de cours.');
		}
	}else{
		if($produit->getGuide() == true)
		{
			$produit->setGuide(false);
		}else{
			$produit->setGuide(true);
		}
		$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès !');
	}
	
	$em->flush();
	
	return $this->redirect($this->generateUrl('users_adminuser_prod_invalide_courant_souscategorie',array('id'=>$produit->getSouscategorie()->getId())));
	}else{
	$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
	}
	}
	$this->get('session')->getFlashBag()->add('valide_prod',$produit->getId());
	$this->get('session')->getFlashBag()->add('valide_prod',$guide);
	$this->get('session')->getFlashBag()->add('valide_prod',$produit->getTitre());
	
	if($produit->getValide() == true)
	{
	return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie',array('id'=>$produit->getSouscategorie()->getId())));
	}else{
	return $this->redirect($this->generateUrl('users_adminuser_prod_invalide_courant_souscategorie',array('id'=>$produit->getSouscategorie()->getId())));
	}
}

public function altersouscategorieAction(Souscategorie $souscategorie)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
    $formsouscat = $this->createForm(new SouscategorieType, $souscategorie);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$formsouscat->bind($request);
	$souscategorie->setServicetext($service);
    if ($formsouscat->isValid()){
    $em->flush();
	$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
	}else{
	$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
	}
	}
	return $this->render('UsersAdminuserBundle:Categorie:modificationsouscategorie.html.twig',
	array('formcat'=>$formsouscat->createView(),'scat'=>$souscategorie));
}
public function catalogueAction()
{
	$em = $this->getDoctrine()->getManager();
	$liste_cat = $em->getRepository('ProduitProduitBundle:Categorie')
	                ->myFindAll();
	$repositorie = $em->getRepository('ProduitProduitBundle:Produit');
	$plus_vendu = $repositorie->topProduit(5);
	$plus_like = $repositorie->topLike(5);
	return $this->render('ProduitProduitBundle:Categorie:catalogue.html.twig',
	array('liste_cat'=>$liste_cat,'plus_vendu'=>$plus_vendu,'plus_like'=>$plus_like));
}
}