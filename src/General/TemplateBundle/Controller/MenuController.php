<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace General\TemplateBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use General\TemplateBundle\Entites\Recherche;
use Users\UserBundle\Entity\Newsletter;
use Users\UserBundle\Form\NewsletterType;

class MenuController extends Controller
{
public function menubareAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	$liste_service = $em->getRepository('ProduitServiceBundle:Service')
	                    ->findBy(array('principal'=>1,'recrutement'=>1));
	$liste_actualite = $service->selectEntities($liste_service,3);	

	$sous_cat = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                      ->topsouscategorie(150);	
	$liste_ville = $em->getRepository('ProduitServiceBundle:Ville')
	                      ->myFindAll(150);
	
	$session = $this->get('session');
	$actualiseformation = $session->get('actualiseformation');
	if($this->getUser() != null and $actualiseformation != 100)
	{
	$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
						  ->findBy(array('user'=>$this->getUser(),'valide'=>1));
	foreach($liste_oldpanier as $panier)
	{
		if($panier->getService() != null)
		{
			$periode = ($panier->getService()->getDureeacces() - $panier->getDate()->diff(new \Datetime())->days);
			if($periode <= 0)
			{
				$panier->setValide(false);
			}
		}
		if($panier->getChapitrecours() != null)
		{
			$periode = ($panier->getChapitrecours()->getPartiecours()->getProduit()->getDureeacces() - $panier->getDate()->diff(new \Datetime())->days);
			if($periode <= 0)
			{
				$panier->setValide(false);
			}
		}
		if($panier->getChapitrecours() == null and $panier->getService() == null)
		{
			$produit = null;
			foreach($panier->getProduitpaniers() as $propan)
			{
				$produit = $propan->getProduit();
				break;
			}
			if($produit != null)
			{
			$periode = ($produit->getDureeacces() - $panier->getDate()->diff(new \Datetime())->days);
			if($periode <= 0)
			{
				$panier->setValide(false);
			}
			}
		}
	}
	$em->flush();
	$session->set('actualiseformation',100);
	}	
	$liste_notification = new \Doctrine\Common\Collections\ArrayCollection();
	if($this->getUser() != null)
	{
		$liste_notification = $em->getRepository('UsersUserBundle:Notification')
							  ->findBy(array('user'=>$this->getUser(),'lut'=>0));
	}
	return $this->render('GeneralTemplateBundle:Menu:menubare.html.twig',
	array('liste_actualite'=>$liste_actualite,'liste_notification'=>$liste_notification));
}

public function footerAction()
{
	$em = $this->getDoctrine()->getManager();
	$topcat = $em->getRepository('ProduitProduitBundle:Souscategorie')
	             ->topsouscategorie(5);
				 
	$repositorie = $em->getRepository('ProduitProduitBundle:Produit');
	$plus_vendu = $repositorie->topProduit(5);
	$plus_like = $repositorie->topLike(5);
	$topservice = $em->getRepository('ProduitServiceBundle:Service')
	             ->topservice(5);
	$nbprod = 0;
	$produitpanier = null;
	$newsletter = new Newsletter();
	$form = $this->createForm(new NewsletterType, $newsletter);
	if($this->getUser() != null)
	{
		$panier = $em->getRepository('ProduitProduitBundle:Panier')
	                      ->findOneBy(array('user'=>$this->getUser(),'payer'=>0));
			if($panier != null)
			{
				$produitpanier = $panier->getProduitpaniers();
				foreach($produitpanier as $prodpan)
				{
					$nbprod = $nbprod + $prodpan->getQuantite();
				}
			}
	}
	return $this->render('GeneralTemplateBundle:Menu:footer.html.twig',
	array('topcat'=>$topcat,'plus_vendu'=>$plus_vendu,'plus_like'=>$plus_like,'nbprod'=>$nbprod,'topservice'=>$topservice,'form'=>$form->createView()));
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