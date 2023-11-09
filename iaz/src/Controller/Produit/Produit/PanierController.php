<?php
/*
	(c) Noel Kenfack <noel.kenfack@yahoo.fr> F�vrier 2015
*/
namespace App\Controller\Produit\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users\User\User;
use App\Entity\Users\User\Contacts;
use App\Entity\Produit\Produit\Panier;
use App\Entity\Users\User\Notification;
use App\Entity\Users\User\Billet;
use App\Form\Users\User\BilleteditType;
use App\Entity\Produit\Produit\Souscategorie;
use App\Entity\Produit\Service\Ville;
use App\Entity\Produit\Service\Pays;
use App\Entity\Produit\Service\Service;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Service\Email\Singleemail;

class PanierController extends AbstractController
{
private $params;
private $_servicemail;

public function __construct(ParameterBagInterface $params, Singleemail $servicemail)
{
	$this->params = $params;
	$this->_servicemail = $servicemail;
}
public function validationpayement(User $user)
{
	$em = $this->getDoctrine()->getManager();
	$panier = $em->getRepository(Panier::class)
				 ->findOneBy(array('user'=>$user,'payer'=>0));
	if($this->getUser() == $user and $panier != null)
	{
		if(isset($_GET['tel']) and isset($_GET['destination']) and isset($_GET['coastlivraison']))
		{
			$panier->setTel(htmlspecialchars($_GET['tel']));
			$panier->setDestination(htmlspecialchars($_GET['destination']));
			$panier->setLivraisonpayer(true);
			$panier->setCoastlivraison($_GET['coastlivraison']);
		}
		$panier->setPayer(true);
		$panier->setDate(new \Datetime());
		$em->flush();
		echo 1;
		exit;
	}else{
		echo 0;
		exit;
	}
}

public function paniernonlivrer()
{
	$em = $this->getDoctrine()->getManager();
	$liste_panier = $em->getRepository(Panier::class)
				       ->findBy(array('payer'=>1,'livrer'=>0),array('date'=>'desc'));
	return $this->render('Theme/Users/Adminuser/Panier/paniernonlivrer.html.twig',array('liste_panier'=>$liste_panier));
}

public function contenupanier(Panier $panier)
{
	$em = $this->getDoctrine()->getManager();
	$liste_produit = $em->getRepository(Produitpanier::class)
				       ->myfindBy($panier->getId());
	return $this->render('Theme/Users/Adminuser/Panier/contenupanier.html.twig',array('liste_produit'=>$liste_produit,'panier'=>$panier));
}

public function livraisonpanier(Panier $panier)
{
	$em = $this->getDoctrine()->getManager();
	if($panier->getLivrer() == false)
	{
		$panier->setLivrer(true);
		$em->flush();
	}
	return $this->redirect($this->generateUrl('users_adminuser_liste_panier_non_livrer'));
}

public function panierlivrer()
{
	$em = $this->getDoctrine()->getManager();
	$liste_panier = $em->getRepository(Panier::class)
				       ->findBy(array('payer'=>1,'livrer'=>1),array('date'=>'desc'));
	return $this->render('Theme/Users/Adminuser/Panier/panierlivrer.html.twig',array('liste_panier'=>$liste_panier));
}

public function detailpanieruser(Panier $panier)
{
	$em = $this->getDoctrine()->getManager();
	$liste_produit = $em->getRepository(Produitpanier::class)
				       ->myfindBy($panier->getId());
	$topcat = $em->getRepository(Souscategorie::class)
	                 ->topsouscategorie(8);
	return $this->render('Theme/Produit/Produit/Panier/detailpanieruser.html.twig',
	array('liste_produit'=>$liste_produit,'panier'=>$panier,'topcat'=>$topcat));
}

public function modifierlieulivraison(Panier $panier)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['ville']))
	{
		$ville = $em->getRepository(Ville::class)
					->findOneBy(array('nom'=>$_POST['ville']));
		if($ville != null)
		{
			$panier->setVille($ville);
			$em->flush();
		}
	}
	return $this->redirect($this->generateUrl('produit_produit_reglement_commande_du_panier',array('id'=>$this->getUser()->getId())));
}

public function parametrescommande(Panier $panier)
{
	$tarifht = 0;
	$tarifttc = 0;
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['montantht']) and isset($_POST['montantttc']))
	{
		$tarifht = $_POST['montantht'];
		$tarifttc = $_POST['montantttc'];
		$panier->setMontantht($tarifht);
		$panier->setMontantttc($tarifttc);
		$em->flush();
	}
	$namedns1 = $this->params->get('namedns1');
	$namedns2 = $this->params->get('namedns2');
	$registrat1 = $this->params->get('registrat1');
	$systemelg = $this->params->get('systemelg');
	$serveurmap = $this->params->get('serveurmap');
	$managerhosting = $this->params->get('managerhosting');
	$typesuivi = $this->params->get('typesuivi');
	
	return $this->render('Theme/Produit/Produit/Panier/parametrescommande.html.twig',
	array('panier'=>$panier,'namedns1'=>$namedns1,'namedns2'=>$namedns2,'registrat1'=>$registrat1,
	'systemelg'=>$systemelg,'managerhosting'=>$managerhosting,'serveurmap'=>$serveurmap,'typesuivi'=>$typesuivi));
}

