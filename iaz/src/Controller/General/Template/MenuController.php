<?php
/*
	(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace App\Controller\General\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\General\Template\Recherche;
use App\Entity\Users\User\Newsletter;
use App\Entity\Users\User\User;
use App\Form\Users\User\NewsletterType;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Entity\Produit\Produit\Categorie;
use App\Entity\Produit\Service\Categorieappli;
use App\Entity\Produit\Service\Application;
use App\Entity\Produit\Service\Service;
use App\Entity\Users\Adminuser\Parametreadmin;
use App\Service\Email\Singleemail;
use App\Security\TokenAuthenticator;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use App\Entity\Produit\Produit\Panier;
use App\Entity\Produit\Service\Recrutement;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends AbstractController
{
private $params;
private $_servicemail;
private $authenticator;
private $guardHandler;

public function __construct(ParameterBagInterface $params, Singleemail $servicemail, TokenAuthenticator $authenticator, GuardAuthenticatorHandler $guardHandler)
{
	$this->params = $params;
	$this->_servicemail = $servicemail;
	$this->authenticator = $authenticator;
	$this->guardHandler = $guardHandler;
}

public function menubare(GeneralServicetext $service, Request $request, $position = 'offert')
{
	$em = $this->getDoctrine()->getManager();
	if($this->getUser() == null and isset($_COOKIE["PIDSESSREM"]) and $_COOKIE["PIDSESSREM"] != 'delete')
	{
		$cookies = $_COOKIE["PIDSESSREM"];
		$username = trim($service->decrypt($cookies, $this->params->get('saltcookies')));
		
		$repository = $em->getRepository(User::class);
		$user = $repository->findOneBy(array('username'=>$username));
		
		$user = null;
		if($this->getUser() == null and isset($_COOKIE["PIDSESSREM"]) and $_COOKIE["PIDSESSREM"] != 'delete')
		{
			$cookies = $_COOKIE["PIDSESSREM"];

			$username = trim($service->decrypt($cookies, $this->params->get('saltcookies')));

			if($service->email($username) || $service->telephone($username))
			{
				$repository = $em->getRepository(User::class);
				$user = $repository->findOneBy(array('username'=>$username));
				if($user != null)
				{
					$response = $this->guardHandler->authenticateUserAndHandleSuccess(
						$user,          // the User object you just created
						$request,
						$this->authenticator, // authenticator whose onAuthenticationSuccess you want to use
						'main'          // the name of your firewall in security.yaml
					);
				}
			}
		}
	}
	
	$liste_formation = $em->getRepository(Categorie::class)
	                         ->myTypeFormation(2);
							 
	$categories_app = $em->getRepository(Categorieappli::class)
	                      ->myFindAll();
	foreach($liste_formation as $formation)
	{
		$formation->setEm($em);
		foreach($formation->getSouscategories() as $scat)
		{
			$scat->setEm($em);
		}
	}
	$liste_application = $em->getRepository(Application::class)
	                         ->myFindAll();
	
	$apropos = $em->getRepository(Service::class)
	                    ->findOneBy(array('typearticle'=>'aproposinstitut'), array('rang'=>'asc'));	
	$article_demarche = $em->getRepository(Service::class)
						    ->findBlog(1,3,'demarcheaz');

	$paramlogosm = $em->getRepository(Parametreadmin::class)
	                   ->findOneBy(array('type'=>'logosm'));
	return $this->render('Theme/General/Template/Menu/menubare.html.twig',
	array('position'=>$position,'categories_app'=>$categories_app, 'liste_formation'=>$liste_formation,
	'apropos'=>$apropos,'article_demarche'=>$article_demarche,'liste_application'=>$liste_application,
	'paramlogosm'=>$paramlogosm));
}

public function footer($position = 'offert', $hideblock='')
{
	$em = $this->getDoctrine()->getManager();
	$idcard = 0;
	if(isset($_COOKIE["PIDCARD"]) and $_COOKIE["PIDCARD"] != 'empty')
	{
		$idcard = $_COOKIE["PIDCARD"];
	}
	
	$liste_prod = new \Doctrine\Common\Collections\ArrayCollection();
	$oldpanier = $em->getRepository(Panier::class)
					 ->findOneBy(array('id'=>$idcard,'sousmis'=>0));
	if($oldpanier == null and $this->getUser() != null)
	{
		$oldpanier = $em->getRepository(Panier::class)
					    ->findOneBy(array('user'=>$this->getUser(),'sousmis'=>0));
	}
	
	if($oldpanier != null)
	{
		$liste_prod = $oldpanier->getProduitpaniers();
	}
	
	$liste_formation = $em->getRepository(Categorie::class)
	                         ->myTypeFormation(2);
	$apropos = $em->getRepository(Service::class)
	                    ->findOneBy(array('typearticle'=>'aproposinstitut'), array('rang'=>'asc'));	

    $doc_depliant = $em->getRepository(Recrutement::class)
						    ->findBy(array('typedocument'=>'depliant'), array('date'=>'desc'),20);
	$doc_planing = $em->getRepository(Recrutement::class)
						    ->findBy(array('typedocument'=>'planing'), array('date'=>'desc'),20);	

    $oldparam5 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'aproposvideo'));	
    
    $liste_actualite = $em->getRepository(Service::class)
					   ->findBy(array('typearticle'=>'actualite','principal'=>1), array('rang'=>'asc'),20);
					   
	return $this->render('Theme/General/Template/Menu/footer.html.twig',
	array('nbproduit'=>count($liste_prod),'position'=>$position,'liste_formation'=>$liste_formation,
	'apropos'=>$apropos,'doc_planing'=>$doc_planing,'doc_depliant'=>$doc_depliant,'hideblock'=>$hideblock,
	'oldparam5'=>$oldparam5,'liste_actualite'=>$liste_actualite));
}

public function menuright($position = 'admin')
{
	$em = $this->getDoctrine()->getManager();
					   
	return $this->render('Theme/General/Template/Menu/menuright.html.twig',array('position'=>$position));
}

public function menuleft(User $user, $position = '')
{
	return $this->render('Theme/General/Template/Menu/menuleft.html.twig',
	array('user'=>$user, 'position'=>$position));
}


public function testinscriptionnewsletter()
{
	$session = $this->get('session');
	$envoi = $session->get('test_newsletter');
	if($envoi !== 100)
	{
		$newsletter = new Newsletter();
		$form = $this->createForm(new NewsletterType, $newsletter);
		return $this->render('Theme/General/Template/Menu/testinscriptionnewsletter.html.twig',array('form'=>$form->createView()));
	}
	return new Response(' ');
}

public function stopAlertNewletter()
{
	$session = $this->get('session');
	$session->set('test_newsletter',100);
	echo 1;
	exit;
}
}