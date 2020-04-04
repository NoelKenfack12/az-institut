<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace Produit\ProduitBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ProduitBundle\Entity\Produit;
use Produit\ProduitBundle\Entity\Partiecours;
use Produit\ProduitBundle\Entity\Coutlivraison;
use Produit\ProduitBundle\Entity\Panier;
use Produit\ServiceBundle\Entity\Quartier;
use Produit\ServiceBundle\Entity\Ville;
use Users\UserBundle\Entity\User;
use Produit\ProduitBundle\Entity\Produitpanier;
use Produit\ProduitBundle\Entity\Imgproduit;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Produit\ProduitBundle\Form\ProduitType;
use Produit\ProduitBundle\Form\PartiecoursType;
use Produit\ProduitBundle\Form\CoutlivraisonType;
use Produit\ProduitBundle\Entity\Souscategorie;
use General\TemplateBundle\Entites\Recherche;
use Users\UserBundle\Entity\Newsletter;

use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;
use General\ServiceBundle\AfPdf\PDF;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ProduitController extends Controller
{
public function ajouterproduitAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');

	$produit = new Produit($service);
	$formpro = $this->createForm(new ProduitType(), $produit); 
	
	$request = $this->get('request');
	if ($request->getMethod() == 'POST' and $this->getUser() != null){
    $formpro->bind($request);
	if($formpro->isValid()){
		if($produit->getImgproduit() != null)
		{
			$produit->getImgproduit()->setServicetext($service);
		}
		if($produit->getVideoproduit() != null)
		{
			$produit->getVideoproduit()->setServicetext($service);
		}
		$produit->setUser($this->getUser());
		$em->persist($produit);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','Votre cours a été enregistré avec succès.');
		
		//envoie d'email
		$siteweb = $this->container->getParameter('siteweb');
		$sitename = $this->container->getParameter('sitename');
		$emailadmin = $this->container->getParameter('emailadmin');
		if($service->email($emailadmin))
		{
			$mail = new Afmail();
			
			$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
			$mail->setSubject($this->getUser()->name(30).' viens de démarrer avec la rédaction d\'un nouveau cours sur '.$sitename); 
			$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>'Team '.$sitename,'titre' => $this->getUser()->name(30).' viens de démarrer avec la rédaction d\'un nouveau cours sur '.$sitename ,'contenu'=> 'Vérifier l\'état de ce cours en cliquant ce lien <a href="'.$siteweb.'/packagewebsiteadmin/liste/produit/souscategorie/'.$produit->getSouscategorie()->getId().'">'.$siteweb.'/packagewebsiteadmin/liste/produit/souscategorie/'.$produit->getSouscategorie()->getId().'</a>')));
			$mail->setTextCharset('utf-8');
			$mail->setHTMLCharset('utf-8');
			$result = $mail->send(array($emailadmin));
		}
		return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId())));
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
	}
	}
				  
	return $this->render('ProduitProduitBundle:Produit:ajouterproduit.html.twig', 
	array('formpro'=>$formpro->createView()));
}

public function modifierproduitAction(Produit $produit)
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$formpro = $this->createForm(new ProduitType(), $produit); 
		
	if(($produit->getUser() != null and $produit->getUser() == $this->getUser()) or $this->get('security.context')->isGranted('ROLE_GESTION'))
	{
		$request = $this->get('request');
		if ($request->getMethod() == 'POST'){
		$formpro->bind($request);
		
		$produit->setUser($this->getUser());
		
		if($produit->getImgproduit() != null)
		{
			$produit->getImgproduit()->setServicetext($service);
		}
		if($produit->getVideoproduit() != null)
		{
			$produit->getVideoproduit()->setServicetext($service);
		}
		
		$produit->setServicetext($service);

		if($formpro->isValid()){
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Votre cours a été modifié avec succès.');
			return $this->redirect($this->generateUrl('produit_produit_detail_produit_market',array('id'=>$produit->getId())));
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!!');
		}
		}

		return $this->render('ProduitProduitBundle:Produit:modifierproduit.html.twig',
		array('produit'=>$produit,'formpro'=>$formpro->createView()));
	}else{
		//envoie d'email
		$this->get('session')->getFlashBag()->add('information','Echec ! vous n\'avez pas le droit d\'effectuer cette action.');
	}
	return $this->redirect($this->generateUrl('produit_produit_ajouter_nouveau_produit'));
}

