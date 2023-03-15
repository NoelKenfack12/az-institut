<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace Produit\ProduitBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ProduitBundle\Entity\Produit;
use Produit\ProduitBundle\Entity\Coutlivraison;
use Produit\ProduitBundle\Entity\Panier;
use Users\UserBundle\Entity\User;
use Produit\ProduitBundle\Entity\Produitpanier;
use Produit\ProduitBundle\Entity\Imgproduit;
use Produit\ProduitBundle\Form\ProduitType;
use Produit\ProduitBundle\Form\CoutlivraisonType;
use Produit\ProduitBundle\Entity\Souscategorie;
use Produit\ProduitBundle\Entity\Categorie;
use General\TemplateBundle\Entites\Recherche;

class ProduitController extends Controller
{
public function modifierproduitAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$produit = $em->getRepository('ProduitProduitBundle:Produit')
					->find($id);
	if($produit != null)
	{
    $formpro = $this->createForm(new ProduitType($produit->getsouscategorie()->getCategorie()), $produit);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		$formpro->bind($request);
		$produit->setServicetext($service);
		if($produit->getImgproduit() != null)
		{
			$produit->getImgproduit()->setServicetext($service);
		}
		if ($formpro->isValid()){
			
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie', array('id'=>$produit->getSouscategorie()->getId())));
	}
					   
	return $this->render('UsersAdminuserBundle:Produit:modifierproduit.html.twig',
	array('produit'=>$produit,'formpro'=>$formpro->createView()));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function miseajourproduitAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$request = $this->getRequest();
	$formpro = $this->createForm(new ProduitType($produit->getsouscategorie()->getCategorie()), $produit);
	if($request->getMethod() == 'POST')
	{
		$formpro->bind($request);
		$produit->setUser($this->getUser());
		$imgpro = $produit->getImgpro();
		$imgpro->setServicetext($service);
		$imgpro->setProduit($produit);
		$liste_img = $produit->getImgproduits();
		$nbimgproduit = $this->container->getParameter('nbimgparproduit');
		if($formpro->isValid() and count($liste_img) <= $nbimgproduit){
			$em->persist($imgpro);
			$em->flush();
		}else{
			if( count($liste_img) > $nbimgproduit )
			{
			  $this->get('session')->getFlashBag()->add('images','Trop d\'image pour ce produit.');
			}else{
			  $this->get('session')->getFlashBag()->add('images','Données invalides.');
			}
		}
	}
	return $this->redirect($this->generateUrl('users_adminuser_update_courant_produit',array('id'=>$produit->getId())));
}

public function supprimerimageAction(Imgproduit $imgproduit)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
    $request = $this->get('request');
	$produit = $imgproduit->getProduit();
	if ($request->getMethod() == 'POST') {
    $formsupp->bind($request);
    if ($formsupp->isValid()){
	if(count($produit->getImgproduits()) > 1)
	{
	$em->remove($imgproduit);
    $em->flush();
	$this->get('session')->getFlashBag()->add('informationsupp','Suppression effectuée avec succés');
	}else{
	$this->get('session')->getFlashBag()->add('informationsupp','Un produit doit avoir au mions une images');
	}
	return $this->redirect($this->generateUrl('users_adminuser_update_courant_produit',array('id'=>$produit->getId())));
	}
	}
    $this->get('session')->getFlashBag()->add('supprime_image',$imgproduit->getId());
	$this->get('session')->getFlashBag()->add('supprime_image',$imgproduit->getProduit()->getNom());
	return $this->redirect($this->generateUrl('users_adminuser_update_courant_produit',array('id'=>$produit->getId())));
}

public function listeproduituserAction(Souscategorie $souscategorie)
{
	$em = $this->getDoctrine()->getManager();

	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                    ->findBy(array('souscategorie'=>$souscategorie), array('date'=>'asc'));
		   
	return $this->render('ProduitProduitBundle:Produit:listeproduituser.html.twig', 
	array('liste_produit'=>$liste_produit,'souscategorie'=>$souscategorie,
	'categorie'=>$souscategorie->getCategorie()));
}

public function produitformationAction(Categorie $categorie)
{
	$em = $this->getDoctrine()->getManager();
	$liste_formation = $em->getRepository('ProduitProduitBundle:Categorie')
	                         ->myTypeFormation(2);
	$categorie->setEm($em);		
	
	return $this->render('ProduitProduitBundle:Produit:produitformation.html.twig', 
	array('categorie'=>$categorie, 'liste_formation'=>$liste_formation));
}

