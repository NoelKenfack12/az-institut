<?php
namespace Users\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;


class SecurityController extends Controller
{

public function loginAction()
{
	$request = $this->getRequest();
	$session = $request->getSession();
	
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	// Si le visiteur est déjà identifié, on le redirige vers l'accueil
	if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
		return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
	
	// On vérifie s'il y a des erreurs d'une précédente soumission du formulaire
	if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
		$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
	}else{
		$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
		$session->remove(SecurityContext::AUTHENTICATION_ERROR);
	}	
	
	//connexion sécurisé user.
	$error_login = '';
	if($request->getMethod() == 'POST' and $this->getUser() == null){
		if(isset($_POST['username']) and isset($_POST['password'])){
			$repository = $em->getRepository('UsersUserBundle:User');
			$user = $repository->findOneBy(array('username'=>$_POST['username']));
			
			if($user != null)
			{
				if(trim($_POST['password']) == trim($service->decrypt($user->getPassword(),$user->getSalt())))
				{
					$token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
					// On passe le token crée au service security context afin que l'utilisateur soit authentifié
					$this->get('security.context')->setToken($token);
					$this->get('session')->set('_security_users', serialize($token));

					// Verifie si le cookie n existe pas
					if((!isset($_COOKIE["PIDSESSREM"]) or $_COOKIE["PIDSESSREM"] == 'delete') and isset($_POST['_remember_me']) and $_POST['_remember_me'] == true)
					{
						// Stock les infos du cookie
						$cookie_info = array(
							'name'  => 'PIDSESSREM',
							'value' => $service->encrypt($user->getUsername(),$this->container->getParameter('saltcookies')),
							'time'  => time() + (3600 * 24 * 360)
						);
						// Cree le cookie
						setCookie($cookie_info['name'], $cookie_info['value'], $cookie_info['time'],'/');
						setCookie('PIDSESSDUR',$cookie_info['time'], $cookie_info['time'],'/');
					}
					
					$session = $this->get('session');
					
					$idprojet = $session->get('projet_tag');
					if($idprojet != null and $idprojet > 0)
					{
						$projet = $em->getRepository('ProduitProjetBundle:Projet')
										 ->find($idprojet);
						if($projet != null)
						{
							$projet->setUser($user);
							$em->flush();
						}
					}
					$target_link = $session->get('_security.welcome.target_path');//permet de poussuivre son activité en cas de connexion forcée !
					if($target_link != null and strlen($target_link) > 5)
					{
						return $this->redirect($target_link);
					}else{
						return $this->redirect($this->generateUrl('users_user_user_accueil', array('id'=>$user->getId())));
					}
				}else{
					$error_login = 'Echec: Mot de passe ou Email invalide.';
				}
			}
		}
	}
	
	return $this->render('UsersUserBundle:Security:login.html.twig',
	array('last_username' => $session->get(SecurityContext::LAST_USERNAME),'error_login'=> $error_login));
}

public function accueilsiteAction()
{
	$em = $this->getDoctrine()->getManager();
	$user = $this->getUser();
	$service = $this->container->get('general_service.servicetext');

	$liste_actualite = $em->getRepository('ProduitServiceBundle:Service')
					   ->findBy(array('typearticle'=>'actualite','principal'=>1), array('rang'=>'asc'),20);
	$liste_slide = $em->getRepository('UsersUserBundle:Imgslide')
	                  ->myFindAcceuil();
	$liste_slide = $service->selectEntities($liste_slide, 6);
	
	$liste_formation = $em->getRepository('ProduitProduitBundle:Categorie')
	                         ->myTypeFormation(2);
	foreach($liste_formation as $formation)
	{
		$formation->setEm($em);
		foreach($formation->getSouscategories() as $scat)
		{
			$scat->setEm($em);
		}
	}
	$liste_article = $em->getRepository('ProduitServiceBundle:Service')
						 ->findBlog(1,15,'evenement');
	return $this->render('UsersUserBundle:Security:accueilsite.html.twig',
	array('liste_slide'=>$liste_slide,'liste_actualite'=>$liste_actualite,'liste_formation'=>$liste_formation
	,'liste_article'=>$liste_article));
}