public function menucoursAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$liste_categorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                      ->findAll();
	$categorie = $service->selectEntity($liste_categorie);
	$nbproduit = '';
	$liste_scat = new \Doctrine\Common\Collections\ArrayCollection();
	if($categorie != null)
	{
		$produit_cat = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                      ->findNbProduitCat($categorie->getId());
		foreach($produit_cat as $valeur)
		{
			$nbproduit = $valeur['val'];
		}
		$liste_scat = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                      ->findBy(array('categorie'=>$categorie), array('rang'=>'desc'));
	}
	
	return $this->render('ProduitProduitBundle:Produit:menucours.html.twig',
	array('categorie'=>$categorie,'nbproduit'=>$nbproduit,'liste_scat'=>$liste_scat));
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

public function listeproduituserAction(Souscategorie $scat, $page)
{
	$em = $this->getDoctrine()->getManager();
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                    ->listeproduituser($scat->getId(),$page,16);
	$nombrepage = ceil(count($liste_produit)/16);

	return $this->render('ProduitProduitBundle:Produit:listeproduituser.html.twig', 
	array('scat'=>$scat,'liste_produit'=>$liste_produit,'nombrepage'=>$nombrepage,'page'=>$page));
}

public function alterprixproduitAction(Produit $produit)
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$souscategorie = $produit->getSouscategorie();
	
	$request = $this->get('request');
	if($request->getMethod() == 'POST' and isset($_POST['prixproduit']) and isset($_POST['dureeformation']) and is_numeric($_POST['prixproduit']) and is_numeric($_POST['dureeformation'])){
		$produit->setNewprise($_POST['prixproduit']);
		$produit->setDureeacces($_POST['dureeformation']);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Succès ! Prix mis à jour avec succès.');
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec de validation du prix.');
	}
	if($produit->getValide() == true)
	{
	return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie',array('id'=>$produit->getSouscategorie()->getId())));
	}else{
	return $this->redirect($this->generateUrl('users_adminuser_prod_invalide_courant_souscategorie',array('id'=>$produit->getSouscategorie()->getId())));
	}
}

public function moduleformationAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$liste_categorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                      ->findAll();
	$categorie = $service->selectEntity($liste_categorie);
	$liste_scat = new \Doctrine\Common\Collections\ArrayCollection();
	if($categorie != null)
	{
		$liste_scat = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                      ->findBy(array('categorie'=>$categorie), array('rang'=>'asc'));
	}
	return $this->render('ProduitProduitBundle:Produit:moduleformation.html.twig', 
	array('liste_scat'=>$liste_scat));
}

