<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace Users\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Users\UserBundle\Entity\Billet;
use Users\UserBundle\Form\BilletType;
use Users\UserBundle\Entity\Notification;
use Users\UserBundle\Entity\Reponsebillet;
use Users\UserBundle\Entity\User;
use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;

class BilletController extends Controller
{
public function accueilbilletAction(User $user)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	$billet = new Billet($service);
	$formbillet = $this->createForm(new BilletType, $billet);
	$request = $this->getRequest();
	
	if ($request->getMethod() == 'POST')
	{
		$formbillet->bind($request);
		if ($formbillet->isValid()){
			$billet->setUser($user);
			$em->persist($billet);
			$em->flush();
			
			$siteweb = $this->container->getParameter('siteweb');
			$sitename = $this->container->getParameter('sitename');
			$emailadmin = $this->container->getParameter('emailadmin');
	
			$mail = new Afmail();
			
			$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
			$mail->setSubject($user->name(25).', Vient de créer un nouveau billet sur '.$sitename); 
			$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('link'=>$siteweb.'/user/afh/panel/'.$user->getId(),'nom'=>$user->name(30),'titre' => $user->name(25).', Vient de créer un nouveau billet sur '.$sitename,'contenu'=>'Rendez-vous sur '.$sitename.' afin de répondre à ce billet.')));
			$mail->setTextCharset('utf-8');
			$mail->setHTMLCharset('utf-8');
			$result = $mail->send(array($emailadmin));
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !');
		}
	}
	
	$liste_billet = $em->getRepository('UsersUserBundle:Billet')
	                      ->findBy(array('user'=>$user,'avis'=>0), array('date'=>'desc'));
	return $this->render('UsersUserBundle:Billet:accueilbillet.html.twig',
	array('user'=>$user, 'liste_billet'=>$liste_billet,'formbillet'=>$formbillet->createView()));
}

public function addnewreponseAction(Billet $billet, $position)
{
	$em = $this->getDoctrine()->getManager();

	$service = $this->container->get('general_service.servicetext');

	if(isset($_POST['reponse']))
	{
		$reponse = $_POST['reponse'];
	}else{
		$reponse = '';
	}

	if ($service->chaineValide($reponse, 2, 1500)){
		
		$reponsebillet = new Reponsebillet($service);
		$reponsebillet->setUser($this->getUser());
		$reponsebillet->setDescription($reponse);
		$reponsebillet->setBillet($billet);
		$em->persist($reponsebillet);
		$em->flush();
		
		$siteweb = $this->container->getParameter('siteweb');
		$sitename = $this->container->getParameter('sitename');
		$emailadmin = $this->container->getParameter('emailadmin');

		if($this->getUser() == $billet->getUser())
		{
			$mail = new Afmail();
			
			$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
			$mail->setSubject($billet->getUser()->name(25).', Vient d\'ajouter une réponse au billet '.$billet->getTitre()); 
			$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('link'=>$siteweb.'/user/afh/panel/'.$billet->getUser()->getId(),'nom'=>$billet->getUser()->name(30),'titre' => $billet->getUser()->name(25).', Vient d\'ajouter une réponse au billet '.$billet->getTitre(),'contenu'=>'Rendez-vous sur '.$sitename.' afin de répondre à ce billet.')));
			$mail->setTextCharset('utf-8');
			$mail->setHTMLCharset('utf-8');
			$result = $mail->send(array($emailadmin));
		}else{
			if($service->email($billet->getUser()->getUsername()))
			{
				$mail = new Afmail();
				
				$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
				$mail->setSubject($this->getUser()->name(25).', Vient d\'ajouter une réponse au billet '.$billet->getTitre()); 
				$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('link'=>$siteweb.'/user/afh/panel/'.$billet->getUser()->getId(),'nom'=>$billet->getUser()->name(30),'titre' => $this->getUser()->name(25).', Vient d\'ajouter une réponse au billet '.$billet->getTitre(),'contenu'=>'Rendez-vous sur '.$sitename.' afin de consulter sa réponse.')));
				$mail->setTextCharset('utf-8');
				$mail->setHTMLCharset('utf-8');
				$result = $mail->send(array($billet->getUser()->getUsername()));
			}
			
			$notification = new Notification($service);
			$notification->setUser($billet->getUser());
			$notification->setTitre($this->getUser()->name(25).', Vient d\'ajouter une réponse au billet '.$billet->getTitre());
			$notification->setDescription('Cliquez ici pour consulter la réponse à votre billet.');
			$em->persist($notification);
			$em->flush();
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !');
	}
	if($position == 1)
	{
		return $this->redirect($this->generateUrl('users_user_accueil_billet_user', array('id'=>$billet->getUser()->getId(),'position'=>4)));
	}else if($position == 2 and $billet->getPanier() != null)
	{
		return $this->redirect($this->generateUrl('produit_produit_afh_panier_bill', array('id'=>$billet->getPanier()->getId())));
	}else{
		return $this->redirect($this->generateUrl('produit_produit_afh_client_reviews'));
	}
}

