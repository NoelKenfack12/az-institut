<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
* ce fichier est la proprieté de Zentsoft entreprise.
*/
namespace App\Controller\Users\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users\User\User;
use App\Form\Users\User\UserType;
use App\Entity\Users\User\Newsletter;
use App\Entity\Users\User\Imgprofil;
use App\Form\Users\User\ImgprofilType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;
use App\Entity\Produit\Produit\Panier;
use App\Entity\Produit\Produit\Souscategorie;
use App\Entity\Produit\Service\Curentwebsite;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Service\Email\Singleemail;

class UserController extends AbstractController
{
private $params;
private $_servicemail;

public function __construct(ParameterBagInterface $params, Singleemail $servicemail)
{
	$this->params = $params;
	$this->_servicemail = $servicemail;
}
public function inscriptionuser(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	// Si le visiteur est déjà identifié, on le redirige vers l'accueil
	if($this->isGranted('IS_AUTHENTICATED_REMEMBERED')){
		return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
	
	$user = new User($service);
	$form = $this->createForm(UserType::class, $user);

	if($request->getMethod() == 'POST' and $this->getUser() == null){
		$form->handleRequest($request);
		
		if($form->isValid()){
			//sécurisation du mot de passe utilisateur
			$passuser = $user->getPassword();
			$salt = substr(crypt($passuser,''), 0, 16);
			$user->setSalt($salt);
			
			$newpassword = $service->encrypt($passuser,$salt);
			$user->setPassword($newpassword);
			$em->persist($user);
			$em->flush();

			// Stock les infos du cookie
			$cookie_info = array(
				'name'  => 'PIDSESSREM',
				'value' => $service->encrypt($user->getUsername(),$this->params->get('saltcookies')),
				'time'  => time() + (3600 * 24 * 360)
			);
			// Cree le cookie
			setCookie($cookie_info['name'], $cookie_info['value'], $cookie_info['time'],'/');
			setCookie('PIDSESSDUR',$cookie_info['time'], $cookie_info['time'],'/');
			
			$oldemail = $em->getRepository(Newsletter::class)
						   ->findBy(array('email'=>$user->getUsername()));
			if($oldemail == null)
			{
				$newsletter = new Newsletter();
				$newsletter->SetNom($user->getNom());
				$newsletter->SetEmail($user->getUsername());
				$em->persist($newsletter);
				$em->flush();
			}

			return $this->redirect($this->generateUrl('users_user_user_accueil', array('id'=>$user->getId())));
		}
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
	}

	return $this->render('Theme/Users/User/User/inscriptionuser.html.twig',
	array('form'=>$form->createview()));
}

public function accueiluser(User $user, GeneralServicetext $service)
{
	if($this->getUser() == $user)
	{
		$user->setDatebeg(time());
		$em = $this->getDoctrine()->getManager();
		$em->flush();
		
		$em = $this->getDoctrine()->getManager();
	    $panier = $em->getRepository(Panier::class)
				     ->findOneBy(array('user'=>$user,'payer'=>0));
		$panier_payer = $em->getRepository(Panier::class)
				           ->findBy(array('user'=>$user,'payer'=>1));
		$profil = new Imgprofil($service);
	    $form = $this->createForm(ImgprofilType::class, $profil);
		
		$topcat = $em->getRepository(Souscategorie::class)
	                 ->topsouscategorie(8);
				 
		return $this->render('Theme/Users/User/User/accueiluser.html.twig',
		array('user'=>$user,'form'=>$form->createView(),'panier'=>$panier,'panier_payer'=>$panier_payer,'topcat'=>$topcat));
	}else{
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
}

public function alertnoel()
{
	$em = $this->getDoctrine()->getManager();
	$oldprofil = $em->getRepository(Curentwebsite::class)
	                ->FindAll();
	foreach($oldprofil as $prof)
	{
		$em->remove($prof);
		$em->flush();
	}
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
}

public function modifierprofil(User $user, GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	$request = $this->getRequest();
	$profil = new Imgprofil($service);
	    $form = $this->createForm(ImgprofilType::class, $profil);
		if ($request->getMethod() == 'POST')
		{
			$form->handleRequest($request);
			if ($form->isValid()){
				
				$oldprofil = $em->getRepository(Imgprofil::class)
	                            ->FindOneBy(array('user'=>$user));
				if ($oldprofil === null)
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
			}
		}
		return $this->redirect($this->generateUrl('users_user_user_accueil',array('id'=>$user->getId())));
}

public function ajouteradmin(Request $request)
{
	$em = $this->getDoctrine()->getManager();
	if ($request->getMethod() == 'POST' and isset($_POST['_username']) and isset($_POST['_password'])){
		$username = $this->params->get('username');
		$password = $this->params->get('password');
		if($_POST['_username'] == $username and $_POST['_password'] == $password and $this->getUser() != null)
		{
			$this->getUser()->addRole('ROLE_ADMIN');
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Administrateur enregistré avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Le mot de passe ou le nom d\'utilisateur est incorect.');
		}
		return $this->render('Theme/Users/User/User/ajouteradmin.html.twig');
    }
	$liste_user = $em->getRepository(User::class)
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
		return $this->render('Theme/Users/User/ajouteradmin.html.twig');
	}
}

public function nouveauadmin(Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	if ($request->getMethod() == 'POST' and isset($_POST['username']) and isset($_POST['roleuser']))
	{
		$userrole = $em->getRepository(User::class)
	                   ->findOneBy(array('username'=>$_POST['username']));
		if($userrole != null and !in_array($_POST['roleuser'], ($userrole->getRoles())))
		{
			$userrole->addRole($_POST['roleuser']);
			
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Rôle '.$_POST['roleuser'].' ajouté avec succès à '.$userrole->name(20));
		}
	}
	
	$liste_user = $em->getRepository(User::class)
	                 ->findManager();

	return $this->render('Theme/Users/Adminuser/User/nouveauadmin.html.twig',
	array('liste_user'=>$liste_user,'formsupp'=>$formsupp->createView()));
}

public function eleverole(User $user, Request $request, $idrole)
{
	$formsupp = $this->createFormBuilder()->getForm();
	$em = $this->getDoctrine()->getManager();
	if ($request->getMethod() == 'POST'){
		$formsupp->handleRequest($request);
		if ($formsupp->isValid()){
			if($idrole == 1)
			{
				$user->removeRole('ROLE_GESTION');
			}
			if($idrole == 2)
			{
				$user->removeRole('ROLE_MANAGER_ED');
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
			$role = "ROLE_MANAGER_ED à ";
		}
		$this->get('session')->getFlashBag()->add('supprime_role',$user->getId());
		$this->get('session')->getFlashBag()->add('supprime_role',$idrole);
		$this->get('session')->getFlashBag()->add('supprime_role',$role.' '.$user->name(30));
	}
	return $this->redirect($this->generateUrl('users_adminuser_ajout_nouveau_admin'));
}

public function listefacture(User $user, GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	$user = $this->getSecureUser($user);
	$liste_panier = $em->getRepository(Panier::class)
	                   ->findBy(array('user'=>$user), array('date'=>'desc'));

	return $this->render('Theme/Users/User/listefacture.html.twig',
	array('user'=>$user,'liste_panier'=>$liste_panier));
}

public function getSecureUser(User $user)
{
	if($this->getUser() != $user and !$this->isGranted('ROLE_GESTION'))
	{
		$user = $this->getUser();
	}
	return $user;
}
}