public function detailproduitAction(Produit $produit)
{
	if($produit->getValide() == true or ($produit->getValide() == false and $produit->getUser() == $this->getUser()) or ($produit->getValide() == false and $this->get('security.context')->isGranted('ROLE_GESTION')) or (isset($_GET['codeadmin']) and $_GET['codeadmin'] == 10001))
	{
	if(isset($_GET['codeadmin']))
	{
		$codeadmin = $_GET['codeadmin'];
	}else{
		$codeadmin = 0;
	}
	$em = $this->getDoctrine()->getManager();
	
	$partie = new Partiecours();
	$form = $this->createForm(new PartiecoursType(), $partie); 
	
	$liste_part = $em->getRepository('ProduitProduitBundle:Partiecours')
	                      ->findBy(array('produit'=>$produit), array('rang'=>'asc'));
	foreach($liste_part as $part)
	{
		$part->setEm($em);
	}
	$formsupp = $this->createFormBuilder()->getForm(); 
	
	$session = $this->get('session');

	if($this->getUser() != null)
	{
	$listelikes = $produit->getUserlikes();
	$trouve = false;
	foreach($listelikes as $ser)
	{
		if($this->getUser() == $ser)
		{
			$trouve = true;
			break;
		}
	}
	
	if($trouve == false)
	{
		$produit->addUserlike($this->getUser());
	}
	}else{
		$liste_prod = $session->get('like_produit');
		if($liste_prod != null)
		{
		$tabprod = explode('-',$liste_prod);
		$addlike = true;
		for($i = 0; $i < count($tabprod); $i++)
		{
			if($tabprod[$i] == $produit->getId())
			{
				$addlike = false;
				break;
			}
		}
		
		if($addlike == true)
		{
			$session->set('like_produit',$session->get('like_produit').'-'.$produit->getId());
		}
		
		}else{
			$session->set('like_produit',$produit->getId());
			$addlike = true;
		}
		
		if($addlike == true)
		{
			$produit->setNblike($produit->getNblike() + 1);
		}
	}
	$em->flush();
	
	$bestpanier = null;
	$prodpan = null;
	if($this->getUser() != null)
	{
	$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
						  ->findBy(array('user'=>$this->getUser(),'valide'=>1));
	//on cherche à retenir le bon panier .
	foreach($liste_oldpanier as $panier)  //uno    -    le panier lié à un service (une offre de formation) est prio
	{
		$trouve = false;
		foreach($panier->getProduitpaniers() as $propan)
		{
			if($propan->getProduit() == $produit)
			{
				$trouve = true;
				break;
			}
		}
		if($panier->getservice() != null and $trouve == true)
		{
			$bestpanier = $panier;
			break;
		}
	}
	
	if($bestpanier == null)
	{
		foreach($liste_oldpanier as $panier)  // secondo    -    Le panier lié à un produit est bon, s'il ya aucun lié à un service
		{
			$trouve = false;
			foreach($panier->getProduitpaniers() as $propan)
			{
				if($propan->getProduit() == $produit)
				{
					$trouve = true;
					break;
				}
			}
			if($panier->getservice() == null and $panier->getChapitrecours() == null and $trouve == true)
			{
				$bestpanier = $panier;
				break;
			}
		}
	}
	}
	
	if($bestpanier != null)
	{
		foreach($bestpanier->getProduitpaniers() as $propan)
		{
			if($propan->getProduit() == $produit)
			{
				$prodpan = $propan;
				break;
			}
		}
	}
	
	$service = $this->container->get('general_service.servicetext');
	$produit->setEm($em);
	return $this->render('ProduitProduitBundle:Produit:detailproduit.html.twig', 
	array('produit'=>$produit,'prodpan'=>$prodpan,'codeadmin'=>$codeadmin,'bareme'=>$service->getBareme(),'formsupp'=>$formsupp->createView(),'form'=>$form->createView(),'liste_part'=>$liste_part));
	}else{
	
	$this->get('session')->getFlashBag()->add('alertnewsletter','<span class="fa fa-warning"></span> Echec ! vous n\\\'avez pas le droit d\\\'accéder à cette ressource !');

	}
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
}

public function addquartiervilleAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_POST['ville']) and is_numeric($_POST['ville']) and isset($_POST['quartier']))
	{
		$ville = $em->getRepository('ProduitServiceBundle:Ville')
	                ->find($_POST['ville']);
		if($ville != null)
		{
			$quartier = $em->getRepository('ProduitServiceBundle:Quartier')
	                       ->findOneBy(array('nom'=>$_POST['quartier'], 'ville'=>$ville));
			if($quartier != null)
			{
				$produit->setQuartier($quartier);
				$em->flush();
			}else{
				$quartier = new Quartier($service);
				$quartier->setNom($_POST['quartier']);
				$quartier->setVille($ville);
				$em->persist($quartier);
				$produit->setQuartier($quartier);
				$em->flush();
			}
			$this->get('session')->getFlashBag()->add('information','Enregistrez avec succès !');
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec ! Toutes les données n\'ont pas été reçu.');
	}
	return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId())));
}

public function inscriptionuserAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_POST['ville']) and is_numeric($_POST['ville']) and isset($_POST['password']))
	{
		$ville = $em->getRepository('ProduitServiceBundle:Ville')
	                ->find($_POST['ville']);
		if($ville != null)
		{
			$oluser = $em->getRepository('UsersUserBundle:User')
	                       ->findOneBy(array('username'=>$produit->getMail()));
			if($oluser == null)
			{
				$user = new User($service);
				$user->setNom($produit->getUsername());
				$user->setUsername($produit->getMail());
				$user->setPassword($produit->getTel());
				$user->setTel($_POST['password']);
				$user->setVille($ville);
				$user->setNbannonce(1);
				$em->persist($user);
				$em->flush();
				$produit->setUser($user);
				$em->flush();
				$this->get('session')->getFlashBag()->add('information','Inscription effectué avec succès !');

				$token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
				// On passe le token crée au service security context afin que l'utilisateur soit authentifié
				$this->get('security.context')->setToken($token);
				return $this->redirect($this->generateUrl('users_user_user_accueil',array('id'=>$user->getId())));
			}else{
				$this->get('session')->getFlashBag()->add('information','Un utilisateur à déjà cette adresse e-mail');
				return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId(),'verifier'=>1)));
			}
		}else{
			$this->get('session')->getFlashBag()->add('information','Aucune ville sélectionnée !');
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec ! Toutes les données n\'ont pas été reçu.');
	}
	return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId())));
}