public function updatebilletAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$billet = $em->getRepository('UsersUserBundle:Billet')
					->find($id);
	if($billet != null)
	{
	$formbillet = $this->createForm(new BilletType, $billet);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		$formbillet->bind($request);
		if ($formbillet->isValid()){
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_user_accueil_billet_user', array('id'=>$billet->getUser()->getId(),'position'=>4)));
	}
	return $this->render('UsersUserBundle:Billet:modificationbillet.html.twig',
	array('formbillet'=>$formbillet->createView(),'billet'=>$billet));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function updatereponseAction($id, $position)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	
	if(isset($_POST['reponse']))
	{
		$contenu = $_POST['reponse'];
	}else{
		$contenu = '';
	}
	$reponse = $em->getRepository('UsersUserBundle:Reponsebillet')
					->find($id);
	if($reponse != null)
	{
	$billet = $reponse->getBillet();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){

		if ($service->chaineValide($contenu, 2, 1500)){
			$reponse->setUser($this->getUser());
			$reponse->setDescription($contenu);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		
		if($position == 1)
		{
			return $this->redirect($this->generateUrl('users_user_accueil_billet_user', array('id'=>$billet->getUser()->getId(),'position'=>4)));
		}else if($position == 2 and $billet->getPanier() != null)
		{
			return $this->redirect($this->generateUrl('produit_produit_afh_panier_bill', array('id'=>$billet->getPanier()->getId())));
		}else{
			return $this->redirect($this->generateUrl('produit_produit_afh_client_reviews'));
		}
	}
	return $this->render('UsersUserBundle:Billet:updatereponse.html.twig',
	array('reponse'=>$reponse, 'position' => $position));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function aviscarouselAction()
{
	$em = $this->getDoctrine()->getManager();
	
	$liste_review = $em->getRepository('UsersUserBundle:Billet')
					->myFindTopReview(1,15);
	$repository = $em->getRepository('UsersUserBundle:Billet');				
	$nbOneAvis = $repository->getNbreAvisValeur(1);		
	$nbTwoAvis = $repository->getNbreAvisValeur(2);		
    $nbThreeAvis = $repository->getNbreAvisValeur(3);		
    $nbFourAvis = $repository->getNbreAvisValeur(4);	
    $nbFiveAvis = $repository->getNbreAvisValeur(5);	
    $nbAvisTotal = $repository->getTotalAvisUtilisateur();	
	/*
	$sommeOneAvis = $repository->getSommeAvisValeur(1);		
	$sommeTwoAvis = $repository->getSommeAvisValeur(2);		
    $sommeThreeAvis = $repository->getSommeAvisValeur(3);		
    $sommeFourAvis = $repository->getSommeAvisValeur(4);	
    $sommeFiveAvis = $repository->getSommeAvisValeur(5);*/
    $sommeAvisTotal = $repository->getSommeAvisValide();	
									
	return $this->render('UsersUserBundle:Billet:aviscarousel.html.twig',
	array('liste_review'=>$liste_review, 'nbOneAvis'=>$nbOneAvis, 'nbTwoAvis'=>$nbTwoAvis, 'nbThreeAvis'=>$nbThreeAvis, 
	'nbFourAvis'=>$nbFourAvis, 'nbFiveAvis'=>$nbFiveAvis,'nbAvisTotal'=>$nbAvisTotal,'sommeAvisTotal'=>$sommeAvisTotal,
	/*'sommeOneAvis'=>$sommeOneAvis, 'sommeTwoAvis'=>$sommeTwoAvis, 'sommeThreeAvis'=>$sommeThreeAvis, 'sommeFourAvis'=>$sommeFourAvis,
	'sommeFiveAvis'=>$sommeFiveAvis*/));
}
}