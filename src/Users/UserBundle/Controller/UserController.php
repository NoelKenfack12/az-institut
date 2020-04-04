<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*ce fichier est la proprieté de Zentsoft entreprise.
*/
namespace Users\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Users\UserBundle\Entity\User;
use Users\UserBundle\Form\UserType;
use Users\UserBundle\Entity\Imgprofil;
use Users\UserBundle\Entity\Imgcouverture;
use Users\UserBundle\Form\ImgprofilType;
use Users\UserBundle\Form\ImgcouvertureType;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\SecurityContext;
use Users\UserBundle\Entity\Newsletter;

use Produit\ProduitBundle\Entity\Souscategorie;
use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;
use Users\UserBundle\Entity\Notification;

class UserController extends Controller
{
public function inscriptionuserAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$request = $this->getRequest();
	// Si le visiteur est déjà identifié, on le redirige vers l'accueil
	if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
    return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
	$valid = false;	
	$user = new User($service);
	$form = $this->createForm(new UserType, $user);
	if($request->getMethod() == 'POST' and $this->getUser() == null){
    $form->bind($request);
	
	if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee'])){
		$date = ''.$_POST['jour'].'/'.$_POST['mois'].'/'.$_POST['annee'].'';
		if($service->mydate($date))
		{
			$user->setDatepicket($date);
			$valid = true;
		}
	}
	
    if ($form->isValid() and $valid == true){
	if (isset($_POST['genre']) and $_POST['genre'] == 'homme'){
	$user->setSexe(true);
	}
	if (isset($_POST['genre']) and $_POST['genre'] == 'femme'){
	$user->setSexe(false);
	}
	$em->persist($user);
    $em->flush();
	
	$oldemail = $em->getRepository('UsersUserBundle:Newsletter')
                    ->findBy(array('email'=>$user->getUsername()));
	if($oldemail == null)
	{
		$newsletter = new Newsletter();
		$newsletter->SetNom($user->getNom());
		$newsletter->SetEmail($user->getUsername());
		$em->persist($newsletter);
		$em->flush();
	}
		
    $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
    // On passe le token crée au service security context afin que l'utilisateur soit authentifié
    $this->get('security.context')->setToken($token);
	$this->get('session')->set('_security_users', serialize($token));
	
	return $this->redirect($this->generateUrl('users_user_user_accueil',array('id'=>$user->getId())));
	}
	$this->get('session')->getFlashBag()->add('inscription','Une erreur a été rencontrée !!!');
	}

	$allslide = $em->getRepository('UsersUserBundle:Imgslide')
	                      ->findSlideConnexion();
	$slide = $service->selectEntity($allslide);	
	
	$liste_formation = $em->getRepository('ProduitServiceBundle:Service')
	                        ->findBy(array('principal'=>1,'recrutement'=>1), array('rang'=>'desc'));
							
	$liste_formateur = $em->getRepository('UsersUserBundle:User')
	                        ->findFormateurs();
	
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                    ->findBy(array('valide'=>1,'avant'=>1), array('rang'=>'desc'));	
	
	$liste_valeur = $em->getRepository('ProduitServiceBundle:Infoentreprise')
	                   ->findBy(array('valeur'=>1), array('rang'=>'desc'));
					   
	$slideaccueil = $service->selectEntity($allslide);
	$liste_formation = $service->selectEntities($liste_formation, 3);
	$liste_formateur = $service->selectEntities($liste_formateur, 10);
	$liste_produit = $service->selectEntities($liste_produit, 4);
	$liste_valeur = $service->selectEntities($liste_valeur, 6);
	
	return $this->render('UsersUserBundle:User:inscriptionuser.html.twig',
	array('form'=>$form->createview(),'slide'=>$slide,'liste_valeur'=>$liste_valeur,'liste_formation'=>$liste_formation,'liste_formateur'=>$liste_formateur,'liste_produit'=>$liste_produit));
}