public function connexionuserAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_POST['username']) and isset($_POST['password']))
	{
		$user = $em->getRepository('UsersUserBundle:User')
	                       ->findOneBy(array('username'=>$produit->getMail(),'password'=>$_POST['password']));
		if($user != null)
		{
			$user->setNbannonce($user->getNbannonce() + 1);
			$produit->setUser($user);
			$produit->setMail($user->getUsername());
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Connexion effectué avec succès !');

			$token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
			// On passe le token crée au service security context afin que l'utilisateur soit authentifié
			$this->get('security.context')->setToken($token);
			return $this->redirect($this->generateUrl('users_user_user_accueil',array('id'=>$user->getId())));
		}else{
			$this->get('session')->getFlashBag()->add('information','Echec de connexion');
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec ! Toutes les données n\'ont pas été reçu.');
	}
	return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId(),'verifier'=>2)));
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
	$service = $em->getRepository('ProduitServiceBundle:Commentaireblog')
	              ->find($id);
	if($service != null and $this->getUser() != null){
	$servicelikes = $this->getUser()->getSujetepingles();
	$trouve = false;
	foreach($servicelikes as $ser)
	{
		if($service == $ser)
		{
			$trouve = true;
			break;
		}
	}
	if($trouve == false)
	{
		$this->getUser()->addSujetepingle($service);
		$em->flush();
	}
	echo 1;
	exit;
	}else{
	echo 0;
	exit;
	}
}

