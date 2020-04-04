<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace Produit\ProduitBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Users\UserBundle\Entity\User;
use Produit\ProduitBundle\Entity\Panier;
use Produit\ProduitBundle\Entity\Produitpanier;
use Produit\ProduitBundle\Entity\Composexercice;
use Produit\ProduitBundle\Entity\Compospratique;
use Produit\ProduitBundle\Form\ComposexerciceType;
use Produit\ProduitBundle\Form\CompospratiqueType;
use Produit\ProduitBundle\Entity\Produit;
use Produit\ProduitBundle\Entity\Exercicepartie;
use Produit\ProduitBundle\Entity\Pratiquechapitre;
use Users\UserBundle\Entity\Notification;

use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;
use General\ServiceBundle\AfPdf\PDF;

class PanierController extends Controller
{
public function validationpayementAction(User $user)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$panier = $em->getRepository('ProduitProduitBundle:Panier')
				 ->findOneBy(array('user'=>$user,'payer'=>0));
	$coutpartie = 200;
	if($this->getUser() == $user and $panier != null and isset($_POST['montantparier']) and isset($_POST['monpanier']))
	{
		$scat = null;
		if($_POST['monpanier'] == $panier->numFacture() and count($panier->getProduitpaniers()) == 5)
		{
			$panier->getUser()->setSoldeprincipal($panier->getUser()->getSoldeprincipal() - ($_POST['montantparier']*$coutpartie));
			$panier->setNbticket($_POST['montantparier']);
			$panier->setMontant($coutpartie);
			$panier->setPayer(true);
			$panier->setDate(new \Datetime());
		
			$soustraire = 50*$_POST['montantparier'];
			$reste = $_POST['montantparier']*$coutpartie - $soustraire;

			foreach($panier->getProduitpaniers() as $propan)
			{
				$scat = $propan->getProduit()->getSouscategorie();
				break;
			}
			
			if($scat != null)
			{
				$scat->setCagnote($scat->getCagnote() + $reste);
				$scat->setGain($scat->getGain() + $soustraire);
				$scat->setServicetext($service);
			}
			$em->flush();
			
			$notif = new Notification();
			$notif->setTitre('Votre ticket N° '.$panier->numFacture().' a été validé avec succès !');
			$notif->setContenu('Nous vous tiendrons informer de vos gains une fois les résultats des rencontres de votre ticket connus.');
			$notif->setUser($panier->getUser());
			$em->persist($notif);
			$em->flush();
			
			//envoie d'email
			$siteweb = $this->container->getParameter('siteweb');
			$sitename = $this->container->getParameter('sitename');
			$emailadmin = $this->container->getParameter('emailadmin');
			if($service->email($panier->getUser()->getUsername()))
			{
				$mail = new Afmail();
				
				$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
				$mail->setSubject('Votre ticket N° '.$panier->numFacture().' a été validé avec succès !'); 
				$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$panier->getUser()->name(40),'titre' => 'Votre ticket N° '.$panier->numFacture().' a été validé avec succès !','contenu'=> 'Nous vous tiendrons informer de vos gains une fois les résultats des rencontres de votre ticket connus.')));
				$mail->setTextCharset('utf-8');
				$mail->setHTMLCharset('utf-8');
				$result = $mail->send(array($panier->getUser()->getUsername()));
			}
		}else{
			if(count($panier->getProduitpaniers()) != 5)
			{
				$this->get('session')->getFlashBag()->add('information','Vous devez avoir exactement 5rencontres sur votre ticket avant de valider.');
			}else{
				$this->get('session')->getFlashBag()->add('information','Erreur ! Les données reçues sont invalides.');
			}
		}
		
		if($scat != null)
		{
			return $this->redirect($this->generateUrl('produit_produit_liste_produit_souscategorie', array('id'=>$scat->getCategorie()->getId())));
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Erreur ! Les données reçues sont invalides.');
	}
	return $this->redirect($this->generateUrl('produit_produit_liste_produit_souscategorie'));
}

