<?php
namespace Users\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class SecurityController extends Controller
{

public function loginAction()
{
	$request = $this->getRequest();
	$session = $request->getSession();
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

	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
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
	
	return $this->render('UsersUserBundle:Security:login.html.twig',
	array('last_username' => $session->get(SecurityContext::LAST_USERNAME),'error'=> $error,'slide'=>$slide,'liste_valeur'=>$liste_valeur,'liste_formation'=>$liste_formation,'liste_formateur'=>$liste_formateur,'liste_produit'=>$liste_produit));
}

public function accueilsiteAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$user = $this->getUser();
	if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')){ //dès qu'un utilisateur se connecte il est redirigé vers le path / qui exécute directement ce controlleur.
	$dureelastvisite = round((time() - $user->getDatebeg())/60);
		if($dureelastvisite >= 3) //s'il ya plus de 3 minutes que utilisateur n'a pas actualisé sa sesion 
		{
			$user->setDatebeg(time());
			$em->flush();
		}
		return $this->redirect($this->generateUrl('users_user_user_accueil', array('id'=>$user->getId())));
	}

	$allslide = $em->getRepository('UsersUserBundle:Imgslide')
	                      ->findSlideAccueil();
	
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


	return $this->render('UsersUserBundle:Security:accueilsite.html.twig',
	array('slideaccueil'=>$slideaccueil,'liste_valeur'=>$liste_valeur,'liste_formation'=>$liste_formation,'liste_formateur'=>$liste_formateur,'liste_produit'=>$liste_produit));
}
}