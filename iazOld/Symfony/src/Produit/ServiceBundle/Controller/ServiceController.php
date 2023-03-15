<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Form\ServiceType;
use Produit\ServiceBundle\Form\RessourcearticleType;
use Produit\ServiceBundle\Entity\Service;
use Produit\ServiceBundle\Entity\Ressourcearticle;
use Produit\ServiceBundle\Entity\Commentaireblog;
use Produit\ServiceBundle\Form\CommentaireblogType;
use Produit\ServiceBundle\Form\EvenementType;
use Produit\ServiceBundle\Entity\Typearticle;
use Produit\ServiceBundle\Form\TypearticleType;
use Produit\ServiceBundle\Entity\Evenement;
use Produit\ServiceBundle\Entity\Imgevenement;
use General\TemplateBundle\Entites\Recherche;

class ServiceController extends Controller
{
public function nouveauserviceAction($add)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$nosservice = new Service($service);
    $form = $this->createForm(new ServiceType, $nosservice);
	
	$typearticle = new Typearticle($service);
    $formtype = $this->createForm(new TypearticleType, $typearticle);
	
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		$form->bind($request);
		$nosservice->setUser($this->getUser());
		if($nosservice->getImgservice() !== null)
		{
			$nosservice->getImgservice()->setServicetext($service);
		}
		if(isset($_POST['typearticle']))
		{
			$nosservice->setTypearticle($_POST['typearticle']);
			if($_POST['typearticle'] == 'aproposinstitut' and isset($_POST['articleapropos']))
			{
				$type = $em->getRepository('ProduitServiceBundle:Typearticle')
						   ->find($_POST['articleapropos']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'evenement' and isset($_POST['evenement']))
			{
				$type = $em->getRepository('ProduitServiceBundle:Typearticle')
						   ->find($_POST['evenement']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'actualite' and isset($_POST['actualite']))
			{
				$type = $em->getRepository('ProduitServiceBundle:Typearticle')
						   ->find($_POST['actualite']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'demarcheaz' and isset($_POST['demarcheaz']))
			{
				$type = $em->getRepository('ProduitServiceBundle:Typearticle')
						   ->find($_POST['demarcheaz']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'temoignage' and isset($_POST['temoignage']))
			{
				$type = $em->getRepository('ProduitServiceBundle:Typearticle')
						   ->find($_POST['temoignage']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'mediatheque' and isset($_POST['mediatheque']))
			{
				$type = $em->getRepository('ProduitServiceBundle:Typearticle')
						   ->find($_POST['mediatheque']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'planingcours' and isset($_POST['planingcours']))
			{
				$type = $em->getRepository('ProduitServiceBundle:Typearticle')
						   ->find($_POST['planingcours']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'modepaiement' and isset($_POST['modepaiement']))
			{
				$type = $em->getRepository('ProduitServiceBundle:Typearticle')
						   ->find($_POST['modepaiement']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'aide' and isset($_POST['aide']))
			{
				$type = $em->getRepository('ProduitServiceBundle:Typearticle')
						   ->find($_POST['aide']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'galeriephoto' and isset($_POST['galeriephoto']))
			{
				$type = $em->getRepository('ProduitServiceBundle:Typearticle')
						   ->find($_POST['galeriephoto']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
		}
		
		if ($form->isValid()){
			$em->persist($nosservice);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée, Choisissez un type et retransmettez le formulaire!');
		}
	}

	$liste_service = $em->getRepository('ProduitServiceBundle:Service')
	                          ->myfindAll();
							  
	$type_article = $em->getRepository('ProduitServiceBundle:Typearticle')
	                    ->findAll();	

	$type_apropos = $em->getRepository('ProduitServiceBundle:Typearticle')
							  ->findBy(array('position'=>'aproposinstitut'));
							  
	$type_evenement = $em->getRepository('ProduitServiceBundle:Typearticle')
							  ->findBy(array('position'=>'evenement'));
							  
	$type_actualite = $em->getRepository('ProduitServiceBundle:Typearticle')
							  ->findBy(array('position'=>'actualite'));
							  
	$type_demarcheaz = $em->getRepository('ProduitServiceBundle:Typearticle')
						  ->findBy(array('position'=>'demarcheaz'));
	
	$type_temoignage = $em->getRepository('ProduitServiceBundle:Typearticle')
						  ->findBy(array('position'=>'temoignage'));
						  
	$type_mediatheque = $em->getRepository('ProduitServiceBundle:Typearticle')
						  ->findBy(array('position'=>'mediatheque'));
	
	$type_planingcours = $em->getRepository('ProduitServiceBundle:Typearticle')
						  ->findBy(array('position'=>'planingcours'));
						  
	$type_modepaiement = $em->getRepository('ProduitServiceBundle:Typearticle')
						  ->findBy(array('position'=>'modepaiement'));
	
	$type_aide = $em->getRepository('ProduitServiceBundle:Typearticle')
						  ->findBy(array('position'=>'aide'));
	
	$type_galeriephoto = $em->getRepository('ProduitServiceBundle:Typearticle')
						  ->findBy(array('position'=>'galeriephoto'));
						

	return $this->render('UsersAdminuserBundle:Service:nouveauservice.html.twig',
	array('form'=>$form->createView(),'formsupp'=>$formsupp->createView(),
	'formtype'=>$formtype->createView(),'add'=>$add,'type_apropos'=>$type_apropos,'type_actualite'=>$type_actualite,
	'type_temoignage'=>$type_temoignage,'type_article'=>$type_article,'liste_service'=>$liste_service,'type_evenement'=>$type_evenement,
	'type_demarcheaz'=>$type_demarcheaz,'type_mediatheque'=>$type_mediatheque,'type_planingcours'=>$type_planingcours,
	'type_modepaiement'=>$type_modepaiement,'type_aide'=>$type_aide,'type_galeriephoto'=>$type_galeriephoto));
}

public function articlespartypeAction($idtype, $page)
{
	$em = $this->getDoctrine()->getManager();
	
	$typearticle = $em->getRepository('ProduitServiceBundle:Typearticle')
	                  ->find($idtype);
	if($typearticle != null)
	{
		$liste_article = $em->getRepository('ProduitServiceBundle:Service')
							->findArticleType($typearticle->getId(), $page, 30);
	}else{
		$liste_article = $em->getRepository('ProduitServiceBundle:Service')
							->findAllArticle($page, 30);
	}
	$formsupp = $this->createFormBuilder()->getForm(); 	
	
	return $this->render('UsersAdminuserBundle:Service:articlespartype.html.twig',
	array('liste_article'=>$liste_article,'typearticle'=>$typearticle,'formsupp'=>$formsupp->createView(),
	'nombrepage' => ceil(count($liste_article)/30),'page'=>$page,'idtype'=>$idtype));
}

public function listepartiesAction(Service $article)
{
	$service = $this->container->get('general_service.servicetext');
	$evenement = new Evenement($service);
    $formeven = $this->createForm(new EvenementType, $evenement);
	
	
	return $this->render('UsersAdminuserBundle:Service:listeparties.html.twig',
	array('article'=>$article, 'formeven'=>$formeven->createView()));
}

public function modifierserviceAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$article = $em->getRepository('ProduitServiceBundle:Service')
					->find($id);
	if($article != null)
	{
    $form = $this->createForm(new ServiceType, $article);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		$form->bind($request);
		$article->setServicetext($service);
		if ($form->isValid()){
			
			$article->setUser($this->getUser());
			if($article->getImgservice() !== null)
			{
				$article->getImgservice()->setServicetext($service);
			}
			
			if(isset($_POST['typearticle']))
			{
				$article->setTypearticle($_POST['typearticle']);
				if($_POST['typearticle'] == 'aproposinstitut' and isset($_POST['articleapropos']))
				{
					$type = $em->getRepository('ProduitServiceBundle:Typearticle')
							   ->find($_POST['articleapropos']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'evenement' and isset($_POST['evenement']))
				{
					$type = $em->getRepository('ProduitServiceBundle:Typearticle')
							   ->find($_POST['evenement']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'actualite' and isset($_POST['actualite']))
				{
					$type = $em->getRepository('ProduitServiceBundle:Typearticle')
							   ->find($_POST['actualite']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				
				if($_POST['typearticle'] == 'demarcheaz' and isset($_POST['demarcheaz']))
				{
					$type = $em->getRepository('ProduitServiceBundle:Typearticle')
							   ->find($_POST['demarcheaz']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'temoignage' and isset($_POST['temoignage']))
				{
					$type = $em->getRepository('ProduitServiceBundle:Typearticle')
							   ->find($_POST['temoignage']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'mediatheque' and isset($_POST['mediatheque']))
				{
					$type = $em->getRepository('ProduitServiceBundle:Typearticle')
							   ->find($_POST['mediatheque']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'planingcours' and isset($_POST['planingcours']))
				{
					$type = $em->getRepository('ProduitServiceBundle:Typearticle')
							   ->find($_POST['planingcours']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'modepaiement' and isset($_POST['modepaiement']))
				{
					$type = $em->getRepository('ProduitServiceBundle:Typearticle')
							   ->find($_POST['modepaiement']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'aide' and isset($_POST['aide']))
				{
					$type = $em->getRepository('ProduitServiceBundle:Typearticle')
							   ->find($_POST['aide']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'galeriephoto' and isset($_POST['galeriephoto']))
				{
					$type = $em->getRepository('ProduitServiceBundle:Typearticle')
							   ->find($_POST['galeriephoto']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
			}
		
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		
		if($article->getType() != null)
		{
			return $this->redirect($this->generateUrl('users_adminuser_liste_article_type', array('idtype'=>$article->getType()->getId())));
		}else{
			return $this->redirect($this->generateUrl('users_adminuser_liste_article_type'));
		}
	}
	
							  
	$type_article = $em->getRepository('ProduitServiceBundle:Typearticle')
	                    ->findAll();	

	$type_apropos = $em->getRepository('ProduitServiceBundle:Typearticle')
							  ->findBy(array('position'=>'aproposinstitut'));
							  
	$type_evenement = $em->getRepository('ProduitServiceBundle:Typearticle')
					     ->findBy(array('position'=>'evenement'));
						 
	$type_actualite = $em->getRepository('ProduitServiceBundle:Typearticle')
					     ->findBy(array('position'=>'actualite'));
						 
	$type_demarcheaz = $em->getRepository('ProduitServiceBundle:Typearticle')
					     ->findBy(array('position'=>'demarcheaz'));
						 
	$type_temoignage = $em->getRepository('ProduitServiceBundle:Typearticle')
					     ->findBy(array('position'=>'temoignage'));
	
	$type_mediatheque = $em->getRepository('ProduitServiceBundle:Typearticle')
					     ->findBy(array('position'=>'mediatheque'));
						 
	$type_planingcours = $em->getRepository('ProduitServiceBundle:Typearticle')
					     ->findBy(array('position'=>'planingcours'));
	
	$type_modepaiement = $em->getRepository('ProduitServiceBundle:Typearticle')
					     ->findBy(array('position'=>'modepaiement'));
	
	$type_aide = $em->getRepository('ProduitServiceBundle:Typearticle')
					     ->findBy(array('position'=>'aide'));
						 
	$type_galeriephoto = $em->getRepository('ProduitServiceBundle:Typearticle')
						  ->findBy(array('position'=>'galeriephoto'));

	return $this->render('UsersAdminuserBundle:Service:modifierservice.html.twig',
	array('form'=>$form->createView(),'article'=>$article,'type_actualite'=>$type_actualite,'type_temoignage'=>$type_temoignage,
	'type_apropos'=>$type_apropos,'type_evenement'=>$type_evenement,'type_demarcheaz'=>$type_demarcheaz,'type_modepaiement'=>$type_modepaiement,
	'type_mediatheque'=>$type_mediatheque,'type_planingcours'=>$type_planingcours,'type_aide'=>$type_aide,'type_galeriephoto'=>$type_galeriephoto));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function addnewressourceAction($id, $name)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	if(isset($_GET['name']))
	{
		$name = $_GET['name'];
	}else{
		$name = $name;
	}
	$article = $em->getRepository('ProduitServiceBundle:Service')
					->find($id);
	if($article != null)
	{
		$request = $this->get('request');
		if ($request->getMethod() == 'POST'){

			$tab = array();
			if($_POST['recommandation'])
			{
				$tab = explode(',', $_POST['recommandation']);
			}
			
			
			$liste_ressource = $em->getRepository('ProduitServiceBundle:Service')
								  ->findBy(array('id'=>$tab));
			foreach($liste_ressource as $ressource)
			{
				$oldarticle = $em->getRepository('ProduitServiceBundle:Ressourcearticle')
								  ->findOneBy(array('service'=>$article,'ressource'=>$ressource),array('date'=>'desc'),1);
				if($oldarticle == null)
				{
					$ressourcearticle = new Ressourcearticle();
					$ressourcearticle->setUser($this->getUser());
					$ressourcearticle->setService($article);
					$ressourcearticle->setRessource($ressource);
					$ressourcearticle->setType($name);
					$em->persist($ressourcearticle);
				}
			}
			$em->flush();
			return $this->redirect($this->generateUrl('users_adminuser_liste_article_type', array('idtype'=>$article->getType()->getId())));
		}
		
		if($name == 'photo')
		{
			$liste_article = $em->getRepository('ProduitServiceBundle:Service')
					            ->findPhotoArticle($article->getId());
		}else{
			$liste_article = $em->getRepository('ProduitServiceBundle:Service')
					            ->findVideoArticle($article->getId());
		}
			
		return $this->render('UsersAdminuserBundle:Service:addnewressource.html.twig',
		array('article'=>$article,'liste_article'=>$liste_article,'name'=>$name));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function menuleftAction()
{
	$em = $this->getDoctrine()->getManager();
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
	return $this->render('ProduitServiceBundle:Apropos:menuleft.html.twig',
	array('liste_formation'=>$liste_formation));
}

public function addevenementAction(Service $nosservice)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$request = $this->get('request');
	$evenement = new Evenement($service);
    $formeven = $this->createForm(new EvenementType, $evenement);
	if ($request->getMethod() == 'POST'){
		$formeven->bind($request);
		$evenement->setUser($this->getUser());
		$evenement->setService($nosservice);
		if($evenement->getImgevenement() !== null)
		{
			$evenement->getImgevenement()->setServicetext($service);
		}
		
		if($formeven->isValid() and isset($_POST['typearticle'])){
			$evenement->setTypearticle($_POST['typearticle']);
			$em->persist($evenement);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée !');
		}
	}
	if($nosservice->getType() != null)
	{
		return $this->redirect($this->generateUrl('users_adminuser_liste_article_type', array('idtype'=>$nosservice->getType()->getId())));
	}else{
		return $this->redirect($this->generateUrl('users_adminuser_liste_article_type'));
	}
}

public function supprimevenementAction(Evenement $partie)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		$formsupp->bind($request);
		if ($formsupp->isValid()){
			$em->remove($partie);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
		}
	}else{
		$this->get('session')->getFlashBag()->add('supprime_even',$partie->getId());
		$this->get('session')->getFlashBag()->add('supprime_even',$partie->getNom());
	}
	
	if($partie->getService()->getType() != null)
	{
		return $this->redirect($this->generateUrl('users_adminuser_liste_article_type', 
		array('id'=>$partie->getService()->getType()->getId())));
	}else{
		return $this->redirect($this->generateUrl('users_adminuser_liste_article_type'));
	}
}

public function supprimerserviceAction(Service $service)
{
	$em = $this->getDoctrine()->getManager();
		$formsupp = $this->createFormBuilder()->getForm();
		$request = $this->get('request');
		if ($request->getMethod() == 'POST'){
			$formsupp->bind($request);
			if($formsupp->isValid()){
				$liste_evenement = $em->getRepository('ProduitServiceBundle:Evenement')
									  ->findBy(array('service'=>$service));
				if(count($liste_evenement) == 0)
				{
					$em->remove($service);
					$em->flush();
					$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
				}else{
					$this->get('session')->getFlashBag()->add('information','Action réfusée! cette evénement contient les action.');
				}
			}
		}else{
			$this->get('session')->getFlashBag()->add('supprime_prod',$service->getId());
			$this->get('session')->getFlashBag()->add('supprime_prod',$service->getNom());
		}
	if($service->getType() != null)
	{
		return $this->redirect($this->generateUrl('users_adminuser_liste_article_type', array('idtype'=>$service->getType()->getId())));
	}else{
		return $this->redirect($this->generateUrl('users_adminuser_liste_article_type'));
	}
}

public function presentationAction($id = 0)
{
	$em = $this->getDoctrine()->getManager();
	$liste_service = $em->getRepository('ProduitServiceBundle:Service')
	                    ->myfindAll();
	if($id != 0)
	{
		$service = $em->getRepository('ProduitServiceBundle:Service')
	                  ->find($id);
		$newliste = new \Doctrine\Common\Collections\ArrayCollection();
		if($service != null)
		{
		$newliste[] = $service;
		}
		foreach($liste_service as $courantservice)
		{
			if($service != $courantservice)
			{
				$newliste[] = $courantservice;
			}
		}
		$liste_service = $newliste;
	}else{
		$compt = 0;
	    foreach($liste_service as $ser)
		{
			if($compt == 0)
			{
				$service = $ser;
				break;
			}
		}
	}
	if($service != null)
	{
	$repository = $em->getRepository('ProduitServiceBundle:Apropos');
	$liste_team = $repository->FindBy(array('particulier'=>true));
	
	$ser = $this->container->get('general_service.servicetext');
	
	$team_select = $ser->selectEntities($liste_team, 3);
	$liste_envent = $em->getRepository('ProduitServiceBundle:Evenement')
	                   ->findBy(array('service'=>$service),array('rang'=>'asc'));
	return $this->render('ProduitServiceBundle:Service:presentation.html.twig', array('liste_envent'=>$liste_envent,'service'=>$service,'liste_service'=>$liste_service,'team_select'=>$team_select));
	}else{
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
}

public function notreblogAction($id, $page)
{
	$em = $this->getDoctrine()->getManager();
	$typearticle = $em->getRepository('ProduitServiceBundle:Typearticle')
	                 ->find($id);
	if($typearticle != null)
	{
		$liste_blog = $em->getRepository('ProduitServiceBundle:Service')
	                     ->myAllBlog($typearticle->getId(),$page,8,'specialeoffert');
	}else{
		$liste_blog = $em->getRepository('ProduitServiceBundle:Service')
						 ->findBlog($page,8,'specialeoffert');
	}		
					 
	return $this->render('ProduitServiceBundle:Service:notreblog.html.twig',
	array('liste_blog'=>$liste_blog,'page'=>$page,'nombrepage' => ceil(count($liste_blog)/8)));
}

public function evenementsAction($id, $page)
{
	$em = $this->getDoctrine()->getManager();
	
	$typearticle = $em->getRepository('ProduitServiceBundle:Typearticle')
	                 ->find($id);
	if($typearticle != null)
	{
		$liste_blog = $em->getRepository('ProduitServiceBundle:Service')
	                     ->myAllBlog($typearticle->getId(),$page,8,'evenementautre');
	}else{
		$liste_blog = $em->getRepository('ProduitServiceBundle:Service')
						 ->findBlog($page,8,'evenementautre');
	}		
	
	$event_galerie = $em->getRepository('ProduitServiceBundle:Service')
						 ->findBlog(1,12,'evenementgalerie');
	$event_flash = $em->getRepository('ProduitServiceBundle:Service')
						 ->findBlog($page,6,'evenementflash');
						 
	return $this->render('ProduitServiceBundle:Service:evenements.html.twig',
	array('liste_blog'=>$liste_blog,'page'=>$page,'nombrepage' => ceil(count($liste_blog)/8),
	'event_galerie'=>$event_galerie,'event_flash'=>$event_flash));
}

public function aproposdenousAction($position, $idtype, $idart, $page)
{
	$em = $this->getDoctrine()->getManager();

	$article = $em->getRepository('ProduitServiceBundle:Service')
				  ->find($idart);
	
	$typearticle = $em->getRepository('ProduitServiceBundle:Typearticle')
				      ->find($idtype);
	if($typearticle == null and $article != null)
	{
		$typearticle = $article->getType();
	}
	if($typearticle != null)
	{
		$liste_article = $em->getRepository('ProduitServiceBundle:Service')
	                     ->myAllBlog($typearticle->getId(),$page,8,$position);
	}else{
		$liste_article = $em->getRepository('ProduitServiceBundle:Service')
						 ->findBlog($page,8,'evenement');
	}
	 
	$list_typearticle = $em->getRepository('ProduitServiceBundle:Typearticle')
				      ->findBy(array('position'=>$position), array('rang'=>'desc'));
	
	
	
	return $this->render('ProduitServiceBundle:Service:aproposdenous.html.twig',
	array('article'=>$article,'position'=>$position,'liste_article'=>$liste_article,'page'=>$page,
	'nombrepage' => ceil(count($liste_article)/8),'idtype'=>$idtype,'typearticle'=>$typearticle,
	'list_typearticle'=>$list_typearticle));
}

public function detailarticlesupportAction($position)
{
	$em = $this->getDoctrine()->getManager();
	
	if($position == 'article')
	{
		
		if(isset($_POST['id']))
		{
			$id = $_POST['id'];
		}else{
			$id = 0;
		}
		
		$article = $em->getRepository('ProduitServiceBundle:Service')
					  ->find($id);
		if($article != null)
		{
			$article->setEm($em);
			
		}else{
			echo 0;
			exit;
		}
		
	}else{
		
		$article = null;
		if(isset($_POST['type']))
		{
			$type = $em->getRepository('ProduitServiceBundle:Typearticle')
					   ->findOneBy(array('position'=>$_POST['type']));
					  
			if($type != null)
			{
				$article = $em->getRepository('ProduitServiceBundle:Service')
					          ->findOneBy(array('type'=>$type), array('rang'=>'asc'));
			}
		}
		if($article != null)
		{
			$article->setEm($em);
		}else{
			echo 0;
			exit;
		}
	}
	
	return $this->render('ProduitServiceBundle:Service:detailarticlesupport.html.twig',
	array('article'=>$article));
}

public function affichearticleAction(Service $service)
{
	if($service->getBlog() == false)
	{
		return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}else{
	$em = $this->getDoctrine()->getManager();
	$recherche = new Recherche();
	$formBuilder = $this->createFormBuilder($recherche);
	$formBuilder
              ->add('donnee', 'text',array('attr'=>array('class'=>'textbox','placeholder'=>'Lancer une recherche','type'=>'search')));
	$formrecher = $formBuilder->getForm();
	$liste_even = $em->getRepository('ProduitServiceBundle:Evenement')
	                 ->findBy(array('service'=>$service),array('rang'=>'desc'));
	$liste_com = $em->getRepository('ProduitServiceBundle:Commentaireblog')
	                 ->findBy(array('service'=>$service),array('date'=>'desc'));
	$all_blog = $em->getRepository('ProduitServiceBundle:Service')
	                 ->myAllBlog();
	$comment = new Commentaireblog();
    $form = $this->createForm(new CommentaireblogType, $comment);
	return $this->render('ProduitServiceBundle:Service:affichearticle.html.twig',array('article'=>$service,'form'=>$form->createView(),'formrecher'=>$formrecher->createView(),'all_blog'=>$all_blog,'liste_even'=>$liste_even,'liste_com'=>$liste_com));
	}
}
public function ajoutercommentaireAction(Service $service)
{
	$em = $this->getDoctrine()->getManager();
	$request = $this->get('request');
	$comment = new Commentaireblog();
    $form = $this->createForm(new CommentaireblogType, $comment);
	if ($request->getMethod() == 'POST'){
	$form->bind($request);
	if($this->getUser() != null)
	{
		$comment->setUser($this->getUser());
	}
	$comment->setService($service);
    if ($form->isValid()){
		$em->persist($comment);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée !');
	}
	}
	return $this->redirect($this->generateUrl('produit_service_affiche_contenu_detaille_article_blog',array('id'=>$service->getId())));
}
public function supprimercommentaireAction(Commentaireblog $com)
{
	$service = $com->getService();
	$em = $this->getDoctrine()->getManager();
	if($this->get('security.context')->isGranted('ROLE_GESTION')){
	$em->remove($com);
	$em->flush();
	}
	return $this->redirect($this->generateUrl('produit_service_affiche_contenu_detaille_article_blog',array('id'=>$service->getId())));
}
public function ajouterimgserviceAction(Service $service)
{
	$servicetext = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$imgservice = new Imgevenement();
	$form = $this->createForm(new ImgevenementType, $imgservice);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$imgservice->setUser($this->getUser());
		$imgservice->setService($service);
		$imgservice->setServicetext($servicetext);
		if($form->isValid()){
			$em->persist($imgservice);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Publication enregistrée avec succès.');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée. Vérifiez la taille du fichié');
		}
	}
	$allimage = $em->getRepository('ProduitServiceBundle:Imgevenement')
	                      ->findBy(array('service'=>$service));
    return $this->render('UsersAdminuserBundle:Service:ajouterimgservice.html.twig',
	array('form'=>$form->createView(),'allimage'=>$allimage,'formsupp'=>$formsupp->createView(),'service'=>$service));
}
public function supprimerimgserviceAction(Imgevenement $image)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	$service = $image->getService();
    $request = $this->get('request');
	if ($request->getMethod() == 'POST') {
    $formsupp->bind($request);
    if ($formsupp->isValid()){
	$em->remove($image);
    $em->flush();
	$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	return $this->redirect($this->generateUrl('users_adminuser_ajouter_image_service_courant',array('id'=>$service->getId())));
	}
	}
    $this->get('session')->getFlashBag()->add('supprime_apropos',$image->getId());
	$this->get('session')->getFlashBag()->add('supprime_apropos',$image->getService()->getNom());
	return $this->redirect($this->generateUrl('users_adminuser_ajouter_image_service_courant',array('id'=>$service->getId())));
}

public function modifierevenementAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	
	$partie = $em->getRepository('ProduitServiceBundle:Evenement')
					->find($id);
	if($partie != null)
	{

    $formeven = $this->createForm(new EvenementType, $partie);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		$formeven->bind($request);
		$partie->setServicetext($service);
		if ($formeven->isValid() and isset($_POST['typearticle'])){
			$partie->setTypearticle($_POST['typearticle']);
			$partie->setUser($this->getUser());
			if($partie->getImgevenement() !== null)
			{
				$partie->getImgevenement()->setServicetext($service);
			}
		
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		if($partie->getService()->getType() != null)
		{
			return $this->redirect($this->generateUrl('users_adminuser_liste_article_type', array('idtype'=>$partie->getService()->getType()->getId())));
		}else{
			return $this->redirect($this->generateUrl('users_adminuser_liste_article_type'));
		}
	}
	return $this->render('UsersAdminuserBundle:Service:modifierevenement.html.twig',
	array('formeven'=>$formeven->createView(),'partie'=>$partie));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function addtypearticleAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	$typearticle = new Typearticle($service);
    $formtype = $this->createForm(new TypearticleType, $typearticle);

	$request = $this->get('request');
	if ($request->getMethod() == 'POST' and isset($_POST['typeservice'])){
	$formtype->bind($request);
	$typearticle->setUser($this->getUser());

    if ($formtype->isValid()){
		$typearticle->setPosition($_POST['typeservice']);
		$em->persist($typearticle);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée, Choisissez un type et retransmettez le formulaire!');
	}
	}
	return $this->redirect($this->generateUrl('users_adminuser_ajouter_nouveau_service'));
}

public function supprimertypearticleAction(Typearticle $typearticle)
{
	$em = $this->getDoctrine()->getManager();
	if(count($typearticle->getServices()) == 0)
	{
		$em->remove($typearticle);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec ! Cette catégorie contient les articles, Supprimez lès en premier.');
	}
	return $this->redirect($this->generateUrl('users_adminuser_ajouter_nouveau_service'));
}

public function updatetypearticleAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$typearticle = $em->getRepository('ProduitServiceBundle:Typearticle')
					->find($id);
	if($typearticle != null)
	{
    $formtype = $this->createForm(new TypearticleType, $typearticle);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		$formtype->bind($request);
		$typearticle->setServicetext($service);
		if ($formtype->isValid() and isset($_POST['typeservice'])){
			$typearticle->setPosition($_POST['typeservice']);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_ajouter_nouveau_service'));
	}
	return $this->render('UsersAdminuserBundle:Service:updatetypearticle.html.twig',
	array('formtype'=>$formtype->createView(),'typearticle'=>$typearticle));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function detailactualiteAction(Service $article)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	return $this->render('ProduitServiceBundle:Service:detailactualite.html.twig',
	array('article'=>$article));
}

public function livresformartionAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	return $this->render('ProduitServiceBundle:Service:livresformartion.html.twig');
}
}