public function ajouterpanierAction(Produit $produit)
{
if(isset($_POST['_password']))
{
	$em = $this->getDoctrine()->getManager();
	//$nbjour = $this->date->diff(new \Datetime())->days;
	if($this->getUser()->getSoldeprincipal() >= $produit->getNewprise())
	{
		if($this->getUser()->getPassword() == $_POST['_password'])
		{
			$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
							      ->findBy(array('user'=>$this->getUser(),'valide'=>1));
			$souscription = true;
			foreach($liste_oldpanier as $panier)
			{
				$produitpaniers = $panier->getProduitpaniers();
				foreach($produitpaniers as $propan)
				{
					if($propan->getProduit() == $produit and $panier->getChapitrecours() == null)
					{
						$souscription = false;
						break;
					}
				}
				if($souscription == false)
				{
					break;
				}
			}
			
			
			if($souscription == true)
			{
				$this->getUser()->setSoldeprincipal($this->getUser()->getSoldeprincipal() - $produit->getNewprise());
				
				//s'il n'est pas inscrit au cours courant, on vérifie s'il a déjà été inscrit à ce cours.
				
				$liste_oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
							      ->findBy(array('user'=>$this->getUser(),'valide'=>0));
				$lastpanier = null;
				foreach($liste_oldpanier as $panier)
				{
					$produitpaniers = $panier->getProduitpaniers();
					foreach($produitpaniers as $propan)
					{
						if($propan->getProduit() == $produit and $panier->getChapitrecours() == null)
						{
							$lastpanier = $panier;
							break;
						}
					}
					if($lastpanier != null)
					{
						break;
					}
				}
				if($lastpanier == null or $lastpanier->getService() != null) //s'il n'a jamais été inscrit à cour ou bien il a été inscrit à une formation contenant ce cours et d'autres cours, il recrait la formation
				{
					$panier = new Panier();
					$panier->setUser($this->getUser());
					$em->persist($panier);
					$produitpanier = new Produitpanier();
					$produitpanier->setPanier($panier);
					$produitpanier->setProduit($produit);
					$produitpanier->setQuantite(1);
					$em->persist($produitpanier);
					$produit->setNbcertificat($produit->getNbcertificat() + 1);
					
					
					//envoie d'email
					$service = $this->container->get('general_service.servicetext');
					$siteweb = $this->container->getParameter('siteweb');
					$sitename = $this->container->getParameter('sitename');
					$emailadmin = $this->container->getParameter('emailadmin');
					if($service->email($emailadmin))
					{
						$mail = new Afmail();
						
						$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
						$mail->setSubject($this->getUser()->name(30).' vient de s\'inscrire au cours '.$produit->getTitre().' sur '.$sitename); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>'Team '.$sitename,'titre' => $this->getUser()->name(30).' vient de s\'inscrire au cours '.$produit->getTitre().' sur '.$sitename ,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/user/detail/user/commande/'.$panier->getId().'/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($emailadmin));
					}
					
					if($service->email($produit->getUser()->getUsername()))
					{
						$mail = new Afmail();
						
						$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
						$mail->setSubject($this->getUser()->name(30).' vient de s\'inscrire au cours '.$produit->getTitre().' sur '.$sitename); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$produit->getUser()->name(50),'titre' => $this->getUser()->name(30).' vient de s\'inscrire au cours '.$produit->getTitre().' sur '.$sitename ,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/user/detail/user/commande/'.$panier->getId().'/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($produit->getUser()->getUsername()));
					}
					
					if($service->email($this->getUser()->getUsername()))
					{
						$mail = new Afmail();
						
						$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
						$mail->setSubject('Votre inscription au cours '.$produit->getTitre().' a été effectuée avec succès sur '.$sitename.' !'); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$this->getUser()->name(50),'titre' => 'Votre inscription au cours '.$produit->getTitre().' a été effectuée avec succès sur '.$sitename.' !' ,'contenu'=> 'Accédez à votre bableau de bord pour suivre votre progression à ce cours .</br><a href="'.$siteweb.'/accueil/user/'.$this->getUser()->getId().'">Lien vers votre tableau de bord.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($this->getUser()->getUsername()));
					}
				}else{
					$lastpanier->setDate(new \Datetime());
					$lastpanier->setValide(true);
					
					//envoie d'email
					$service = $this->container->get('general_service.servicetext');
					$siteweb = $this->container->getParameter('siteweb');
					$sitename = $this->container->getParameter('sitename');
					$emailadmin = $this->container->getParameter('emailadmin');
					if($service->email($emailadmin))
					{
						$mail = new Afmail();
						
						$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
						$mail->setSubject($this->getUser()->name(30).' vient de Renouveler son inscription au cours '.$produit->getTitre().' sur '.$sitename); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>'Team '.$sitename,'titre' => $this->getUser()->name(30).' vient de Renouveler son inscription au cours '.$produit->getTitre().' sur '.$sitename ,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/user/detail/user/commande/'.$lastpanier->getId().'/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($emailadmin));
					}
					
					if($service->email($produit->getUser()->getUsername()))
					{
						$mail = new Afmail();
						
						$mail->setFrom($this->getUser()->name(30).' <'.$this->getUser()->getUsername().'>'); 
						$mail->setSubject($this->getUser()->name(30).' vient de Renouveler son inscription au cours '.$produit->getTitre().' sur '.$sitename); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$produit->getUser()->name(50),'titre' => $this->getUser()->name(30).' vient de Renouveler son inscription au cours '.$produit->getTitre().' sur '.$sitename ,'contenu'=> 'Suivez la progression de cette formation via le lien ci-dessus.</br><a href="'.$siteweb.'/user/detail/user/commande/'.$lastpanier->getId().'/'.$produit->getId().'">Suivez la formation de'.$this->getUser()->name(35).'.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($produit->getUser()->getUsername()));
					}
					
					if($service->email($this->getUser()->getUsername()))
					{
						$mail = new Afmail();
						
						$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
						$mail->setSubject('Votre inscription au cours '.$produit->getTitre().' a été renouvelé avec succès sur '.$sitename.' !'); 
						$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$this->getUser()->name(50),'titre' => 'Votre inscription au cours '.$produit->getTitre().' a été renouvelé avec succès sur '.$sitename.' !' ,'contenu'=> 'Accédez à votre bableau de bord pour suivre votre progression à ce cours .</br><a href="'.$siteweb.'/accueil/user/'.$this->getUser()->getId().'">Lien vers votre tableau de bord.</a>')));
						$mail->setTextCharset('utf-8');
						$mail->setHTMLCharset('utf-8');
						$result = $mail->send(array($this->getUser()->getUsername()));
					}
				}
				$this->get('session')->getFlashBag()->add('information','Inscription au cours effectuée avec succès !');
				$em->flush();
			}else{
				$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Vous êtes déjà inscrit à une formation contennant ce cours.');
			}
				 
		}else{
			$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Le mot de passe que vous avez entré est invalid. <a href="#!" class="souscription-cours-online">Reéssayez</a>');
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Vous n\'avez pas assez de fond pour souscrire à cette formation. <a href="'.$this->generateUrl("produit_service_yourcv_recrutement").'">Créditez votre compte !</a>');
	}
}else{
	$this->get('session')->getFlashBag()->add('information','Echec d\'enregistrement !! Toutes les données n\'ont pas été reçu.');
}

