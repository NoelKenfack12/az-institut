<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace App\Controller\Produit\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit\Produit\Produit;
use App\Entity\Produit\Produit\Coutlivraison;
use App\Entity\Produit\Produit\Panier;
use App\Entity\Users\User\User;
use App\Entity\Produit\Produit\Produitpanier;
use App\Entity\Produit\Produit\Imgproduit;
use App\Form\Produit\Produit\ProduitType;
use App\Form\Produit\Produit\CoutlivraisonType;
use App\Entity\Produit\Produit\Souscategorie;
use App\Entity\Produit\Produit\Categorie;
use App\Entity\General\Template\Recherche;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Service\Email\Singleemail;
use App\Entity\Produit\Produit\Caracteristiqueproduit;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProduitController extends AbstractController
{
private $params;
private $_servicemail;

public function __construct(ParameterBagInterface $params, Singleemail $servicemail)
{
	$this->params = $params;
	$this->_servicemail = $servicemail;
}

public function modifierproduit(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$produit = $em->getRepository(Produit::class)
					->find($id);
	if($produit != null)
	{
    $formpro = $this->createForm(ProduitType::class, $produit, array('cat'=>$produit->getsouscategorie()->getCategorie()));

	if ($request->getMethod() == 'POST'){
		$formpro->handleRequest($request);
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
					   
	return $this->render('Theme/Users/Adminuser/Produit/modifierproduit.html.twig',
	array('produit'=>$produit,'formpro'=>$formpro->createView()));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function miseajourproduit(Produit $produit, GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formpro = $this->createForm(ProduitType::class, $produit, array('cat'=>$produit->getsouscategorie()->getCategorie()));
	if($request->getMethod() == 'POST')
	{
		$formpro->handleRequest($request);
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

public function supprimerimage(Imgproduit $imgproduit, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 

	$produit = $imgproduit->getProduit();
	if ($request->getMethod() == 'POST') {
    $formsupp->handleRequest($request);
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

public function listeproduituser(Souscategorie $souscategorie)
{
	$em = $this->getDoctrine()->getManager();

	$liste_produit = $em->getRepository(Produit::class)
	                    ->findBy(array('souscategorie'=>$souscategorie), array('date'=>'asc'));
		   
	return $this->render('Theme/Produit/Produit/Produit/listeproduituser.html.twig', 
	array('liste_produit'=>$liste_produit,'souscategorie'=>$souscategorie,
	'categorie'=>$souscategorie->getCategorie()));
}

public function produitformation(Categorie $categorie)
{
	$em = $this->getDoctrine()->getManager();
	$liste_formation = $em->getRepository(Categorie::class)
	                         ->myTypeFormation(2);
	$categorie->setEm($em);		
	
	return $this->render('Theme/Produit/Produit/Produit/produitformation.html.twig', 
	array('categorie'=>$categorie, 'liste_formation'=>$liste_formation));
}

public function detailproduit(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$souscategorie = $produit->getSouscategorie();
	
	$liste_scat_alter = $em->getRepository(Souscategorie::class)
	                          ->topsouscategorieAlter($produit->getSouscategorie()->getCategorie()->getTypeservice(),10);
	$liste_scat = $em->getRepository(Souscategorie::class)
	                          ->topsouscategorie($produit->getSouscategorie()->getCategorie()->getTypeservice(),10);						 
	foreach($liste_scat as $scat)
	{
		$scat->setEm($em);
	}
	return $this->render('Theme/Produit/Produit/Produit/detailproduit.html.twig',
	array('produit'=>$produit, 'souscategorie'=>$souscategorie, 'liste_scat'=>$liste_scat, 'liste_scat_alter'=>$liste_scat_alter));
}

public function likeproduct()
{
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	}else{
	$id = 0;
	}
	$em = $this->getDoctrine()->getManager();
	$produit = $em->getRepository(Produit::class)
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

public function ajouterpanier()
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
	

	$oldpanier = $em->getRepository(Panier::class)
					 ->findOneBy(array('id'=>$idcard,'sousmis'=>0));
	if($oldpanier == null and $this->getUser() != null)
	{
		$oldpanier = $em->getRepository(Panier::class)
						->findOneBy(array('user'=>$this->getUser(),'sousmis'=>0));
	}
		
	
	if($type == 'fc'){
		$produit = $em->getRepository(Produit::class)
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
		$souscategorie = $em->getRepository(Souscategorie::class)
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

public function addpanier(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	if($this->getUser() != null)
	{
	$oldpanier = $em->getRepository(Panier::class)
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

public function reglementcommande()
{
	$em = $this->getDoctrine()->getManager();
	$idcard = 0;
	if(isset($_COOKIE["PIDCARD"]) and $_COOKIE["PIDCARD"] != 'empty')
	{
		$idcard = $_COOKIE["PIDCARD"];
	}
	
	$liste_prod = new \Doctrine\Common\Collections\ArrayCollection();
	$panier = $em->getRepository(Panier::class)
					 ->findOneBy(array('id'=>$idcard,'sousmis'=>0));
	if($panier == null and $this->getUser() != null)
	{
		$panier = $em->getRepository(Panier::class)
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
			return $this->render('Theme/Produit/Produit/Produit/reglementcommande.html.twig', 
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

public function editcommande()
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
	$prodpan = $em->getRepository(Produitpanier::class)
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

public function eleveproduit()
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = 0;
	}
	$prodpan = $em->getRepository(Produitpanier::class)
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

public function supprimerproduit(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$prodpan = $em->getRepository(Produitpanier::class)
	                 ->findBy(array('produit'=>$produit));
	$categorie = $produit->getSouscategorie();
		$formsupp = $this->createFormBuilder()->getForm(); 
		$request = $this->get('request');
		if ($request->getMethod() == 'POST') {
		$formsupp->handleRequest($request);
		if ($formsupp->isValid()){
			
			$caract = $em->getRepository(Caracteristiqueproduit::class)
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

public function rechercheproduit(Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$recherche = new Recherche();
	$formBuilder = $this->createFormBuilder($recherche);
	$formBuilder
              ->add('donnee', TextType::class ,array('attr'=>array('class'=>'form-control police2','placeholder'=>'Retrouver un produit','type'=>'search')));
	$formrecher = $formBuilder->getForm();
	$liste_produit = null;
	if ($request->getMethod() == 'POST') {
		$formrecher->handleRequest($request);
		if ($formrecher->isValid()){
	     $liste_produit = $em->getRepository(Produit::class)
						     ->findProduit($recherche->getDonnee());
		}
	}
	return $this->render('Theme/Produit/Produit/Produit/recherche.html.twig', array('liste_produit'=>$liste_produit,'donnee'=>$recherche->getDonnee()));
}

public function addcoutlivraison(Produit $produit, Request $request, GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	$coutlivraison = new Coutlivraison($service);
	$formlivraison = $this->createForm(CoutlivraisonType::class, $coutlivraison);

	if ($request->getMethod() == 'POST'){
	$formlivraison->handleRequest($request);
	$coutlivraison->setUser($this->getUser());
	$coutlivraison->setProduit($produit);
	$oldcout = $em->getRepository(Coutlivraison::class)
				  ->findOneBy(array('ville'=>$coutlivraison->getVille(),'produit'=>$produit));
		if($formlivraison->isValid() and $oldcout == null){
			$em->persist($coutlivraison);
			$em->flush();
			$this->get('session')->getFlashBag()->add('informationsupp','Enregistrement effectué avec succès');
		}
	}
	return $this->redirect($this->generateUrl('users_adminuser_update_courant_produit',array('id'=>$produit->getId())));
}

public function modifcoutlivraison(Coutlivraison $coutlivraison)
{
	$em = $this->getDoctrine()->getManager();
    if (isset($_POST['coutlivraison']) and is_numeric($_POST['coutlivraison'])){
		$coutlivraison->setMontant(htmlspecialchars($_POST['coutlivraison']));
		$em->flush();
		$this->get('session')->getFlashBag()->add('informationsupp','Enregistrement effectué avec succès');
	}
	return $this->redirect($this->generateUrl('users_adminuser_update_courant_produit',array('id'=>$coutlivraison->getProduit()->getId())));
}

public function supprimercoutlivraison(Coutlivraison $coutlivraison)
{
	$produit = $coutlivraison->getProduit();
	$em = $this->getDoctrine()->getManager();
	$em->remove($coutlivraison);
	$em->flush();
	return $this->redirect($this->generateUrl('users_adminuser_update_courant_produit',array('id'=>$produit->getId())));
}

public function accueilboutique()
{
	$em = $this->getDoctrine()->getManager();
	$top_produit = $em->getRepository(Produit::class)
	                      ->findBestProduit(15);
	return $this->render('Theme/Produit/Produit/Produit/accueilboutique.html.twig',array('top_produit'=>$top_produit));
}

public function modalsouscriptionservice()
{
	$em = $this->getDoctrine()->getManager();
	return $this->render('Theme/Produit/Produit/Produit/modalsouscriptionservice.html.twig');
}
}