public function paniernonlivrerAction()
{
	$em = $this->getDoctrine()->getManager();
	$liste_panier = $em->getRepository('ProduitProduitBundle:Panier')
				       ->findBy(array('payer'=>1,'livrer'=>0),array('date'=>'desc'));
	$formsupp = $this->createFormBuilder()->getForm();
	return $this->render('UsersAdminuserBundle:Panier:paniernonlivrer.html.twig',array('liste_panier'=>$liste_panier,'formsupp'=>$formsupp->createView()));
}

public function contenupanierAction(Panier $panier)
{
	$em = $this->getDoctrine()->getManager();
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produitpanier')
				       ->myfindBy($panier->getId());
	return $this->render('UsersAdminuserBundle:Panier:contenupanier.html.twig',array('liste_produit'=>$liste_produit,'panier'=>$panier));
}

public function detailpartieAction()
{
	$em = $this->getDoctrine()->getManager();
	$session = $this->get('session');
	$id_categorie = $session->get('id_categorie');
		
	if($id_categorie == 0 or $id_categorie == null)
	{
		$categorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                    ->myFindOne();
	}else{
		$categorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                    ->find($id_categorie);
	}
	
	$liste_scat = new \Doctrine\Common\Collections\ArrayCollection();
	if($categorie != null)
	{
		$liste_scat = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                    ->findValideScatcourantCat($categorie->getId(),1,1);
	}
	
	$souscategorie = null;
	$compt = 1;
	foreach($liste_scat as $scat)
	{
		if($compt == 1)
		{
			$souscategorie = $scat;
		}
		$compt++;
	}
	if($souscategorie != null)
	{
		if($souscategorie->getDatetext() == date('d').'-'.date('m').'-'.date('Y'))
		{
			$souscategorie->setActive(true);
		}else{
			$souscategorie->setActive(false);
		}
	}
	if($this->getUser() != null)
	{
	$panier = $em->getRepository('ProduitProduitBundle:Panier')
	                 ->findOneBy(array('user'=>$this->getUser(),'payer'=>0));
	}else{
	$panier = null;	
	}
	$scatpan = null;
	if($panier != null)
	{
		foreach($panier->getProduitpaniers() as $propan)
		{
			$scatpan = $propan->getProduit()->getSouscategorie();
			if($scatpan->getDatetext() == date('d').'-'.date('m').'-'.date('Y'))
			{
				if(($propan->getProduit()->getHeure() > date('H')) or ($propan->getProduit()->getHeure() == date('H') and $propan->getProduit()->getMinute() >= date('i')))
				{
					$scatpan->setActive(true);
				}else{
					$scatpan->setActive(false);
					break;
				}
			}else{
				$scatpan->setActive(false);
				break;
			}
		}
	}
	return $this->render('ProduitProduitBundle:Panier:detailpartie.html.twig', array('souscategorie'=>$souscategorie,'panier'=>$panier,'scatpan'=>$scatpan));
}

public function livraisonpanierAction(Panier $panier)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		if($panier->getLivrer() == false)
		{
			$panier->setLivrer(true);
			
			foreach($panier->getProduitpaniers() as $propan)
			{
				$propan->getProduit()->setActive(false);
			}
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Validation effectuée avec succès !');
		}
	}else{
		$this->get('session')->getFlashBag()->add('valide_prod',$panier->getId());
	    $this->get('session')->getFlashBag()->add('valide_prod',$panier->numFacture());
		}
	return $this->redirect($this->generateUrl('users_adminuser_liste_panier_non_livrer'));
}

public function panierlivrerAction()
{
	$em = $this->getDoctrine()->getManager();
	$liste_panier = $em->getRepository('ProduitProduitBundle:Panier')
				       ->findBy(array('payer'=>1,'livrer'=>1),array('date'=>'desc'));
	return $this->render('UsersAdminuserBundle:Panier:panierlivrer.html.twig',array('liste_panier'=>$liste_panier));
}