return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId())));
}

public function checkticketAction()
{
	if($this->getUser() !=  null)
	{
		$em = $this->getDoctrine()->getManager();
		$oldpanier = $em->getRepository('ProduitProduitBundle:Panier')
						 ->findOneBy(array('user'=>$this->getUser(),'payer'=>0));
		if($oldpanier != null)
		{
			foreach($oldpanier->getProduitpaniers() as $prodpan)
			{
				$em->remove($prodpan);
			}
			$em->flush();
		}else{
			$oldpanier = new Panier();
			$oldpanier->setUser($this->getUser());
			$em->persist($oldpanier);
			$em->flush();
		}			
		$session = $this->get('session');
		$produit_ticket = $session->get('produit_ticket');
		$tabprod = explode('-',$produit_ticket);
		if(count($tabprod) > 0)
		{
			for($i = 0; $i < count($tabprod); $i++)
			{
				$oldproduit = $em->getRepository('ProduitProduitBundle:Produit')
								->find($tabprod[$i]);
				if($oldproduit != null)
				{
					$produitpanier = new Produitpanier();
					$produitpanier->setPanier($oldpanier);
					$produitpanier->setProduit($oldproduit);
					$produitpanier->setQuantite($oldproduit->getPronostique());
					$em->persist($produitpanier);
					$em->flush();
				}
			}
		}
		if($oldpanier != null)
		{
			if(count($oldpanier->getProduitpaniers()) < 5)
			{
				$this->get('session')->getFlashBag()->add('nbmatchsuffisant','Vous devez avoir exactement 5rencontres sur votre ticket avant de valider.');
			}
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Vous devez vous connectez pour jouer !');
	}
	return $this->redirect($this->generateUrl('produit_produit_liste_produit_souscategorie'));
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

public function reglementcommandeAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	if($produit->getActive() == true)
	{
		$service = $this->container->get('general_service.servicetext');
		$oldcommande = $em->getRepository('ProduitProduitBundle:Produitpanier')
						 ->findBy(array('produit'=>$produit));
		$affiche = true;
		foreach($oldcommande as $com)
		{
			if($com->getPanier()->getLivrer() == true)
			{
				$affiche = false;
				break;
			}
		}		
		if($affiche == true)
		{
			$panier = null;
			foreach($oldcommande as $com)
			{
				if(isset($_POST['mailuser']) and isset($_POST['teluser']) and $com->getPanier()->getEmail() == $_POST['mailuser'] and $com->getPanier()->getTel() == $_POST['teluser'])
				{
					$panier = $com->getPanier();
					break;
				}
			}			 
			
			if($panier == null)
			{
				$panier = new Panier();
				if($this->getUser() != null)
				{
					$panier->setUser($this->getUser());
				}
				$em->persist($panier);
				
				$produitpanier = new Produitpanier();
				$produitpanier->setPanier($panier);
				$produitpanier->setProduit($produit);
				
				$em->persist($produitpanier);
				$em->flush();
			}
			$this->get('session')->getFlashBag()->add('information','Votre bon de commande a été généré avec succès !');

			if(isset($_POST['nomuser']) and isset($_POST['mailuser']) and isset($_POST['teluser']))
			{
				$panier->setNomuser(htmlspecialchars($_POST['nomuser']));
				$panier->setEmail(htmlspecialchars($_POST['mailuser']));
				$panier->setTel(htmlspecialchars($_POST['teluser']));
				$panier->setPayer(true);
				$em->flush();
			}

			//envoie d'email
			$siteweb = $this->container->getParameter('siteweb');
			$conditionuserlink = $this->container->getParameter('conditionuserlink');
			$sitename = $this->container->getParameter('sitename');
			$emailadmin = $this->container->getParameter('emailadmin');
			
			$orangemoney = $this->container->getParameter('orangemoney');
			$mtnmobile = $this->container->getParameter('mtnmobile');
				
			// Instanciation de la classe dérivée
			$pdf = new PDF('L','mm','A5');
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont('Times','',12);
			$pdf->setSiteweb($siteweb);
			$pdf->setEmail($emailadmin);
			$pdf->setClient($panier->getNomuser());
			$pdf->setLien($conditionuserlink);
				
				$pdf->description($produit->getSouscategorie()->getPrix(),$orangemoney,$mtnmobile,$panier->getTel(),$produit->name(30).' - '.$produit->getSouscategorie()->getNom(),$produit->getQuartiertext(),$panier->dateFacture());
				$pdf->completeBorder($panier->numFacture(),date('Y'));
				$pdf->SetAuthor('Noel Kenfack');
			
			if(!file_exists ($panier->getUploadRootDir()))
			{
				mkdir($panier->getUploadRootDir(),0777,true);
			}
			if(!file_exists ($panier->getUploadRootDir().'/'.$panier->numFacture().'.pdf'))
			{
			$pdf->Output('F',$panier->getWebPath());
			}
			
			//Email Administration
			if($service->email($emailadmin) and $panier->getMessadmin() == false)
			{
				$mail = new Afmail();
				
				//Email Administration
				$mail = new Afmail(); // Create the email object
				$mail->setFrom(''.$panier->getNomuser().' <'.$panier->getEmail().'>'); // Set the From: address
				$mail->setCc('Maisons Cameroun & Services <maisons_cameroun@yahoo.fr>'); // Set the Cc: address (es)
				$mail->setSubject('Une nouvelle Commande sur '.$sitename.', Contactez le client !');// Set the subject
				
				$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>'Hello Team '.$sitename,'titre' => ''.$panier->getNomuser().' vient de passer une commande via '.$sitename.' !','contenu'=> 'Contacter le client. Retrouvez ses contacts sur la fiche d\'ouverture de dossier via le document ci-joint.')));
				//$mail->addAttachment(new fileAttachment(''.$siteweb.'/Symfony/web/'.$panier->getWebPath()));// Add a file to the email
				$mail->setTextCharset('utf-8');
				$mail->setHTMLCharset('utf-8');
				$result = $mail->send(array($emailadmin));
			}
				
			//Email Administration
			if($service->email($panier->getEmail()))
			{
				$mail = new Afmail();
				
				//Email Administration
				$mail = new Afmail(); // Create the email object
				$mail->setFrom(''.$sitename.' <'.$emailadmin.'>'); // Set the From: address
				$mail->setSubject('Vous avez reservé un produit avec succès sur '.$sitename.' !');// Set the subject
				
				$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$panier->getNomuser(),'titre' => 'Vous avez reservé un produit avec succès sur '.$sitename.' !','contenu'=> 'Retrouvez ci-joint votre FICHE D\'OUVERTURE DE DOSSIER, Favorisez la prise en charge immédiate de votre dossier en payant à temps votre réservation.')));
				//$mail->addAttachment(new fileAttachment(''.$siteweb.'/Symfony/web/'.$panier->getWebPath()));// Add a file to the email
				$mail->setTextCharset('utf-8');
				$mail->setHTMLCharset('utf-8');
				$result = $mail->send(array($panier->getEmail()));
			}

			return $this->render('ProduitProduitBundle:Produit:reglementcommande.html.twig', array('panier'=>$panier,'produit'=>$produit));
		}else{
			$this->get('session')->getFlashBag()->add('information','Ce produit a déjà été réservé par un client de confiance !');
			return $this->redirect($this->generateUrl('produit_produit_detail_produit_market',array('id'=>$produit->getId())));
		}
	
	}else{
		$this->get('session')->getFlashBag()->add('information','Ce produit a déjà été réservé par un client de confiance !');
		return $this->redirect($this->generateUrl('produit_produit_detail_produit_market',array('id'=>$produit->getId())));
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
public function eleveproduitAction(Produitpanier $prodpan)
{
	$produit = $prodpan->getProduit();
	if($this->getUser() == $prodpan->getpanier()->getUser())
	{
		$em = $this->getDoctrine()->getManager();
		$em->remove($prodpan);
		$em->flush();
		$this->get('session')->getFlashBag()->add('matchenleve','La rencontre a été enlevée de votre ticket avec succès !');
		return $this->redirect($this->generateUrl('produit_produit_liste_produit_souscategorie',array('id'=>$produit->getSouscategorie()->getCategorie()->getId())));
	}
	return $this->redirect($this->generateUrl('login'));
}

public function supprimerproduitAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$prodpan = $em->getRepository('ProduitProduitBundle:Produitpanier')
	                 ->findBy(array('produit'=>$produit));
	$categorie = $produit->getSouscategorie();
	$user = $produit->getUser();
		$formsupp = $this->createFormBuilder()->getForm(); 
		$request = $this->get('request');
		if ($request->getMethod() == 'POST'){
		$formsupp->bind($request);
		if ($formsupp->isValid()){
			$service = $this->container->get('general_service.servicetext');
			$produit->setServicetext($service);
			if(($produit->getUser() != null and $produit->getUser() == $this->getUser()) or $this->get('security.context')->isGranted('ROLE_GESTION'))
			{
				if(count($prodpan) == 0){
					$partie_cours = $em->getRepository('ProduitProduitBundle:Partiecours')
	                                   ->findBy(array('produit'=>$produit));
					if(count($partie_cours) == 0)
					{
					$em->remove($produit);
					$em->flush();
					}else{
					$this->get('session')->getFlashBag()->add('information','Action réfusée ! Supprimer toutes les parties de ce cours d\'abord.');
					}
				}else{
				$this->get('session')->getFlashBag()->add('information','Action réfusée ! ce cours est déjà reservé par un utilisateur.');
				}
			}else{
				//envoie d'email
				$this->get('session')->getFlashBag()->add('information','Action réfusée ! vous n\'avez pas le droit de supprimer ce cours.');
			}
		}
		}else{
		$this->get('session')->getFlashBag()->add('supprime_prod',$produit->getId());
	    $this->get('session')->getFlashBag()->add('supprime_prod',$produit->getTitre());
		}
	return $this->redirect($this->generateUrl('users_adminuser_prod_invalide_courant_souscategorie',array('id'=>$produit->getSouscategorie()->getId())));
}