public function accueiluserAction(User $user)
{
	if($this->getUser() == $user or $user->getFormateur() == true)
	{

	$em = $this->getDoctrine()->getManager();
	if($this->getUser() == $user)
	{
	$user->setDatebeg(time());
	$em->flush();
	}
	
	$panier_payer = $em->getRepository('ProduitProduitBundle:Panier')
					   ->findBy(array('user'=>$user,'payer'=>1), array('date'=>'desc'));
	$service = $this->container->get('general_service.servicetext');
	
	$profil = new Imgprofil($service);
	$form = $this->createForm(new ImgprofilType, $profil);
	
	if($this->getUser() == $user)
	{
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
					   ->findBy(array('user'=>$user), array('date'=>'desc'));
	}else{
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
					   ->findBy(array('user'=>$user,'valide'=>true), array('date'=>'desc'));
	}
	$tab_scat = array();
	$i = 0;
	foreach($liste_produit as $produit)
	{
		if(!in_array($produit->getSouscategorie()->getId(),$tab_scat))
		{
			$tab_scat[$i] = $produit->getSouscategorie()->getId();
			$produit->getSouscategorie()->setNbprodinval($produit->getSouscategorie()->getNbprodinval() + 1);
			$i++;
		}else{
			$produit->getSouscategorie()->setNbprodinval($produit->getSouscategorie()->getNbprodinval() + 1);
		}
	}
	$liste_scat = $em->getRepository('ProduitProduitBundle:Souscategorie')
						  ->findBy(array('id'=>$tab_scat));	

	foreach($panier_payer as $panier)
	{
		foreach($panier->getProduitpaniers() as $propan)
		{
			$liste_chap = $em->getRepository('ProduitProduitBundle:Chapitrecours')
					            ->listechapitrecours($propan->getProduit()->getId());
			foreach($liste_chap as $chap)
			{
				$chap->setEm($em);
			}
			$propan->getProduit()->setEm($em);
		}
	}
	$notemin = $this->container->getParameter('notemin');
	return $this->render('UsersUserBundle:User:accueiluser.html.twig',
	array('user'=>$user,'form'=>$form->createView(),'bareme'=>$service->getBareme(),'notemin'=>$notemin,'liste_produit'=>$liste_produit,'liste_scat'=>$liste_scat,'panier_payer'=>$panier_payer));
    }else{
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
}

public function forumepingleAction(User $user)
{
	if($this->getUser() == $user)
	{
		return $this->render('UsersUserBundle:User:forumepingle.html.twig', array('user'=>$user));
	}else{
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
}

public function alertnoelAction()
{
	$em = $this->getDoctrine()->getManager();
	$oldprofil = $em->getRepository('ProduitServiceBundle:Curentwebsite')
	                ->FindAll();
	foreach($oldprofil as $prof)
	{
		$em->remove($prof);
		$em->flush();
	}
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
}

public function modifierprofilAction(User $user)
{
	if($this->getUser() != $user)
	{
		return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
	
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$request = $this->getRequest();
	$profil = new Imgprofil($service);
	$formprofil = $this->createForm(new ImgprofilType, $profil);
	
	$couverture = new Imgcouverture($service);
	$formcouverture = $this->createForm(new ImgcouvertureType, $couverture);
	if ($request->getMethod() == 'POST')
	{
		$formcouverture->bind($request);
		if ($formcouverture->isValid()){
			$oldcouverture = $em->getRepository('UsersUserBundle:Imgcouverture')
							->FindOneBy(array('user'=>$user));
			if(isset($_POST['public']) and isset($_POST['contact']) and isset($_POST['emailprof']))
			{
				if($_POST['public'] == true)
				{
					$user->setTelpublic(true);
				}else{
					$user->setTelpublic(true);
				}
				
				if($service->telephone($_POST['contact']))
				{
					$user->setTel($_POST['contact']);
				}
				if($service->email($_POST['emailprof']))
				{
					$user->setMailformateur($_POST['emailprof']);
				}
			}
			if(isset($_POST['diplome']))
			{
				$user->setDiplome(htmlspecialchars($_POST['diplome']));
			}
			if(isset($_POST['poste']))
			{
				$user->setPoste(htmlspecialchars($_POST['poste']));
			}
			if(isset($_POST['message']))
			{
				$user->setMessage($_POST['message']);
			}
			if ($oldcouverture === null)
			{
			$couverture->setUser($user);
			$couverture->setId($user->getId());
			$couverture->setServicetext($service);
			$em->persist($couverture);
			$em->flush();
			}else{
			$em->remove($oldcouverture);
			$em->flush();
			$couverture->setUser($user);
			$couverture->setId($user->getId());
			$couverture->setServicetext($service);
			$em->persist($couverture);
			$em->flush();
			}
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès !!!');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!! Vérifier la type du fichier');
		}
	}
	
	$liste_ville = $em->getRepository('ProduitServiceBundle:Ville')
					  ->myFindAll();
							
	return $this->render('UsersUserBundle:User:modifierprofil.html.twig',
	array('formprofil'=>$formprofil->createView(),'liste_ville'=>$liste_ville,'user'=>$user,'formcouverture'=>$formcouverture->createView()));
}

public function updateprofilAction(User $user)
{
	if($this->getUser() != $user)
	{
		return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
	
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$request = $this->getRequest();
	$profil = new Imgprofil($service);
	$formprofil = $this->createForm(new ImgprofilType, $profil);

	if ($request->getMethod() == 'POST')
	{
		$formprofil->bind($request);
		if ($formprofil->isValid()){
			$oldprofil = $em->getRepository('UsersUserBundle:Imgprofil')
							->FindOneBy(array('user'=>$user));
			if(isset($_POST['contact']))
			{
				if($service->telephone($_POST['contact']))
				{
					$user->setTel($_POST['contact']);
				}
			}

			if(isset($_POST['ville']))
			{
				$ville = $em->getRepository('ProduitServiceBundle:Ville')
					        ->find($_POST['ville']);
				if($ville != null)
				{
					$user->setVille($ville);
				}
			}

			if($oldprofil === null)
			{
				$profil->setUser($user);
				$profil->setId($user->getId());
				$profil->setServicetext($service);
				$em->persist($profil);
				$em->flush();
			}else{
				$em->remove($oldprofil);
				$em->flush();
				$profil->setUser($user);
				$profil->setId($user->getId());
				$profil->setServicetext($service);
				$em->persist($profil);
				$em->flush();
			}
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès !!!');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!! Vérifier la type du fichier');
		}
	}
	return $this->redirect($this->generateUrl('users_user_modifier_profil', array('id'=>$user->getId())));
}

public function banniereuserAction(User $user)
{
	$em = $this->getDoctrine()->getManager();
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
					        ->findBy(array('user'=>$user,'valide'=>true));
	$liste_panier = $em->getRepository('ProduitProduitBundle:Panier')
					   ->getPanierProduitUser($user->getId());						
	return $this->render('UsersUserBundle:User:banniereuser.html.twig',
	array('user'=>$user,'liste_produit'=>$liste_produit,'liste_panier'=>$liste_panier));
}

public function ajouteradminAction()
{
	$em = $this->getDoctrine()->getManager();
	$request = $this->getRequest();
	if ($request->getMethod() == 'POST' and isset($_POST['_username']) and isset($_POST['_password'])){
		$username = $this->container->getParameter('username');
		$password = $this->container->getParameter('password');
		if($_POST['_username'] == $username and $_POST['_password'] == $password and $this->getUser() != null)
		{
			$this->getUser()->addRole('ROLE_ADMIN');
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Administrateur enregistré avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Le mot de passe ou le nom d\'utilisateur est incorect.');
		}
		return $this->render('UsersUserBundle:User:ajouteradmin.html.twig');
    }
	$liste_user = $em->getRepository('UsersUserBundle:User')
	                 ->findAll();
	$exist = false;
	foreach($liste_user as $user)
	{
		if (in_array('ROLE_ADMIN', $user->getRoles())){
            $exist = true;
			break;
        }
	}
	if($exist == true)
	{
		return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}else{
		return $this->render('UsersUserBundle:User:ajouteradmin.html.twig');
	}
}

public function nouveauadminAction()
{
	$em = $this->getDoctrine()->getManager();
	$request = $this->getRequest();
	$formsupp = $this->createFormBuilder()->getForm(); 
	if ($request->getMethod() == 'POST' and isset($_POST['username']) and isset($_POST['roleuser']))
	{
		$userrole = $em->getRepository('UsersUserBundle:User')
	                 ->findOneBy(array('username'=>$_POST['username']));
		if($userrole != null and !in_array($_POST['roleuser'], ($userrole->getRoles())))
		{
			$userrole->addRole($_POST['roleuser']);
			if($_POST['roleuser'] == 'ROLE_FORMATEUR')
			{
				$userrole->setFormateur(true);
			}
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Rôle '.$_POST['roleuser'].' ajouté avec succès à '.$userrole->name(20));
		}
	}
	$liste_user = $em->getRepository('UsersUserBundle:User')
	                 ->findAll();
	$newcollection = new \Doctrine\Common\Collections\ArrayCollection();
	foreach($liste_user as $user)
	{
		if(in_array('ROLE_ADMIN', $user->getRoles()) or in_array('ROLE_GESTION', $user->getRoles()) or in_array('ROLE_FORMATEUR', $user->getRoles())){
            $newcollection[] = $user;
        }
	}
	return $this->render('UsersAdminuserBundle:User:nouveauadmin.html.twig',array('liste_user'=>$newcollection,'formsupp'=>$formsupp->createView()));
}

public function eleveroleAction(User $user, $idrole)
{
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->getRequest();
	$em = $this->getDoctrine()->getManager();
	if ($request->getMethod() == 'POST'){
	$formsupp->bind($request);
	if ($formsupp->isValid()){
		if($idrole == 1)
		{
			$user->removeRole('ROLE_GESTION');
		}
		if($idrole == 2)
		{
			$user->removeRole('ROLE_FORMATEUR');
			$user->setFormateur(false);
		}
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Rôle supprimé avec succès !!!');
	}
	}else{
		if($idrole == 1)
		{
			$role = "ROLE_GESTION à ";
		}
		if($idrole == 2)
		{
			$role = "ROLE_FORMATEUR à ";
		}
		$this->get('session')->getFlashBag()->add('supprime_role',$user->getId());
		$this->get('session')->getFlashBag()->add('supprime_role',$idrole);
		$this->get('session')->getFlashBag()->add('supprime_role',$role.' '.$user->name(20));
	}
	return $this->redirect($this->generateUrl('users_adminuser_ajout_nouveau_admin'));
}
public function accueilcommandeuserAction(User $user)
{
	if($this->getUser() == $user or $this->get('security.context')->isGranted('ROLE_GESTION'))
	{
		$em = $this->getDoctrine()->getManager();
	    $liste_panier = $em->getRepository('ProduitProduitBundle:Panier')
						   ->getPanierProduitUser($user->getId());
		$service = $this->container->get('general_service.servicetext');
		foreach($liste_panier as $panier)
		{
			foreach($panier->getProduitpaniers() as $propan)
			{
				$liste_chap = $em->getRepository('ProduitProduitBundle:Chapitrecours')
									->listechapitrecours($propan->getProduit()->getId());
				foreach($liste_chap as $chap)
				{
					$chap->setEm($em);
				}
				$propan->getProduit()->setEm($em);
			}
		}
		$notemin = $this->container->getParameter('notemin');
		return $this->render('UsersUserBundle:User:accueilcommandeuser.html.twig',
		array('user'=>$user,'liste_panier'=>$liste_panier,'bareme'=>$service->getBareme(),'notemin'=>$notemin));
	}else{
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
}
public function soldergainuserAction(Souscategorie $scat, User $user)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_POST['montant']) and is_numeric($_POST['montant']))
	{
		if($user->getSoldegain() >= $_POST['montant'])
		{
			$user->setSoldegain($user->getSoldegain() - $_POST['montant']);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Le solde des gain de '.$user->name(20).' a été mis à jour avec succès');
			
			//envoie d'email
			$siteweb = $this->container->getParameter('siteweb');
			$sitename = $this->container->getParameter('sitename');
			$emailadmin = $this->container->getParameter('emailadmin');
			
			$notif = new Notification();
			$notif->setTitre('Vous avez reçu un tranfert de '.$_POST['montant'].'FCFA de la part de '.$sitename.' !');
			$notif->setContenu('Merci pour votre confiance renouvelée !');
			$notif->setUser($user);
			$em->persist($notif);
			$em->flush();
			
			
			if($service->email($user->getUsername()))
			{
				$mail = new Afmail();
				
				$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
				$mail->setSubject('Vous avez reçu un tranfert de '.$_POST['montant'].'FCFA de la part de '.$sitename.' !'); 
				$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$user->name(40),'titre' => 'Vous avez reçu un tranfert de '.$_POST['montant'].'FCFA de la part de '.$sitename.' !','contenu'=> 'Merci pour votre confiance renouvelée !')));
				$mail->setTextCharset('utf-8');
				$mail->setHTMLCharset('utf-8');
				$result = $mail->send(array($user->getUsername()));
			}
		}else{
			$this->get('session')->getFlashBag()->add('information','Echec ! Le montant indiqué est superieur au solde gain de '.$user->name(20).'.');
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec ! Les données envoyés sont invalides.');
	}
	return $this->redirect($this->generateUrl('users_adminuser_allprod_archive_courant_souscategorie', array('id'=>$scat->getId())));
}
}