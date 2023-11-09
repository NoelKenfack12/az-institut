<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace App\Controller\Produit\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Produit\Service\ServiceType;
use App\Form\Produit\Service\RessourcearticleType;
use App\Entity\Produit\Service\Service;
use App\Entity\Produit\Service\Ressourcearticle;
use App\Entity\Produit\Service\Commentaireblog;
use App\Form\Produit\Service\CommentaireblogType;
use App\Form\Produit\Service\EvenementType;
use App\Entity\Produit\Service\Typearticle;
use App\Form\Produit\Service\TypearticleType;
use App\Entity\Produit\Service\Evenement;
use App\Entity\Produit\Service\Imgevenement;
use General\TemplateBundle\Entites\Recherche;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;
use App\Entity\Produit\Service\Apropos;
use App\Entity\Produit\Produit\Categorie;

class ServiceController extends AbstractController
{
public function nouveauservice(GeneralServicetext $service, Request $request, $add)
{
	$em = $this->getDoctrine()->getManager();
	$nosservice = new Service($service);
    $form = $this->createForm(ServiceType::class, $nosservice);
	
	$typearticle = new Typearticle($service);
    $formtype = $this->createForm(TypearticleType::class, $typearticle);
	
	$formsupp = $this->createFormBuilder()->getForm();

	if ($request->getMethod() == 'POST'){
		$form->handleRequest($request);
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
				$type = $em->getRepository(Typearticle::class)
						   ->find($_POST['articleapropos']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'evenement' and isset($_POST['evenement']))
			{
				$type = $em->getRepository(Typearticle::class)
						   ->find($_POST['evenement']);
				if($type != null)
				{
					$nosservice->setType($type);
				}

				if(isset($_POST['evenement_date']))
				{
					$nosservice->setDateEvent(new \Datetime($_POST['evenement_date']));
				}
			}
			if($_POST['typearticle'] == 'actualite' and isset($_POST['actualite']))
			{
				$type = $em->getRepository(Typearticle::class)
						   ->find($_POST['actualite']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'demarcheaz' and isset($_POST['demarcheaz']))
			{
				$type = $em->getRepository(Typearticle::class)
						   ->find($_POST['demarcheaz']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'temoignage' and isset($_POST['temoignage']))
			{
				$type = $em->getRepository(Typearticle::class)
						   ->find($_POST['temoignage']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'mediatheque' and isset($_POST['mediatheque']))
			{
				$type = $em->getRepository(Typearticle::class)
						   ->find($_POST['mediatheque']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'planingcours' and isset($_POST['planingcours']))
			{
				$type = $em->getRepository(Typearticle::class)
						   ->find($_POST['planingcours']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'modepaiement' and isset($_POST['modepaiement']))
			{
				$type = $em->getRepository(Typearticle::class)
						   ->find($_POST['modepaiement']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'aide' and isset($_POST['aide']))
			{
				$type = $em->getRepository(Typearticle::class)
						   ->find($_POST['aide']);
				if($type != null)
				{
					$nosservice->setType($type);
				}
			}
			if($_POST['typearticle'] == 'galeriephoto' and isset($_POST['galeriephoto']))
			{
				$type = $em->getRepository(Typearticle::class)
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

	$liste_service = $em->getRepository(Service::class)
	                          ->myfindAll();
							  
	$type_article = $em->getRepository(Typearticle::class)
	                    ->findAll();	

	$type_apropos = $em->getRepository(Typearticle::class)
							  ->findBy(array('position'=>'aproposinstitut'));
							  
	$type_evenement = $em->getRepository(Typearticle::class)
							  ->findBy(array('position'=>'evenement'));
							  
	$type_actualite = $em->getRepository(Typearticle::class)
							  ->findBy(array('position'=>'actualite'));
							  
	$type_demarcheaz = $em->getRepository(Typearticle::class)
						  ->findBy(array('position'=>'demarcheaz'));
	
	$type_temoignage = $em->getRepository(Typearticle::class)
						  ->findBy(array('position'=>'temoignage'));
						  
	$type_mediatheque = $em->getRepository(Typearticle::class)
						  ->findBy(array('position'=>'mediatheque'));
	
	$type_planingcours = $em->getRepository(Typearticle::class)
						  ->findBy(array('position'=>'planingcours'));
						  
	$type_modepaiement = $em->getRepository(Typearticle::class)
						  ->findBy(array('position'=>'modepaiement'));
	
	$type_aide = $em->getRepository(Typearticle::class)
						  ->findBy(array('position'=>'aide'));
	
	$type_galeriephoto = $em->getRepository(Typearticle::class)
						  ->findBy(array('position'=>'galeriephoto'));
						

	return $this->render('Theme/Users/Adminuser/Service/nouveauservice.html.twig',
	array('form'=>$form->createView(),'formsupp'=>$formsupp->createView(),
	'formtype'=>$formtype->createView(),'add'=>$add,'type_apropos'=>$type_apropos,'type_actualite'=>$type_actualite,
	'type_temoignage'=>$type_temoignage,'type_article'=>$type_article,'liste_service'=>$liste_service,'type_evenement'=>$type_evenement,
	'type_demarcheaz'=>$type_demarcheaz,'type_mediatheque'=>$type_mediatheque,'type_planingcours'=>$type_planingcours,
	'type_modepaiement'=>$type_modepaiement,'type_aide'=>$type_aide,'type_galeriephoto'=>$type_galeriephoto));
}

public function articlespartype($idtype, $page)
{
	$em = $this->getDoctrine()->getManager();
	
	$typearticle = $em->getRepository(Typearticle::class)
	                  ->find($idtype);
	if($typearticle != null)
	{
		$liste_article = $em->getRepository(Service::class)
							->findArticleType($typearticle->getId(), $page, 30);
	}else{
		$liste_article = $em->getRepository(Service::class)
							->findAllArticle($page, 30);
	}
	$formsupp = $this->createFormBuilder()->getForm(); 	
	
	return $this->render('Theme/Users/Adminuser/Service/articlespartype.html.twig',
	array('liste_article'=>$liste_article,'typearticle'=>$typearticle,'formsupp'=>$formsupp->createView(),
	'nombrepage' => ceil(count($liste_article)/30),'page'=>$page,'idtype'=>$idtype));
}

public function listeparties(Service $article, GeneralServicetext $service)
{
	$evenement = new Evenement($service);
    $formeven = $this->createForm(EvenementType::class, $evenement);

	return $this->render('Theme/Users/Adminuser/Service/listeparties.html.twig',
	array('article'=>$article, 'formeven'=>$formeven->createView()));
}

public function modifierservice($id, GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$article = $em->getRepository(Service::class)
					->find($id);
	if($article != null)
	{
    $form = $this->createForm(ServiceType::class, $article);

	if ($request->getMethod() == 'POST'){
		$form->handleRequest($request);
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
					$type = $em->getRepository(Typearticle::class)
							   ->find($_POST['articleapropos']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'evenement' and isset($_POST['evenement']))
				{
					$type = $em->getRepository(Typearticle::class)
							   ->find($_POST['evenement']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'actualite' and isset($_POST['actualite']))
				{
					$type = $em->getRepository(Typearticle::class)
							   ->find($_POST['actualite']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				
				if($_POST['typearticle'] == 'demarcheaz' and isset($_POST['demarcheaz']))
				{
					$type = $em->getRepository(Typearticle::class)
							   ->find($_POST['demarcheaz']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'temoignage' and isset($_POST['temoignage']))
				{
					$type = $em->getRepository(Typearticle::class)
							   ->find($_POST['temoignage']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'mediatheque' and isset($_POST['mediatheque']))
				{
					$type = $em->getRepository(Typearticle::class)
							   ->find($_POST['mediatheque']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'planingcours' and isset($_POST['planingcours']))
				{
					$type = $em->getRepository(Typearticle::class)
							   ->find($_POST['planingcours']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'modepaiement' and isset($_POST['modepaiement']))
				{
					$type = $em->getRepository(Typearticle::class)
							   ->find($_POST['modepaiement']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'aide' and isset($_POST['aide']))
				{
					$type = $em->getRepository(Typearticle::class)
							   ->find($_POST['aide']);
					if($type != null)
					{
						$article->setType($type);
					}
				}
				if($_POST['typearticle'] == 'galeriephoto' and isset($_POST['galeriephoto']))
				{
					$type = $em->getRepository(Typearticle::class)
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
	
							  
	$type_article = $em->getRepository(Typearticle::class)
	                    ->findAll();	

	$type_apropos = $em->getRepository(Typearticle::class)
							  ->findBy(array('position'=>'aproposinstitut'));
							  
	$type_evenement = $em->getRepository(Typearticle::class)
					     ->findBy(array('position'=>'evenement'));
						 
	$type_actualite = $em->getRepository(Typearticle::class)
					     ->findBy(array('position'=>'actualite'));
						 
	$type_demarcheaz = $em->getRepository(Typearticle::class)
					     ->findBy(array('position'=>'demarcheaz'));
						 
	$type_temoignage = $em->getRepository(Typearticle::class)
					     ->findBy(array('position'=>'temoignage'));
	
	$type_mediatheque = $em->getRepository(Typearticle::class)
					     ->findBy(array('position'=>'mediatheque'));
						 
	$type_planingcours = $em->getRepository(Typearticle::class)
					     ->findBy(array('position'=>'planingcours'));
	
	$type_modepaiement = $em->getRepository(Typearticle::class)
					     ->findBy(array('position'=>'modepaiement'));
	
	$type_aide = $em->getRepository(Typearticle::class)
					     ->findBy(array('position'=>'aide'));
						 
	$type_galeriephoto = $em->getRepository(Typearticle::class)
						  ->findBy(array('position'=>'galeriephoto'));

	return $this->render('Theme/Users/Adminuser/Service/modifierservice.html.twig',
	array('form'=>$form->createView(),'article'=>$article,'type_actualite'=>$type_actualite,'type_temoignage'=>$type_temoignage,
	'type_apropos'=>$type_apropos,'type_evenement'=>$type_evenement,'type_demarcheaz'=>$type_demarcheaz,'type_modepaiement'=>$type_modepaiement,
	'type_mediatheque'=>$type_mediatheque,'type_planingcours'=>$type_planingcours,'type_aide'=>$type_aide,'type_galeriephoto'=>$type_galeriephoto));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function addnewressource($id, $name, GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
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
	$article = $em->getRepository(Service::class)
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
			
			
			$liste_ressource = $em->getRepository(Service::class)
								  ->findBy(array('id'=>$tab));
			foreach($liste_ressource as $ressource)
			{
				$oldarticle = $em->getRepository(Ressourcearticle::class)
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
			$liste_article = $em->getRepository(Service::class)
					            ->findPhotoArticle($article->getId());
		}else{
			$liste_article = $em->getRepository(Service::class)
					            ->findVideoArticle($article->getId());
		}
			
		return $this->render('Theme/Users/Adminuser/Service/addnewressource.html.twig',
		array('article'=>$article,'liste_article'=>$liste_article,'name'=>$name));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function menuleft()
{
	$em = $this->getDoctrine()->getManager();
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
	return $this->render('Theme/Produit/Service/Apropos/menuleft.html.twig',
	array('liste_formation'=>$liste_formation));
}

public function addevenement(Service $nosservice, GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$evenement = new Evenement($service);
    $formeven = $this->createForm(EvenementType::class, $evenement);
	if ($request->getMethod() == 'POST'){
		$formeven->handleRequest($request);
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

public function supprimevenement(Evenement $partie, Request $request )
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm();

	if ($request->getMethod() == 'POST'){
		$formsupp->handleRequest($request);
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

public function supprimerservice(Service $service, Request $request )
{
	$em = $this->getDoctrine()->getManager();
		$formsupp = $this->createFormBuilder()->getForm();
		if ($request->getMethod() == 'POST'){
			$formsupp->handleRequest($request);
			if($formsupp->isValid()){
				$liste_evenement = $em->getRepository(Evenement::class)
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

public function presentation(GeneralServicetext $ser, $id = 0)
{
	$em = $this->getDoctrine()->getManager();
	$liste_service = $em->getRepository(Service::class)
	                    ->myfindAll();
	if($id != 0)
	{
		$service = $em->getRepository(Service::class)
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
		$repository = $em->getRepository(Apropos::class);
		$liste_team = $repository->FindBy(array('particulier'=>true));
		
		$team_select = $ser->selectEntities($liste_team, 3);
		$liste_envent = $em->getRepository(Evenement::class)
						->findBy(array('service'=>$service),array('rang'=>'asc'));
		return $this->render('Theme/Produit/Service/Service/presentation.html.twig', 
		array('liste_envent'=>$liste_envent,'service'=>$service,'liste_service'=>$liste_service,'team_select'=>$team_select));
	}else{
		return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
	}
}

public function notreblog($id, $page)
{
	$em = $this->getDoctrine()->getManager();
	$typearticle = $em->getRepository(Typearticle::class)
	                 ->find($id);
	if($typearticle != null)
	{
		$liste_blog = $em->getRepository(Service::class)
	                     ->myAllBlog($typearticle->getId(),$page,8,'specialeoffert');
	}else{
		$liste_blog = $em->getRepository(Service::class)
						 ->findBlog($page,8,'specialeoffert');
	}		
					 
	return $this->render('Theme/Produit/Service/Service:notreblog.html.twig',
	array('liste_blog'=>$liste_blog,'page'=>$page,'nombrepage' => ceil(count($liste_blog)/8)));
}

public function evenements($id, $page)
{
	$em = $this->getDoctrine()->getManager();
	
	$typearticle = $em->getRepository(Typearticle::class)
	                 ->find($id);
	if($typearticle != null)
	{
		$liste_blog = $em->getRepository(Service::class)
	                     ->myAllBlog($typearticle->getId(),$page,8,'evenementautre');
	}else{
		$liste_blog = $em->getRepository(Service::class)
						 ->findBlog($page,8,'evenementautre');
	}		
	
	$event_galerie = $em->getRepository(Service::class)
						 ->findBlog(1,12,'evenementgalerie');
	$event_flash = $em->getRepository(Service::class)
						 ->findBlog($page,6,'evenementflash');
						 
	return $this->render('Theme/Produit/Service/Service/evenements.html.twig',
	array('liste_blog'=>$liste_blog,'page'=>$page,'nombrepage' => ceil(count($liste_blog)/8),
	'event_galerie'=>$event_galerie,'event_flash'=>$event_flash));
}

public function aproposdenous($position, $idtype, $idart, $page)
{
	$em = $this->getDoctrine()->getManager();

	$article = $em->getRepository(Service::class)
				  ->find($idart);
	
	$typearticle = $em->getRepository(Typearticle::class)
				      ->find($idtype);
	if($typearticle == null and $article != null)
	{
		$typearticle = $article->getType();
	}
	if($typearticle == null)
	{
		$typearticle = $em->getRepository(Typearticle::class)
				           ->findOneBy(array('position'=>$position), array('rang'=>'desc'));
	}
	if($typearticle != null)
	{
		$liste_article = $em->getRepository(Service::class)
	                        ->myAllBlog($typearticle->getId(),$page,8,$position);
	}else{ 
		$liste_article = $em->getRepository(Service::class)
						 ->findBlog($page,8,'evenement');
	}
	 
	$list_typearticle = $em->getRepository(Typearticle::class)
				           ->findBy(array('position'=>$position), array('rang'=>'desc'));

	return $this->render('Theme/Produit/Service/Service/aproposdenous.html.twig',
	array('article'=>$article,'position'=>$position,'liste_article'=>$liste_article,'page'=>$page,
	'nombrepage' => ceil(count($liste_article)/8),'idtype'=>$idtype,'typearticle'=>$typearticle,
	'list_typearticle'=>$list_typearticle));
}

public function detailarticlesupport($position)
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
		
		$article = $em->getRepository(Service::class)
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
			$type = $em->getRepository(Typearticle::class)
					   ->findOneBy(array('position'=>$_POST['type']));
					  
			if($type != null)
			{
				$article = $em->getRepository(Service::class)
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
	
	return $this->render('Theme/Produit/Service/Service/detailarticlesupport.html.twig',
	array('article'=>$article));
}

public function affichearticle(Service $service)
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
	$liste_even = $em->getRepository(Evenement::class)
	                 ->findBy(array('service'=>$service),array('rang'=>'desc'));
	$liste_com = $em->getRepository(Commentaireblog::class)
	                 ->findBy(array('service'=>$service),array('date'=>'desc'));
	$all_blog = $em->getRepository(Service::class)
	                 ->myAllBlog();
	$comment = new Commentaireblog();
    $form = $this->createForm(new CommentaireblogType, $comment);
	return $this->render('Theme/Produit/Service/Service/affichearticle.html.twig',
	array('article'=>$service,'form'=>$form->createView(),'formrecher'=>$formrecher->createView(),'all_blog'=>$all_blog,
	'liste_even'=>$liste_even,'liste_com'=>$liste_com));
	}
}

public function ajoutercommentaire(Service $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();

	$comment = new Commentaireblog();
    $form = $this->createForm(CommentaireblogType::class, $comment);
	if ($request->getMethod() == 'POST'){
	$form->handleRequest($request);
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

public function supprimercommentaire(Commentaireblog $com)
{
	$service = $com->getService();
	$em = $this->getDoctrine()->getManager();
	if($this->isGranted('ROLE_GESTION')){
		$em->remove($com);
		$em->flush();
	}
	return $this->redirect($this->generateUrl('produit_service_affiche_contenu_detaille_article_blog',array('id'=>$service->getId())));
}

public function ajouterimgservice(Service $service, Request $request, GeneralServicetext $servicetext)
{
	$em = $this->getDoctrine()->getManager();
	$imgservice = new Imgevenement();
	$form = $this->createForm(ImgevenementType::class, $imgservice);
	$formsupp = $this->createFormBuilder()->getForm();

	if($request->getMethod() == 'POST')
	{
		$form->handleRequest($request);
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
	$allimage = $em->getRepository(Imgevenement::class)
	                      ->findBy(array('service'=>$service));
    return $this->render('Theme/Users/Adminuser/Service/ajouterimgservice.html.twig',
	array('form'=>$form->createView(),'allimage'=>$allimage,'formsupp'=>$formsupp->createView(),'service'=>$service));
}

public function supprimerimgservice(Imgevenement $image, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	$service = $image->getService();

	if ($request->getMethod() == 'POST') {
		$formsupp->handleRequest($request);
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

public function modifierevenement(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	
	$partie = $em->getRepository(Evenement::class)
					->find($id);
	if($partie != null)
	{

    $formeven = $this->createForm(EvenementType::class, $partie);

	if ($request->getMethod() == 'POST'){
		$formeven->handleRequest($request);
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
	return $this->render('Theme/Users/Adminuser/Service/modifierevenement.html.twig',
	array('formeven'=>$formeven->createView(),'partie'=>$partie));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function addtypearticle(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	
	$typearticle = new Typearticle($service);
    $formtype = $this->createForm(TypearticleType::class, $typearticle);

	if ($request->getMethod() == 'POST' and isset($_POST['typeservice'])){
	$formtype->handleRequest($request);
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

public function supprimertypearticle(Typearticle $typearticle)
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

public function updatetypearticle(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$typearticle = $em->getRepository(Typearticle::class)
					->find($id);
	if($typearticle != null)
	{
    $formtype = $this->createForm(TypearticleType::class, $typearticle);

	if ($request->getMethod() == 'POST'){
		$formtype->handleRequest($request);
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
	return $this->render('Theme/Users/Adminuser/Service/updatetypearticle.html.twig',
	array('formtype'=>$formtype->createView(),'typearticle'=>$typearticle));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function detailactualite(Service $article, GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	
	return $this->render('Theme/Produit/Service/Service/detailactualite.html.twig',
	array('article'=>$article));
}

public function livresformartion(GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	return $this->render('Theme/Produit/Service/Service/livresformartion.html.twig');
}
}