public function rechercheproduitAction()
{
	if(isset($_GET['donnee']))
	{
		$donnee = $_GET['donnee'];
	}else{
		$donnee = '';
	}
	$em = $this->getDoctrine()->getManager();
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
						->findProduit($donnee);
	return $this->render('ProduitProduitBundle:Produit:recherche.html.twig', array('liste_produit'=>$liste_produit, 'donnee'=>$donnee));
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
public function accueilboutiqueAction($page)
{
	$em = $this->getDoctrine()->getManager();
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                      ->findProduitValide($page,16);
	return $this->render('ProduitProduitBundle:Produit:accueilboutique.html.twig',
	array('liste_produit'=>$liste_produit,'page'=>$page,'nombrepage' =>ceil(count($liste_produit)/16)));
}

public function autorecherchecoursAction()
{
	$em = $this->getDoctrine()->getManager();
	$liste_poste = $em->getRepository('ProduitProduitBundle:Produit')
				     ->findBy(array('valide'=>1));
	$tab = array();
	foreach($liste_poste as $poste){
		$d = array();
		if($poste->getImgproduit() != null and $poste->getImgproduit()->getSrc() != 'source')
		{
			$d['drapeau'] = $poste->getImgproduit()->getWebPath();
		}else{
			$d['drapeau'] = 'template/images/valid.png';
		}
		$d['nom'] = $poste->getTitre();
		$d['id'] = $poste->getId();
		$tab[] = $d;
	}
	return new Response(json_encode($tab));
}

public function downloadvideocoursAction(Produit $produit)
{
	$em = $this->getDoctrine()->getManager();
	$produit->getVideoproduit()->setNbtele($produit->getVideoproduit()->getNbtele() + 1);
	$em->flush();
	$nameoffile = '/../../../'.$produit->getVideoproduit()->getWebPath();
	return $this->redirect($nameoffile);
}

public function guideformateurAction(Produit $produit)
{
	return $this->redirect($this->generateUrl('produit_produit_detail_produit_market', array('id'=>$produit->getId(),'codeadmin'=>10001)));
}
}