public function detailpanieruserAction(Panier $panier, Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produitpanier')
				       ->myfindBy($panier->getId());
	$topcat = $em->getRepository('ProduitProduitBundle:Souscategorie')
	             ->topsouscategorie(8);
					 
	$liste_part = $em->getRepository('ProduitProduitBundle:Partiecours')
	                      ->findBy(array('produit'=>$produit), array('rang'=>'asc'));
	foreach($liste_part as $part)
	{
		$part->setEm($em);
	}
	
	$liste_chapter = $em->getRepository('ProduitProduitBundle:Chapitrecours')
						->listechapitrecours($produit->getId());
	$service = $this->container->get('general_service.servicetext');
	$bareme = $service->getBareme();

	foreach($liste_chapter as $chap)
	{
		$chap->setEm($em);
	}
	
	$prodpan = null;
	foreach($panier->getProduitpaniers() as $propan)
	{
		if($propan->getProduit() == $produit)
		{
			$prodpan = $propan;
			break;
		}
	}
	
	return $this->render('ProduitProduitBundle:Panier:detailpanieruser.html.twig',
	array('liste_produit'=>$liste_produit,'prodpan'=>$prodpan,'user'=>$panier->getUser(),'bareme'=>$bareme,'produit'=>$produit,'panier'=>$panier,'liste_part'=>$liste_part,'liste_chapter'=>$liste_chapter,'topcat'=>$topcat));
}

public function detailexerciceAction(Exercicepartie $exercice, Panier $panier, $ident)
{
	$chapitre = $exercice->getChapitrecours();
	$em = $this->getDoctrine()->getManager();
	if(($panier->getValide() == true and $panier->getChapitrecours() == null) or ($panier->getValide() == true and $panier->getChapitrecours() == $chapitre) or $this->getUser() == $chapitre->getPartiecours()->getProduit()->getUser())
	{
		$accessressource = true;
	}else{
		$accessressource = false;
	}
	
	$liste_chapter = $em->getRepository('ProduitProduitBundle:Chapitrecours')
						->listechapitrecours($chapitre->getPartiecours()->getProduit()->getId());
	$prechapter = null;			
	foreach($liste_chapter as $chapter)
	{
		if($chapter == $chapitre)
		{
			break;
		}else{
			$prechapter = $chapter;
			$chapter->setEm($em);
		}
	}
	$chapitre->setEm($em);
	
	$prodpan = null;
	foreach($panier->getProduitpaniers() as $propan)
	{
		if($propan->getProduit() == $chapitre->getPartiecours()->getProduit())
		{
			$prodpan = $propan;
			break;
		}
	}
	
	$composexercice = null;
	$formmodif = null;
	if($prodpan != null)
	{
		$composexercice = $em->getRepository('ProduitProduitBundle:Composexercice')
						     ->findOneBy(array('exercicepartie'=>$exercice,'produitpanier'=>$prodpan));
		$formmodif = $this->createForm(new ComposexerciceType(), $composexercice);
		$formmodif = $formmodif->createView();
	}
	$service = $this->container->get('general_service.servicetext');
	$compos = new Composexercice($service);
	$form = $this->createForm(new ComposexerciceType(), $compos); 
	$bareme = $service->getBareme();
	$noteminexo = $this->container->getParameter('noteminexo');
	$repeat = $this->container->getParameter('repeattime');
	$waittime = 0;
	if($composexercice != null)
	{
		$waittime = floor($repeat - floor((time() - $composexercice->getLastvalidation())/3600));
	}
	return $this->render('ProduitProduitBundle:Panier:detailexercice.html.twig',
	array('exercice'=>$exercice,'chapitre'=>$chapitre,'waittime'=>$waittime,'bareme'=>$bareme,'form'=>$form->createView(),
	'formmodif'=>$formmodif,'composexercice'=>$composexercice,'prechapter'=>$prechapter,'prodpan'=>$prodpan,'noteminexo'=>$noteminexo,
	'panier'=>$panier,'accessressource'=>$accessressource,'ident'=>$ident));
}

