<?php
namespace App\Controller\Users\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Service\Email\Singleemail;
use App\Entity\Users\User\User;
use App\Entity\Produit\Projet\Projet;
use App\Entity\Produit\Service\Service;
use App\Entity\Users\User\Imgslide;
use App\Entity\Produit\Produit\Categorie;

class SecurityController extends AbstractController
{
private $params;
private $_servicemail;

public function __construct(ParameterBagInterface $params, Singleemail $servicemail)
{
	$this->params = $params;
	$this->_servicemail = $servicemail;
}

public function login(Request $request, GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	// Si le visiteur est déjà identifié, on le redirige vers l'accueil
	if ($this->isGranted('IS_AUTHENTICATED_REMEMBERED')){
		return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}

	//connexion sécurisé user.
	$error_login = '';
	if($request->getMethod() == 'POST' and $this->getUser() == null){
		if(isset($_POST['username']) and isset($_POST['password'])){
			$repository = $em->getRepository(User::class);
			$user = $repository->findOneBy(array('username'=>$_POST['username']));
			
			if($user != null)
			{
				if(trim($_POST['password']) == trim($service->decrypt($user->getPassword(),$user->getSalt())))
				{
					// Verifie si le cookie n existe pas
					if((!isset($_COOKIE["PIDSESSREM"]) or $_COOKIE["PIDSESSREM"] == 'delete') and isset($_POST['_remember_me']) and $_POST['_remember_me'] == true)
					{
						// Stock les infos du cookie
						$cookie_info = array(
							'name'  => 'PIDSESSREM',
							'value' => $service->encrypt($user->getUsername(),$this->params->get('saltcookies')),
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
						$projet = $em->getRepository(Projet::class)
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
	
	return $this->render('Theme/Users/User/Security/login.html.twig',
	array('error_login'=> $error_login));
}

public function accueilsite(GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	$user = $this->getUser();
	$liste_actualite = $em->getRepository(Service::class)
					      ->findBy(array('typearticle'=>'actualite','principal'=>1), array('rang'=>'asc'),20);
	$liste_slide = $em->getRepository(Imgslide::class)
	                  ->myFindAcceuil();
	$liste_slide = $service->selectEntities($liste_slide, 6);
	
	$liste_formation = $em->getRepository(Categorie::class)
	                         ->myTypeFormation(2);
	foreach($liste_formation as $formation)
	{
		$formation->setEm($em);
		foreach($formation->getSouscategories() as $scat)
		{
			$scat->setEm($em);
		}
	}
	$liste_article = $em->getRepository(Service::class)
						 ->findBlog(1,15,'evenement');
	return $this->render('Theme/Users/User/Security/accueilsite.html.twig',
	array('liste_slide'=>$liste_slide,'liste_actualite'=>$liste_actualite,'liste_formation'=>$liste_formation
	,'liste_article'=>$liste_article));
}

public function logout()
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
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
}


public function resetpassword(GeneralServicetext $service, $etape)
{
	$em = $this->getDoctrine()->getManager();
	$session = $this->get('session');
	if($etape == 1)
	{
		if(isset($_POST['username']))
		{
			$repository = $em->getRepository(User::class);
			$user = $repository->findOneBy(array('username'=>$_POST['username']));
			
			if($user != null)
			{
				$code = $user->getDatebeg();
				if($service->email($user->getUsername()))
				{
					$siteweb = $this->params->get('siteweb');
					$sitename = $this->params->get('sitename');
					$emailadmin = $this->params->get('emailadmin');
			
					$response = $this->_servicemail->sendNotifEmail(
						$user->name(30), //Nom du destinataire
						$user->getUsername(), //Email Destinataire
						$user->name(30).', Vous avez demandé la réinitialisation du mot de passe de votre compte '.$sitename, //Objet de l'email
						$user->name(30).', Vous avez demandé la réinitialisation du mot de passe de votre compte '.$sitename, //Grand Titre de l'email
						'Le code est: <strong style="font-size: 25px;">'.$code.'</strong></br></br> Si vous n\'avez pas demandé cette action, Aucune action n\'est requise de votre part.',  //Contenu de l'email
						$siteweb.'/login'  //Lien à suivre
					);
					$type = 1;
				}else{
					$type = 2;
				}
				
				return $this->render('Theme/Users/User/Security/resetpassword.html.twig',
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
			$repository = $em->getRepository(User::class);
			$user = $repository->find($_POST['id']);
			
			if($user != null and $user->getDatebeg() == trim($_POST['code']))
			{
				$session->set('reset_password', 1);

				return $this->render('Theme/Users/User/Security/resetpassword.html.twig',
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
			$repository = $em->getRepository(User::class);
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
				
				return $this->render('Theme/Users/User/Security/resetpassword.html.twig',
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