public function contactspanier(Panier $panier, GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	$liste_pays = $em->getRepository(Pays::class)
	                 ->myfindAll();
	$liste_contact = new \Doctrine\Common\Collections\ArrayCollection();
	if($this->getUser() != null)
	{
		$liste_contact = $em->getRepository(Contacts::class)
							->findBy(array('user'=>$this->getUser()));
	}
	return $this->render('Theme/Produit/Produit/Panier/contactspanier.html.twig',
	array('panier'=>$panier,'liste_pays'=>$liste_pays,'liste_contact'=>$liste_contact));
}

public function savecontacts(Panier $panier, GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	$newaccount = false;
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}else{
		echo 1;
		exit;
	}
	
	if(isset($_POST['nom']) and $service->chaineValide($_POST['nom'], 2, 100))
	{
		$nom = $_POST['nom'];
	}else{
		echo 4;
		exit;
	}
	
	if(isset($_POST['prenom']) and $service->chaineValide($_POST['prenom'], 2, 100))
	{
		$prenom = $_POST['prenom'];
	}else{
		echo 5;
		exit;
	}
	
	if(isset($_POST['pays']))
	{
		$pays = $em->getRepository(Pays::class)
	                 ->find($_POST['pays']);
		if($pays == null)
		{
			echo 6;
			exit;
		}
	}else{
		echo 6;
		exit;
	}
	
	if(isset($_POST['email']) and $service->email($_POST['email']))
	{
		$email = $_POST['email'];
	}else{
		echo 9;
		exit;
	}
	
	if(isset($_POST['tel']) and $service->telephone($_POST['tel']))
	{
		$tel = $_POST['tel'];
	}else{
		echo 10;
		exit;
	}
	
	if(isset($_POST['newcompte']) and $_POST['newcompte'] == true)
	{
		if(isset($_POST['password']) and $service->password($_POST['password']))
		{
			$password = $_POST['password'];
			$newaccount = true;
		}else{
			echo 11;
			exit;
		}
	}
	
	if($panier->getContact() != null)
	{
		$contact = $panier->getContact();
	}else{
		$contact = new Contacts($service);
	}

	$contact->setType($type);
	$contact->setNom($nom);
	$contact->setPrenom($prenom);
	$contact->setPays($pays);
	$contact->setEmail($email);
	$contact->setTel($tel);
	$em->persist($contact);
	$panier->setContact($contact);
	$em->flush();
	
	if($newaccount == true and $this->getUser() == null)
	{
		$olduser = $em->getRepository(User::class)
	                  ->findOneBy(array('username'=>$email));
		if($olduser == null)
		{			
			$user = new User($service);
			$user->setNom($nom);
			$user->setPrenom($prenom);
			$user->setUsername($email);
			$user->setPassword($password);
			$user->setTel($tel);
			$user->setPays($pays);
			$em->persist($user);
			$panier->setUser($user);
			$contact->setUser($user);
			$em->flush();
			
			$session = $this->get('session');	
			$session->set('pid_user_panier',$user->getId());
			return $this->redirect($this->generateUrl('produit_produit_payement_commande_user', array('id'=>$panier->getId(), 'save'=>1)));
		}else{
			echo 12;
			exit;
		}
	}else{
		if($this->getUser() != null)
		{
			$panier->setUser($this->getUser());
			$contact->setUser($this->getUser());
			$em->flush();
		}
	}
	return $this->redirect($this->generateUrl('produit_produit_payement_commande_user', array('id'=>$panier->getId())));
}