public function addnewcopieexerciceAction(Exercicepartie $exercice, Produitpanier $prodpan)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	$compos = new Composexercice($service);
	$form = $this->createForm(new ComposexerciceType(), $compos); 
	$request = $this->get('request');
	if($request->getMethod() == 'POST' and $this->getUser() == $prodpan->getPanier()->getUser()){
		$form->bind($request);
		if($form->isValid()){
			$compos->setProduitpanier($prodpan);
			$compos->setExercicepartie($exercice);
			$em->persist($compos);
			$em->flush();

			$this->get('session')->getFlashBag()->add('information','Votre copie a été enregistrée avec succès !');

		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
		}
	}
	return $this->redirect($this->generateUrl('users_user_detail_panier_user', array('panier'=>$prodpan->getPanier()->getId(),'produit'=>$prodpan->getProduit()->getId())));
}

public function ajoutcopietpAction(Pratiquechapitre $pratique, Produitpanier $prodpan)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	$compos = new Compospratique($service);
	$form = $this->createForm(new CompospratiqueType(), $compos); 
	$request = $this->get('request');
	if($request->getMethod() == 'POST' and $this->getUser() == $prodpan->getPanier()->getUser()){
		$form->bind($request);
		if($form->isValid()){
			$compos->setProduitpanier($prodpan);
			$compos->setPratiquechapitre($pratique);
			$em->persist($compos);
			$em->flush();

			$this->get('session')->getFlashBag()->add('information','Votre copie a été enregistrée avec succès !');

		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
		}
	}
	return $this->redirect($this->generateUrl('users_user_detail_panier_user', array('panier'=>$prodpan->getPanier()->getId(),'produit'=>$prodpan->getProduit()->getId())));
}

public function altercopieexerciceAction(Composexercice $compos)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$prodpan = $compos->getProduitpanier();
	$formmodif = $this->createForm(new ComposexerciceType(), $compos); 
	$request = $this->get('request');
	if($request->getMethod() == 'POST' and $this->getUser() == $prodpan->getPanier()->getUser()){
		$formmodif->bind($request);
		$compos->setServicetext($service);
		if($formmodif->isValid()){
			$em->flush();

			$this->get('session')->getFlashBag()->add('information','Modification de votre copie effectuée avec succès !');

		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
		}
	}
	return $this->redirect($this->generateUrl('users_user_detail_panier_user', array('panier'=>$prodpan->getPanier()->getId(),'produit'=>$prodpan->getProduit()->getId())));
}

public function modificationcopietpAction(Compospratique $compos)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$prodpan = $compos->getProduitpanier();
	$formmodif = $this->createForm(new CompospratiqueType(), $compos); 
	$request = $this->get('request');
	if($request->getMethod() == 'POST' and $this->getUser() == $prodpan->getPanier()->getUser()){
		$formmodif->bind($request);
		$compos->setServicetext($service);
		if($formmodif->isValid()){
			$em->flush();

			$this->get('session')->getFlashBag()->add('information','Modification de votre copie effectuée avec succès !');

		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
		}
	}
	return $this->redirect($this->generateUrl('users_user_detail_panier_user', array('panier'=>$prodpan->getPanier()->getId(),'produit'=>$prodpan->getProduit()->getId())));
}

public function updatenoteexerciceAction(Composexercice $compos)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['val']) and $compos->getProduitpanier()->getProduit()->getUser() == $this->getUser())
	{
		$compos->setNote($_POST['val']);
		$compos->setLastvalidation(time());
		$em->flush();
		echo 1;
		exit;
	}else{
		echo 1;
		exit;
	}
}

public function updatenotetpAction(Compospratique $compos)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['val']) and $compos->getProduitpanier()->getProduit()->getUser() == $this->getUser())
	{
		$compos->setNote($_POST['val']);
		$compos->setLastvalidation(time());
		$em->flush();
		echo 1;
		exit;
	}else{
		echo 1;
		exit;
	}
}