public function detailproduitAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$souscategorie = $produit->getSouscategorie();
	
	$liste_scat_alter = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                          ->topsouscategorieAlter($produit->getSouscategorie()->getCategorie()->getTypeservice(),10);
	$liste_scat = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                          ->topsouscategorie($produit->getSouscategorie()->getCategorie()->getTypeservice(),10);						 
	foreach($liste_scat as $scat)
	{
		$scat->setEm($em);
	}
	return $this->render('ProduitProduitBundle:Produit:detailproduit.html.twig',
	array('produit'=>$produit, 'souscategorie'=>$souscategorie, 'liste_scat'=>$liste_scat, 'liste_scat_alter'=>$liste_scat_alter));
}

public function likeproductAction()
{
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	}else{
	$id = 0;
	}
	$em = $this->getDoctrine()->getManager();
	$produit = $em->getRepository('ProduitProduitBundle:Produit')
	                 ->find($id);
	if($produit != null and $this->getUser() != null){
	$userlikes = $produit->getUserlikes();
	$trouve = false;
	foreach($userlikes as $user)
	{
		if($this->getUser() == $user)
		{
			$trouve = true;
		}
	}
	if($trouve == false)
	{
		$produit->addUserlike($this->getUser());
		$em->flush();
	}
	echo 1;
	exit;
	}else{
	echo 0;
	exit;
	}
}

public function ajouterpanierAction()
{
	if(isset($_POST['id']))
	{
		$id = $_POST['id'];
	}else{
		$id = 0;
	}
	
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}else{
		$type = 'fc';
	}
	
	$em = $this->getDoctrine()->getManager();
	$idcard = 0;
	if(isset($_COOKIE["PIDCARD"]) and $_COOKIE["PIDCARD"] != 'empty')
	{
		$idcard = $_COOKIE["PIDCARD"];
	}
	

	$oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
					 ->findOneBy(array('id'=>$idcard,'sousmis'=>0));
	if($oldpanier == null and $this->getUser() != null)
	{
		$oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
						->findOneBy(array('user'=>$this->getUser(),'sousmis'=>0));
	}
		
	
	if($type == 'fc'){
		$produit = $em->getRepository('ProduitProduitBundle:Produit')
					  ->find($id);
		if($produit != null){
			if($oldpanier == null)
			{
				$panier = new Panier();
				$panier->setUser($this->getUser());
				$em->persist($panier);
				
				$produitpanier = new Produitpanier();
				$produitpanier->setPanier($panier);
				$produitpanier->setProduit($produit);
				$em->persist($produitpanier);
				$em->flush();
				
				// Stock les infos du cookie
				$cookie_info = array(
					'name'  => 'PIDCARD',
					'value' => $panier->getId(),
					'time'  => time() + (3600 * 24 * 360)
				);
				
				// Cree le cookie
				setCookie($cookie_info['name'], $cookie_info['value'], $cookie_info['time'],'/');
				setCookie('PIDCARDDUR',$cookie_info['time'], $cookie_info['time'],'/');
			}else{
				if(count($oldpanier->getProduitpaniers()) != 0)
				{
					$listprod = $oldpanier->getProduitpaniers();
					
					$trouve = false;
					foreach($listprod as $prod)
					{
						if($prod->getProduit() == $produit)
						{
							if($prod->getQuantite() < 1)
							{
								$prod->setQuantite($prod->getQuantite() + 1);
								$trouve = true;
								break;
							}else{
								$trouve = true;
								break;
							}
						}
					}
					
					if($trouve == false)
					{
						$produitpanier = new Produitpanier();
						$produitpanier->setPanier($oldpanier);
						$produitpanier->setProduit($produit);
						$em->persist($produitpanier);
					}
				}else{
					$produitpanier = new Produitpanier();
					$produitpanier->setPanier($oldpanier);
					$produitpanier->setProduit($produit);
					$em->persist($produitpanier);
				}
				$em->flush();
			}
		echo 1;
		exit;
		}else{
			echo 0;
			exit;
		}
	}else{
		$souscategorie = $em->getRepository('ProduitProduitBundle:Souscategorie')
					        ->find($id);
		if($souscategorie != null)
		{
		foreach($souscategorie->getProduits() as $produit)
		{
			if($oldpanier == null)
			{
				$panier = new Panier();
				$panier->setUser($this->getUser());
				$em->persist($panier);
				
				$produitpanier = new Produitpanier();
				$produitpanier->setPanier($panier);
				$produitpanier->setProduit($produit);
				$em->persist($produitpanier);
				$em->flush();
				
				// Stock les infos du cookie
				$cookie_info = array(
					'name'  => 'PIDCARD',
					'value' => $panier->getId(),
					'time'  => time() + (3600 * 24 * 360)
				);
				
				// Cree le cookie
				setCookie($cookie_info['name'], $cookie_info['value'], $cookie_info['time'],'/');
				setCookie('PIDCARDDUR',$cookie_info['time'], $cookie_info['time'],'/');
				$oldpanier = $panier;
			}else{
				$produitpanier = new Produitpanier();
				$produitpanier->setPanier($oldpanier);
				$produitpanier->setProduit($produit);
				$em->persist($produitpanier);
				$em->flush();
			}
			echo 1;
			exit;
		}
		}else{
			echo 0;
			exit;
		}
	}
}

