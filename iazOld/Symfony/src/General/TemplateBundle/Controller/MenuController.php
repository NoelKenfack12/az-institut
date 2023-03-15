<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace General\TemplateBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use General\TemplateBundle\Entites\Recherche;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Users\UserBundle\Entity\Newsletter;
use Users\UserBundle\Entity\User;
use Users\UserBundle\Form\NewsletterType;

class MenuController extends Controller
{
public function menubareAction($position = 'offert')
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	if($this->getUser() == null and isset($_COOKIE["PIDSESSREM"]) and $_COOKIE["PIDSESSREM"] != 'delete')
	{
		$cookies = $_COOKIE["PIDSESSREM"];
		$username = trim($service->decrypt($cookies, $this->container->getParameter('saltcookies')));
		
		$repository = $em->getRepository('UsersUserBundle:User');
		$user = $repository->findOneBy(array('username'=>$username));
		
		if($user != null)
		{
			$token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
			// On passe le token crée au service security context afin que l'utilisateur soit authentifié
			$this->get('security.context')->setToken($token);
			$this->get('session')->set('_security_users', serialize($token));
		}
	}
	
	$liste_formation = $em->getRepository('ProduitProduitBundle:Categorie')
	                         ->myTypeFormation(2);
							 
	$categories_app = $em->getRepository('ProduitServiceBundle:Categorieappli')
	                      ->myFindAll();
	foreach($liste_formation as $formation)
	{
		$formation->setEm($em);
		foreach($formation->getSouscategories() as $scat)
		{
			$scat->setEm($em);
		}
	}
	$liste_application = $em->getRepository('ProduitServiceBundle:Application')
	                         ->myFindAll();
	
	$apropos = $em->getRepository('ProduitServiceBundle:Service')
	                    ->findOneBy(array('typearticle'=>'aproposinstitut'), array('rang'=>'asc'));	
	$article_demarche = $em->getRepository('ProduitServiceBundle:Service')
						    ->findBlog(1,3,'demarcheaz');

	$paramlogosm = $em->getRepository('UsersAdminuserBundle:Parametreadmin')
	                   ->findOneBy(array('type'=>'logosm'));
	return $this->render('GeneralTemplateBundle:Menu:menubare.html.twig',
	array('position'=>$position,'categories_app'=>$categories_app, 'liste_formation'=>$liste_formation,
	'apropos'=>$apropos,'article_demarche'=>$article_demarche,'liste_application'=>$liste_application,
	'paramlogosm'=>$paramlogosm));
}

public function footerAction($position = 'offert', $hideblock='')
{
	$em = $this->getDoctrine()->getManager();
	
	$idcard = 0;
	if(isset($_COOKIE["PIDCARD"]) and $_COOKIE["PIDCARD"] != 'empty')
	{
		$idcard = $_COOKIE["PIDCARD"];
	}
	
	$liste_prod = new \Doctrine\Common\Collections\ArrayCollection();
	$oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
					 ->findOneBy(array('id'=>$idcard,'sousmis'=>0));
	if($oldpanier == null and $this->getUser() != null)
	{
		$oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
					    ->findOneBy(array('user'=>$this->getUser(),'sousmis'=>0));
	}
	
	if($oldpanier != null)
	{
		$liste_prod = $oldpanier->getProduitpaniers();
	}
	
	$liste_formation = $em->getRepository('ProduitProduitBundle:Categorie')
	                         ->myTypeFormation(2);
	$apropos = $em->getRepository('ProduitServiceBundle:Service')
	                    ->findOneBy(array('typearticle'=>'aproposinstitut'), array('rang'=>'asc'));	

    $doc_depliant = $em->getRepository('ProduitServiceBundle:Recrutement')
						    ->findBy(array('typedocument'=>'depliant'), array('date'=>'desc'),20);
	$doc_planing = $em->getRepository('ProduitServiceBundle:Recrutement')
						    ->findBy(array('typedocument'=>'planing'), array('date'=>'desc'),20);	

    $oldparam5 = $em->getRepository('UsersAdminuserBundle:Parametreadmin')
	                    ->findOneBy(array('type'=>'aproposvideo'));	
    
    $liste_actualite = $em->getRepository('ProduitServiceBundle:Service')
					   ->findBy(array('typearticle'=>'actualite','principal'=>1), array('rang'=>'asc'),20);
					   
	return $this->render('GeneralTemplateBundle:Menu:footer.html.twig',
	array('nbproduit'=>count($liste_prod),'position'=>$position,'liste_formation'=>$liste_formation,
	'apropos'=>$apropos,'doc_planing'=>$doc_planing,'doc_depliant'=>$doc_depliant,'hideblock'=>$hideblock,
	'oldparam5'=>$oldparam5,'liste_actualite'=>$liste_actualite));
}

public function menurightAction($position = 'admin')
{
	$em = $this->getDoctrine()->getManager();
					   
	return $this->render('GeneralTemplateBundle:Menu:menuright.html.twig',array('position'=>$position));
}

public function menuleftAction(User $user, $position = '')
{
	return $this->render('GeneralTemplateBundle:Menu:menuleft.html.twig',
	array('user'=>$user, 'position'=>$position));
}


public function testinscriptionnewsletterAction()
{
	$session = $this->get('session');
	$envoi = $session->get('test_newsletter');
	if($envoi !== 100)
	{
		$newsletter = new Newsletter();
		$form = $this->createForm(new NewsletterType, $newsletter);
		return $this->render('GeneralTemplateBundle:Menu:testinscriptionnewsletter.html.twig',array('form'=>$form->createView()));
	}
	return new Response(' ');
}

public function stopAlertNewletterAction()
{
	$session = $this->get('session');
	$session->set('test_newsletter',100);
	echo 1;
	exit;
}
}