public function detailpartiqueAction(Pratiquechapitre $pratique, Panier $panier, $ident)
{
	$chapitre = $pratique->getChapitrecours();
	$em = $this->getDoctrine()->getManager();
	if(($panier->getValide() == true and $panier->getChapitrecours() == null) or ($panier->getValide() == true and $panier->getChapitrecours() == $chapitre) or $this->getUser() == $chapitre->getPartiecours()->getProduit()->getUser())
	{
		$accessressource = true;
	}else{
		$accessressource = false;
	}
	
	$liste_chapter = $em->getRepository('ProduitProduitBundle:Chapitrecours')
						->listechapitrecours($chapitre->getPartiecours()->getProduit()->getId());
	$prechapter = null;			
	foreach($liste_chapter as $chapter)
	{
		if($chapter == $chapitre)
		{
			break;
		}else{
			$prechapter = $chapter;
			$chapter->setEm($em);
		}
	}
	$chapitre->setEm($em);
	
	$prodpan = null;
	foreach($panier->getProduitpaniers() as $propan)
	{
		if($propan->getProduit() == $chapitre->getPartiecours()->getProduit())
		{
			$prodpan = $propan;
			break;
		}
	}
	
	$compospratique = null;
	$formmodif = null;
	if($prodpan != null)
	{
		$compospratique = $em->getRepository('ProduitProduitBundle:Compospratique')
						     ->findOneBy(array('pratiquechapitre'=>$pratique,'produitpanier'=>$prodpan));
		$formmodif = $this->createForm(new CompospratiqueType(), $compospratique);
		$formmodif = $formmodif->createView();
	}
	$service = $this->container->get('general_service.servicetext');
	$compos = new Compospratique($service);
	$form = $this->createForm(new CompospratiqueType(), $compos); 
	$bareme = $service->getBareme();
	$noteminexo = $this->container->getParameter('noteminexo');
	$repeat = $this->container->getParameter('repeattime');
	$waittime = 0;
	if($compospratique != null)
	{
		$waittime = floor($repeat - floor((time() - $compospratique->getLastvalidation())/3600));
	}
	return $this->render('ProduitProduitBundle:Panier:detailpartique.html.twig',
	array('pratique'=>$pratique,'chapitre'=>$chapitre,'waittime'=>$waittime,'bareme'=>$bareme,'form'=>$form->createView(),
	'formmodif'=>$formmodif,'compospratique'=>$compospratique,'prechapter'=>$prechapter,'prodpan'=>$prodpan,'noteminexo'=>$noteminexo,
	'panier'=>$panier,'accessressource'=>$accessressource,'ident'=>$ident));
}

public function modifierlieulivraisonAction(Panier $panier)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['ville']))
	{
		$ville = $em->getRepository('ProduitServiceBundle:Ville')
				       ->findOneBy(array('nom'=>$_POST['ville']));
			if($ville != null)
			{
				$panier->setVille($ville);
				$em->flush();
			}
	}
	return $this->redirect($this->generateUrl('produit_produit_reglement_commande_du_panier',array('id'=>$this->getUser()->getId())));
}

public function telechargerpanierAction(Panier $panier)
{
	$nameoffile = '/../../../'.$panier->getWebPath();
	return $this->redirect($nameoffile);
}

public function supprimerpanierAction(Panier $panier)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		foreach($panier->getProduitpaniers() as $propan)
		{
			$em->remove($propan);
			if(file_exists ($panier->getUploadRootDir().'/'.$panier->numFacture().'.pdf'))
			{
			unlink($panier->getUploadRootDir().'/'.$panier->numFacture().'.pdf');
			}
			$em->remove($panier);
			$em->flush();
		}
		$this->get('session')->getFlashBag()->add('information','Réservation Supprimé avec succès !');
	}else{
		$this->get('session')->getFlashBag()->add('supprime_prod',$panier->getId());
	    $this->get('session')->getFlashBag()->add('supprime_prod',$panier->numFacture());
		}
	return $this->redirect($this->generateUrl('users_adminuser_liste_panier_non_livrer'));
}

}