public function addpanierAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	if($this->getUser() != null)
	{
	$oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
	                 ->findOneBy(array('user'=>$this->getUser(),'payer'=>0));
		if($oldpanier == null)
		{
			$panier = new Panier();
			$panier->setUser($this->getUser());
			$em->persist($panier);
			$produitpanier = new Produitpanier();
			$produitpanier->setPanier($panier);
			$produitpanier->setProduit($produit);
			$em->persist($produitpanier);
			$em->flush();
		}else{
			if(count($oldpanier->getProduitpaniers()) != 0)
			{
				$listprod = $oldpanier->getProduitpaniers();
				$trouve = false;
				foreach($listprod as $prod)
				{
					if($prod->getProduit() == $produit)
					{
						$prod->setQuantite($prod->getQuantite() + 1);
						$trouve = true;
						break;
					}
				}
				if($trouve == false)
				{
					$produitpanier = new Produitpanier();
					$produitpanier->setPanier($oldpanier);
					$produitpanier->setProduit($produit);
					$em->persist($produitpanier);
				}
			}else{
				$produitpanier = new Produitpanier();
				$produitpanier->setPanier($oldpanier);
				$produitpanier->setProduit($produit);
				$em->persist($produitpanier);
			}
			$em->flush();
		}
	$this->get('session')->getFlashBag()->add('ajoutproduit','Produit ajouter avec succès');
	}else{
	$this->get('session')->getFlashBag()->add('ajoutproduit','Une erreur a été rencontrée !');
	}
	return $this->redirect($this->generateUrl('produit_produit_liste_produit_souscategorie',array('id'=>$produit->getSouscategorie()->getId())));
}

public function reglementcommandeAction()
{
	$em = $this->getDoctrine()->getManager();
	$idcard = 0;
	if(isset($_COOKIE["PIDCARD"]) and $_COOKIE["PIDCARD"] != 'empty')
	{
		$idcard = $_COOKIE["PIDCARD"];
	}
	
	$liste_prod = new \Doctrine\Common\Collections\ArrayCollection();
	$panier = $em->getRepository('ProduitProduitBundle:Panier')
					 ->findOneBy(array('id'=>$idcard,'sousmis'=>0));
	if($panier == null and $this->getUser() != null)
	{
		$panier = $em->getRepository('ProduitProduitBundle:Panier')
					    ->findOneBy(array('user'=>$this->getUser(),'sousmis'=>0));
	}
	if($panier != null)
	{
		$nbprod = 0;
		$produitpanier = null;
		
		$produitpanier = $panier->getProduitpaniers();
		foreach($produitpanier as $prodpan)
		{
			$nbprod = $nbprod + $prodpan->getQuantite();
			$prodpan->getProduit()->setEm($em);
		}

		if(count($produitpanier) > 0)
		{
			return $this->render('ProduitProduitBundle:Produit:reglementcommande.html.twig', 
			array('panier'=>$panier,'produitpanier'=>$produitpanier,'nbprod'=>$nbprod));
		}else{
			echo 2;
			exit;
		}
	}else{
		echo 0;
		exit;
	}
}

public function editcommandeAction()
{
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	}else{
	$id = 0;
	}
	if(isset($_GET['quantite']))
	{
	$quantite = $_GET['quantite'];
	}else{
	$quantite = 0;
	}
	$em = $this->getDoctrine()->getManager();
	$prodpan = $em->getRepository('ProduitProduitBundle:Produitpanier')
	                 ->find($id);
	if($prodpan != null)
	{
		$prodpan->setQuantite($quantite);
		$em->flush();
	echo 1;
	exit;
	}else{
	echo 0;
	exit;
	}
}