public function paiementstep(Panier $panier, GeneralServicetext $service, $position, $save)
{
	$em = $this->getDoctrine()->getManager();
	if($position == 'contacts')
	{
		$liste_article = $em->getRepository(Service::class)
	                    ->myFindType('modepaiement');

		return $this->render('Theme/Produit/Produit/Panier/paiementstep.html.twig',
		array('panier'=>$panier,'save'=>$save,'liste_article'=>$liste_article));
	}else if($position == 'paiement')
	{
		if(isset($_POST['id']))
		{
			$article = $em->getRepository(Service::class)
						  ->find($_POST['id']);
			if($article != null)
			{
				$panier->setService($article);
				$panier->setSousmis(true);
				if(isset($_COOKIE["PIDCARD"]) and isset($_COOKIE["PIDCARDDUR"]))
				{
					// Stock les infos du cookie
					$cookie_info = array(
						'name'  => "PIDCARD",
						'value' => "empty",
						'time'  => $_COOKIE["PIDCARDDUR"]
					);
					setCookie($cookie_info['name'], $cookie_info['value'], $cookie_info['time'],'/');
				}
				
				//Email Client
				$siteweb = $this->params->get('siteweb');
				$sitename = $this->params->get('sitename');
				$emailadmin = $this->params->get('emailadmin');
				
				if($panier->getUser() != null)
				{
					// if($panier->getUser() != null and $service->email($panier->getUser()->getUsername()))
					// {
						// $mail = new Afmail();
						// $mail->setFrom($sitename.' <'.$emailadmin.'>'); 
						// $mail->setSubject($panier->getUser()->name(25).', Votre commande ID: '.$panier->numFacture().' a �t� enregistr�e avec succ�s !'); 
						// $mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('link'=>$siteweb.'/afh/card/bill/'.$panier->getId(),'nom'=>$panier->getUser()->name(25),'titre' => $panier->getUser()->name(25).', Votre commande ID: '.$panier->numFacture().' a �t� enregistr�e avec succ�s !','contenu'=>'Votre commande sera valid�s dans de plus bref d�lais.</br> </br> Pour faciliter cette �tape, proc�dez au transfert des frais de cette facture sur le compte choisi  ! </br></br> Vous pouvez � tout moment consulter l\'�tat de cette commande via le lien ci-dessous.')));
						// $mail->setTextCharset('utf-8');
						// $mail->setHTMLCharset('utf-8');
						// $result = $mail->send(array($panier->getUser()->getUsername()));
					// }
					
					/*Notification client.*/
					// $notification = new Notification($service);
					// $notification->setUser($panier->getUser());
					// $notification->setTitre($panier->getUser()->name(25).', Votre commande ID: '.$panier->numFacture().' a �t� enregistr� avec succ�s !');
					// $notification->setContenu('Votre commande sera valid�e dans de plus bref d�lais . </br> Pour faciliter cette �tape, proc�dez au transfert des frais de cette facture sur le compte choisi.');
					// $em->persist($notification);
					
					
					/*Email Admin*/
					// if($service->email($emailadmin))
					// {
						// $mail = new Afmail();
						// $mail->setFrom($panier->getUser()->name(30).' <'.$panier->getUser()->getUsername().'>'); 
						// $mail->setSubject($panier->getUser()->name(25).' a enregistr� une nouvelle commande sur '.$sitename.' !'); 
						// $mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('link'=>$siteweb.'/packagewebsiteadmin/afh/track/bill','nom'=>'Team '.$sitename,'titre' => $panier->getUser()->name(25).' a enregistr� une nouvelle commande sur '.$sitename.' !','contenu'=>'Cliquez sur le lien ci-dessous pour proc�der � la validation de cette commande.')));
						// $mail->setTextCharset('utf-8');
						// $mail->setHTMLCharset('utf-8');
						// $result = $mail->send(array($emailadmin));
					// }
				}
				$em->flush();
				
				echo 1;
				exit;
			}
		}
	}
	echo 0;
	exit;
}

public function cardbill(Panier $panier, GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	if($panier->getSousmis() == false)
	{
		$this->get('session')->getFlashBag()->add('information','Echec !!! La commande que vous essayez de consulter n\'est pas enc�re achv�e !');
		
		return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
	
	$liste_article = $em->getRepository(Service::class)
	                    ->myFindType('modepaiement');
	
	$billet = new Billet($service);
	$formbillet = $this->createForm(BilleteditType::class, $billet);

	if($request->getMethod() == 'POST')
	{
		$formbillet->bind($request);
		if ($formbillet->isValid() and $panier != null){
			$avisuser = 0;
			$billet->setUser($panier->getUser());
			$billet->setPanier($panier);
			
			if(isset($_POST['avisuser']))
			{
				$avisuser = $_POST['avisuser'];
			}
			
			$billet->setAvisuser($avisuser);
			$billet->setTitre('Avis Commande '.$panier->numFacture());
			$billet->setAvis(true);
			$em->persist($billet);
			$em->flush();
			
			$siteweb = $this->params->get('siteweb');
			$sitename = $this->params->get('sitename');
			$emailadmin = $this->params->get('emailadmin');

			$response = $this->_servicemail->sendNotifEmail(
				$panier->getUser()->name(25), //Nom du destinataire
				$emailadmin, //Email Destinataire
				$panier->getUser()->name(25).', Vient d\'ajouter un avis sur '.$sitename, //Objet de l'email
				$panier->getUser()->name(25).', Vient d\'ajouter un avis sur '.$sitename, //Grand Titre de l'email
				'Rendez-vous sur '.$sitename.' pour consulter cet avis.',  //Contenu de l'email
				$siteweb.'/afh/client/reviews'  //Lien à suivre
			);
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a �t� rencontr�e !');
		}
	}
	
	$liste_review = $em->getRepository(Billet::class)
	                   ->findBy(array('panier'=>$panier,'avis'=>1), array('date'=>'desc'));
		
	return $this->render('Theme/Produit/Produit/Panier/cardbill.html.twig',
	array('panier'=>$panier,'liste_article'=>$liste_article,'formbillet'=>$formbillet->createView(),
	'liste_review'=>$liste_review));
}

}