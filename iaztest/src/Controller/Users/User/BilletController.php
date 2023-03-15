<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace App\Controller\Users\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users\User\Billet;
use App\Form\Users\User\BilletType;
use App\Entity\Users\User\Notification;
use App\Entity\Users\User\Reponsebillet;
use App\Entity\Users\User\User;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Service\Email\Singleemail;

class BilletController extends AbstractController
{
private $params;
private $_servicemail;

public function __construct(ParameterBagInterface $params, Singleemail $servicemail)
{
	$this->params = $params;
	$this->_servicemail = $servicemail;
}

public function accueilbillet(GeneralServicetext $service, User $user, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	
	$billet = new Billet($service);
	$formbillet = $this->createForm(BilletType::class, $billet);

	if ($request->getMethod() == 'POST')
	{
		$formbillet->handleRequest($request);
		if ($formbillet->isValid()){
			$billet->setUser($user);
			$em->persist($billet);
			$em->flush();
			
			$siteweb = $this->params->get('siteweb');
			$sitename = $this->params->get('sitename');
			$emailadmin = $this->params->get('emailadmin');
	
			$response = $this->_servicemail->sendNotifEmail(
				$panier->getUser()->name(25), //Nom du destinataire
				$emailadmin, //Email Destinataire
				$user->name(25).', Vient de créer un nouveau billet sur '.$sitename, //Objet de l'email
				$user->name(25).', Vient de créer un nouveau billet sur '.$sitename, //Grand Titre de l'email
				'Rendez-vous sur '.$sitename.' afin de répondre à ce billet.',  //Contenu de l'email
				$siteweb.'/user/afh/panel/'.$user->getId()  //Lien à suivre
			);
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !');
		}
	}
	
	$liste_billet = $em->getRepository(Billet::class)
	                   ->findBy(array('user'=>$user,'avis'=>0), array('date'=>'desc'));
	return $this->render('Theme/Users/User/Billet/accueilbillet.html.twig',
	array('user'=>$user, 'liste_billet'=>$liste_billet,'formbillet'=>$formbillet->createView()));
}

public function addnewreponse(Billet $billet, GeneralServicetext $service, $position)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['reponse']))
	{
		$reponse = $_POST['reponse'];
	}else{
		$reponse = '';
	}

	if($service->chaineValide($reponse, 2, 1500)){
		$reponsebillet = new Reponsebillet($service);
		$reponsebillet->setUser($this->getUser());
		$reponsebillet->setDescription($reponse);
		$reponsebillet->setBillet($billet);
		$em->persist($reponsebillet);
		$em->flush();
		
		$siteweb = $this->params->get('siteweb');
		$sitename = $this->params->get('sitename');
		$emailadmin = $this->params->get('emailadmin');

		if($this->getUser() == $billet->getUser())
		{
			$response = $this->_servicemail->sendNotifEmail(
				$billet->getUser()->name(25), //Nom du destinataire
				$emailadmin, //Email Destinataire
				$billet->getUser()->name(25).', Vient d\'ajouter une réponse au billet '.$billet->getTitre(), //Objet de l'email
				$billet->getUser()->name(25).', Vient d\'ajouter une réponse au billet '.$billet->getTitre(), //Grand Titre de l'email
				'Rendez-vous sur '.$sitename.' afin de répondre à ce billet.',  //Contenu de l'email
				$siteweb.'/user/afh/panel/'.$billet->getUser()->getId()  //Lien à suivre
			);
		}else{
			if($service->email($billet->getUser()->getUsername()))
			{
				$response = $this->_servicemail->sendNotifEmail(
					$billet->getUser()->name(30), //Nom du destinataire
					$billet->getUser()->getUsername(), //Email Destinataire
					$this->getUser()->name(25).', Vient d\'ajouter une réponse au billet '.$billet->getTitre(), //Objet de l'email
					$this->getUser()->name(25).', Vient d\'ajouter une réponse au billet '.$billet->getTitre(), //Grand Titre de l'email
					'Rendez-vous sur '.$sitename.' afin de consulter sa réponse.',  //Contenu de l'email
					$siteweb.'/user/afh/panel/'.$billet->getUser()->getId()  //Lien à suivre
				);
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

public function updatebillet(Request $request, GeneralServicetext $service, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$billet = $em->getRepository(Billet::class)
					->find($id);
	if($billet != null)
	{
	$formbillet = $this->createForm(BilletType::class, $billet);

	if ($request->getMethod() == 'POST'){
		$formbillet->handleRequest($request);
		if ($formbillet->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_user_accueil_billet_user', array('id'=>$billet->getUser()->getId(),'position'=>4)));
	}
	return $this->render('Theme/Users/User/Billet/modificationbillet.html.twig',
	array('formbillet'=>$formbillet->createView(),'billet'=>$billet));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function updatereponse(GeneralServicetext $service, Request $request, $id, $position)
{
	$em = $this->getDoctrine()->getManager();
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
	$reponse = $em->getRepository(Reponsebillet::class)
					->find($id);
	if($reponse != null)
	{
	$billet = $reponse->getBillet();
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
	return $this->render('Theme/Users/User/Billet/updatereponse.html.twig',
	array('reponse'=>$reponse, 'position' => $position));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function aviscarousel()
{
	$em = $this->getDoctrine()->getManager();
	
	$liste_review = $em->getRepository(Billet::class)
					->myFindTopReview(1,15);
	$repository = $em->getRepository(Billet::class);				
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
									
	return $this->render('Theme/Users/User/Billet/aviscarousel.html.twig',
	array('liste_review'=>$liste_review, 'nbOneAvis'=>$nbOneAvis, 'nbTwoAvis'=>$nbTwoAvis, 'nbThreeAvis'=>$nbThreeAvis, 
	'nbFourAvis'=>$nbFourAvis, 'nbFiveAvis'=>$nbFiveAvis,'nbAvisTotal'=>$nbAvisTotal,'sommeAvisTotal'=>$sommeAvisTotal,
	/*'sommeOneAvis'=>$sommeOneAvis, 'sommeTwoAvis'=>$sommeTwoAvis, 'sommeThreeAvis'=>$sommeThreeAvis, 'sommeFourAvis'=>$sommeFourAvis,
	'sommeFiveAvis'=>$sommeFiveAvis*/));
}
}