public function logoutAction()
{
	if(isset($_COOKIE["PIDSESSREM"]) and isset($_COOKIE["PIDSESSDUR"]))
	{
		// Stock les infos du cookie
		$cookie_info = array(
			'name'  => "PIDSESSREM",
			'value' => "delete",
			'time'  => $_COOKIE["PIDSESSDUR"]
		);
		setCookie($cookie_info['name'], $cookie_info['value'], $cookie_info['time'],'/');
	}
	
	$this->get('security.context')->setToken(null);
	$this->get('request')->getSession()->invalidate();
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
}


public function resetpasswordAction($etape)
{
	$em = $this->getDoctrine()->getManager();
	$session = $this->get('session');
	$service = $this->container->get('general_service.servicetext');
	if($etape == 1)
	{
		if(isset($_POST['username']))
		{
			$repository = $em->getRepository('UsersUserBundle:User');
			$user = $repository->findOneBy(array('username'=>$_POST['username']));
			
			if($user != null)
			{
				$code = $user->getDatebeg();
				if($service->email($user->getUsername()))
				{
					$siteweb = $this->container->getParameter('siteweb');
					$sitename = $this->container->getParameter('sitename');
					$emailadmin = $this->container->getParameter('emailadmin');
			
					$mail = new Afmail();
					
					$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
					$mail->setSubject($user->name(30).', Vous avez demandé la réinitialisation du mot de passe de votre compte '.$sitename); 
					$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('link'=>$siteweb.'/login','nom'=>$user->name(30),'titre' => 'Le code d\'initialisation du mot de passe de votre compte '.$sitename.' a été généré avec succès !','contenu'=>'Le code est: <strong style="font-size: 25px;">'.$code.'</strong></br></br> Si vous n\'avez pas demandé cette action, Aucune action n\'est requise de votre part.')));
					$mail->setTextCharset('utf-8');
					$mail->setHTMLCharset('utf-8');
					$result = $mail->send(array($user->getUsername()));
					$type = 1;
				}else{
					$type = 2;
				}
				
				return $this->render('UsersUserBundle:Security:resetpassword.html.twig',
				array('type' =>$type,'etape'=> $etape,'user'=>$user));
			}else{
				echo 0;
				exit;
			}
		}else{
			echo 0;
			exit;
		}
	}else if($etape == 2)
	{
		if(isset($_POST['code']) and isset($_POST['id']))
		{
			$repository = $em->getRepository('UsersUserBundle:User');
			$user = $repository->find($_POST['id']);
			
			if($user != null and $user->getDatebeg() == trim($_POST['code']))
			{
				$session->set('reset_password', 1);
				
				
				return $this->render('UsersUserBundle:Security:resetpassword.html.twig',
				array('etape'=> $etape,'user'=>$user));
			}else{
				echo 0;
				exit;
			}
		}else{
			echo 0;
			exit;
		}
	}else if($etape == 3)
	{
		if(isset($_POST['password']) and isset($_POST['id']))
		{
			$repository = $em->getRepository('UsersUserBundle:User');
			$user = $repository->find($_POST['id']);
			$reset_password = $session->get('reset_password');
				
			if($user != null and $reset_password == 1)
			{
				//sécurisation du mot de passe utilisateur
				$passuser = $_POST['password'];
				
				$salt = substr(crypt($passuser,''), 0, 16);
				$user->setSalt($salt);
				$newpassword = $service->encrypt($passuser,$salt);
				
				
				$user->setPassword($newpassword);
				$em->flush();
				
				return $this->render('UsersUserBundle:Security:resetpassword.html.twig',
				array('etape'=> $etape,'user'=> $user));
			}else{
				echo 0;
				exit;
			}
		}else{
			echo 0;
			exit;
		}
	}
	echo 0;
	exit;
}
}