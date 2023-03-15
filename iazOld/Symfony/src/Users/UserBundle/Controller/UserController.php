<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*ce fichier est la proprieté de Zentsoft entreprise.
*/
namespace Users\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Users\UserBundle\Entity\User;
use Users\UserBundle\Form\UserType;
use Users\UserBundle\Entity\Newsletter;
use Users\UserBundle\Entity\Imgprofil;
use Users\UserBundle\Form\ImgprofilType;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\SecurityContext;

class UserController extends Controller
{
public function inscriptionuserAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$request = $this->getRequest();
	
	// Si le visiteur est déjà identifié, on le redirige vers l'accueil
	if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){
		return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
	
	$user = new User($service);
	$form = $this->createForm(new UserType, $user);

	if($request->getMethod() == 'POST' and $this->getUser() == null){
		$form->bind($request);
		
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
				'value' => $service->encrypt($user->getUsername(),$this->container->getParameter('saltcookies')),
				'time'  => time() + (3600 * 24 * 360)
			);
			// Cree le cookie
			setCookie($cookie_info['name'], $cookie_info['value'], $cookie_info['time'],'/');
			setCookie('PIDSESSDUR',$cookie_info['time'], $cookie_info['time'],'/');
			
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

			return $this->redirect($this->generateUrl('users_user_user_accueil', array('id'=>$user->getId())));
		}
		
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
	}

	return $this->render('UsersUserBundle:User:inscriptionuser.html.twig',
	array('form'=>$form->createview()));
}

public function accueiluserAction(User $user)
{
	if($this->getUser() == $user)
	{
		$user->setDatebeg(time());
		$em = $this->getDoctrine()->getManager();
		$em->flush();
		
		$em = $this->getDoctrine()->getManager();
	    $panier = $em->getRepository('ProduitProduitBundle:Panier')
				     ->findOneBy(array('user'=>$user,'payer'=>0));
		$panier_payer = $em->getRepository('ProduitProduitBundle:Panier')
				           ->findBy(array('user'=>$user,'payer'=>1));
		$service = $this->container->get('general_service.servicetext');
		$profil = new Imgprofil($service);
	    $form = $this->createForm(new ImgprofilType, $profil);
		
		$topcat = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                 ->topsouscategorie(8);
				 
		return $this->render('UsersUserBundle:User:accueiluser.html.twig',
		array('user'=>$user,'form'=>$form->createView(),'panier'=>$panier,'panier_payer'=>$panier_payer,'topcat'=>$topcat));
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
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$request = $this->getRequest();
	$profil = new Imgprofil($service);
	    $form = $this->createForm(new ImgprofilType, $profil);
		if ($request->getMethod() == 'POST')
		{
			$form->bind($request);
			if ($form->isValid()){
				
				$oldprofil = $em->getRepository('UsersUserBundle:Imgprofil')
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
			
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Rôle '.$_POST['roleuser'].' ajouté avec succès à '.$userrole->name(20));
		}
	}
	
	$liste_user = $em->getRepository('UsersUserBundle:User')
	                 ->findManager();

	return $this->render('UsersAdminuserBundle:User:nouveauadmin.html.twig',
	array('liste_user'=>$liste_user,'formsupp'=>$formsupp->createView()));
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

public function listefactureAction(User $user)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$user = $this->getSecureUser($user);
	
	$liste_panier = $em->getRepository('ProduitProduitBundle:Panier')
	                      ->findBy(array('user'=>$user), array('date'=>'desc'));
						  
	return $this->render('UsersUserBundle:User:listefacture.html.twig',
	array('user'=>$user,'liste_panier'=>$liste_panier));
}

public function getSecureUser(User $user)
{
	if($this->getUser() != $user and !$this->get('security.context')->isGranted('ROLE_GESTION'))
	{
		$user = $this->getUser();
	}
	return $user;
}
}