public function eleveproduitAction()
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = 0;
	}
	$prodpan = $em->getRepository('ProduitProduitBundle:Produitpanier')
	                 ->find($id);
	
	$idcard = 0;
	if(isset($_COOKIE["PIDCARD"]) and $_COOKIE["PIDCARD"] != 'empty')
	{
		$idcard = $_COOKIE["PIDCARD"];
	}
		
	if($prodpan != null and (($this->getUser() == $prodpan->getpanier()->getUser()) or $prodpan->getPanier()->getId() == $idcard))
	{
		$panier = $prodpan->getPanier();
		$em = $this->getDoctrine()->getManager();
		$em->remove($prodpan);
		$em->flush();
		
		echo 1;
		exit;
	}
	echo 0;
	exit;
}

public function supprimerproduitAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$prodpan = $em->getRepository('ProduitProduitBundle:Produitpanier')
	                 ->findBy(array('produit'=>$produit));
	$categorie = $produit->getSouscategorie();
		$formsupp = $this->createFormBuilder()->getForm(); 
		$request = $this->get('request');
		if ($request->getMethod() == 'POST') {
		$formsupp->bind($request);
		if ($formsupp->isValid()){
			
			$caract = $em->getRepository('ProduitProduitBundle:Caracteristiqueproduit')
	                    ->findBy(array('produit'=>$produit));
					 
			if(count($prodpan) == 0 and count($caract) == 0){
				$em->remove($produit);
				$em->flush();
				$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
			}else{
				$this->get('session')->getFlashBag()->add('information','Action réfusée ! ce produit est déjà reservé par un utilisateur.');
			}
		}
		}else{
			$this->get('session')->getFlashBag()->add('supprime_prod',$produit->getId());
			$this->get('session')->getFlashBag()->add('supprime_prod',$produit->getNom());
		}
	return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie',array('id'=>$categorie->getId())));
}

public function rechercheproduitAction()
{
	$em = $this->getDoctrine()->getManager();
	$recherche = new Recherche();
	$formBuilder = $this->createFormBuilder($recherche);
	$formBuilder
              ->add('donnee', 'text',array('attr'=>array('class'=>'form-control police2','placeholder'=>'Retrouver un produit','type'=>'search')));
	$formrecher = $formBuilder->getForm();
	$liste_produit = null;
	$request = $this->get('request');
	if ($request->getMethod() == 'POST') {
		$formrecher->bind($request);
		if ($formrecher->isValid()){
	     $liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
						     ->findProduit($recherche->getDonnee());
		}
	}
	return $this->render('ProduitProduitBundle:Produit:recherche.html.twig', array('liste_produit'=>$liste_produit,'donnee'=>$recherche->getDonnee()));
}
public function addcoutlivraisonAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$coutlivraison = new Coutlivraison($service);
	$formlivraison = $this->createForm(new CoutlivraisonType(), $coutlivraison);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$formlivraison->bind($request);
	$coutlivraison->setUser($this->getUser());
	$coutlivraison->setProduit($produit);
	$oldcout = $em->getRepository('ProduitProduitBundle:Coutlivraison')
						     ->findOneBy(array('ville'=>$coutlivraison->getVille(),'produit'=>$produit));
    if ($formlivraison->isValid() and $oldcout == null){
		$em->persist($coutlivraison);
		$em->flush();
		$this->get('session')->getFlashBag()->add('informationsupp','Enregistrement effectué avec succès');
	}
	}
	return $this->redirect($this->generateUrl('users_adminuser_update_courant_produit',array('id'=>$produit->getId())));
}
public function modifcoutlivraisonAction(Coutlivraison $coutlivraison)
{
	$em = $this->getDoctrine()->getManager();
    if (isset($_POST['coutlivraison']) and is_numeric($_POST['coutlivraison'])){
		$coutlivraison->setMontant(htmlspecialchars($_POST['coutlivraison']));
		$em->flush();
		$this->get('session')->getFlashBag()->add('informationsupp','Enregistrement effectué avec succès');
	}
	return $this->redirect($this->generateUrl('users_adminuser_update_courant_produit',array('id'=>$coutlivraison->getProduit()->getId())));
}
public function supprimercoutlivraisonAction(Coutlivraison $coutlivraison)
{
	$produit = $coutlivraison->getProduit();
	$em = $this->getDoctrine()->getManager();
	$em->remove($coutlivraison);
	$em->flush();
	return $this->redirect($this->generateUrl('users_adminuser_update_courant_produit',array('id'=>$produit->getId())));
}
public function accueilboutiqueAction()
{
	$em = $this->getDoctrine()->getManager();
	$top_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                      ->findBestProduit(15);
	return $this->render('ProduitProduitBundle:Produit:accueilboutique.html.twig',array('top_produit'=>$top_produit));
}

public function modalsouscriptionserviceAction()
{
	$em = $this->getDoctrine()->getManager();
	return $this->render('ProduitProduitBundle:Produit:modalsouscriptionservice.html.twig');
}
}