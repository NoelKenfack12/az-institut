<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace Produit\ProduitBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ProduitBundle\Entity\Categorie;
use Produit\ProduitBundle\Form\CategorieType;
use Produit\ProduitBundle\Entity\Souscategorie;
use Produit\ProduitBundle\Form\SouscategorieType;
use Produit\ProduitBundle\Form\SouscategorieeditType;
use Produit\ProduitBundle\Entity\Produit;
use Produit\ProduitBundle\Entity\Caracteristique;
use Produit\ProduitBundle\Form\ProduitType;
use Produit\ProduitBundle\Form\CaracteristiqueType;

class CategorieController extends Controller
{
public function savecategorieAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$categorie = new Categorie($service);
	$request = $this->getRequest();
	$form = $this->createForm(new CategorieType, $categorie);
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$categorie->setUser($this->getUser());
		$categorie->setServicetext($service);
		$nbcategorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                      ->FindAll();
		$nbcategoriemax = $this->container->getParameter('nbcategorie');
		if ($form->isValid() and count($nbcategorie) <= $nbcategoriemax){
			
			if(isset($_POST['typeservice']))
			{
				$categorie->setTypeservice($_POST['typeservice']);
			}
			$em->persist($categorie);
			$em->flush();
		}else{
			if(count($nbcategorie) > $nbcategoriemax)
			{
				$this->get('session')->getFlashBag()->add('image','Trop de catégorie.');
			}else{
				$this->get('session')->getFlashBag()->add('image','Données invalides.');
			}
		}
	}else{
	$this->get('session')->getFlashBag()->add('image','Données en mode get.');
	}
	return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
}

public function ajoutersouscategorieAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$souscategorie = new Souscategorie($service);
	$request = $this->getRequest();
	$form = $this->createForm(new SousCategorieType, $souscategorie);
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$souscategorie->setUser($this->getUser());
		$souscategorie->setServicetext($service);
		$liste_souscategorie = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                              ->FindBy(array('categorie'=>$souscategorie->getCategorie()));
		$nbcategoriemax = $this->container->getParameter('nbsouscategorie');
		if($form->isValid() and count($liste_souscategorie) <= $nbcategoriemax){
			$em->persist($souscategorie);
			$em->flush();
		}else{
			if( count($liste_souscategorie) > $nbcategoriemax )
			{
			  $this->get('session')->getFlashBag()->add('images','Trop de sous-catégorie.');
			}else{
			  $this->get('session')->getFlashBag()->add('images','Données invalides.');
			}
		}
	}
	return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
}

public function listeproduitadminAction(Souscategorie $souscategorie)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$produit = new Produit($service);
	$request = $this->getRequest();
	$formpro = $this->createForm(new ProduitType($souscategorie->getCategorie()), $produit);
	
	if($request->getMethod() == 'POST')
	{
		$formpro->bind($request);
		$produit->setUser($this->getUser());
		$imgpro = $produit->getImgproduit();
		if($imgpro != null)
		{
			$imgpro->setServicetext($service);
		}
		$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                    ->myFindBy($souscategorie->getId());
		$nbprodsouscat = $this->container->getParameter('nbproduitsouscat');
		if($formpro->isValid()){
	   
			$em->persist($produit);
			$em->flush();
		}else{
			if( count($liste_produit) > $nbprodsouscat )
			{
			  $this->get('session')->getFlashBag()->add('information','Trop de produit pour cette sous-catégorie.');
			}else{
			  $this->get('session')->getFlashBag()->add('information','Données invalides.');
			}
		}
	}

	$caracteristique = new Caracteristique();
	$formcarac = $this->createForm(new CaracteristiqueType($souscategorie->getCategorie()), $caracteristique);
	
	$liste_scat = $em->getRepository('ProduitProduitBundle:Souscategorie')
	                 ->findBy(array('categorie'=>$souscategorie->getCategorie()));
	$liste_caract = $em->getRepository('ProduitProduitBundle:Caracteristique')
	                   ->findBy(array('souscategorie'=>$souscategorie), array('date'=>'desc'));
	$liste_produit = $em->getRepository('ProduitProduitBundle:Produit')
	                    ->myFindBy($souscategorie->getId());
						
	$formsupp = $this->createFormBuilder()->getForm();
	return $this->render('UsersAdminuserBundle:Categorie:listeproduitadmin.html.twig', 
	array('souscategorie'=>$souscategorie,'liste_scat'=>$liste_scat,'formpro'=>$formpro->createView(),
	'formsupp'=>$formsupp->createView(),'formcarac'=>$formcarac->createView(),'liste_caract'=>$liste_caract));
}

public function modificationcategorieAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$categorie = $em->getRepository('ProduitProduitBundle:Categorie')
					->find($id);
	if($categorie != null)
	{
    $formcat = $this->createForm(new CategorieType, $categorie);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
		$formcat->bind($request);
		$categorie->setServicetext($service);
		if ($formcat->isValid()){
			if(isset($_POST['typeservice']))
			{
				$categorie->setTypeservice($_POST['typeservice']);
			}
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
		}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
		}
		return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
	}
	return $this->render('UsersAdminuserBundle:Categorie:modificationcategorie.html.twig',
	array('form'=>$formcat->createView(),'cat'=>$categorie));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function altersouscategorieAction($id)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$souscategorie = $em->getRepository('ProduitProduitBundle:Souscategorie')
					->find($id);
	if($souscategorie != null)
	{
		$formsouscat = $this->createForm(new SouscategorieeditType, $souscategorie);
		$request = $this->get('request');
		if ($request->getMethod() == 'POST'){
			$formsouscat->bind($request);
			$souscategorie->setServicetext($service);
			if ($formsouscat->isValid()){
				$em->flush();
				$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
			}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
			}
			return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
		}
		return $this->render('UsersAdminuserBundle:Categorie:modificationsouscategorie.html.twig',
		array('formcat'=>$formsouscat->createView(),'scat'=>$souscategorie));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function supprimercategorieAction(Categorie $categorie)
{
	$em = $this->getDoctrine()->getManager();
	if(count($categorie->getSouscategories()) == 0)
	{
		$em->remove($categorie);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec ! Cette catégorie contient les sous-catégories, Supprimez lès en premier.');
	}
	return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
}

public function catalogueAction()
{
	$em = $this->getDoctrine()->getManager();
	$liste_cat = $em->getRepository('ProduitProduitBundle:Categorie')
	                ->myFindAll();
	$repositorie = $em->getRepository('ProduitProduitBundle:Produit');
	$plus_vendu = $repositorie->topProduit(5);
	$plus_like = $repositorie->topLike(5);
	return $this->render('ProduitProduitBundle:Categorie:catalogue.html.twig',
	array('liste_cat'=>$liste_cat,'plus_vendu'=>$plus_vendu,'plus_like'=>$plus_like));
}

public function supprimersouscategorieAction(Souscategorie $scategorie)
{
	$em = $this->getDoctrine()->getManager();
	if(count($scategorie->getProduits()) == 0)
	{
		$em->remove($scategorie);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec ! Cette sous-catégorie contient les produits, Supprimez lès en premier.');
	}
	return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
}

public function addnewcaracteristiqueAction(Souscategorie $souscategorie)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$caracteristique = new Caracteristique();
	$formcarac = $this->createForm(new CaracteristiqueType($souscategorie->getCategorie()), $caracteristique);
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$formcarac->bind($request);
		$caracteristique->setUser($this->getUser());

		$liste_caracteristique = $em->getRepository('ProduitProduitBundle:Caracteristique')
	                    ->findBy(array('souscategorie'=>$souscategorie));
		$nbprodsouscat = $this->container->getParameter('nbproduitsouscat');
		if($formcarac->isValid() and count($liste_caracteristique) <= $nbprodsouscat){
			$em->persist($caracteristique);
			$em->flush();
		}else{
			if( count($liste_caracteristique) > $nbprodsouscat )
			{
			  $this->get('session')->getFlashBag()->add('information','Trop de caractéristique pour cette sous-catégorie.');
			}else{
			  $this->get('session')->getFlashBag()->add('information','Données invalides.');
			}
		}
	}
	return $this->redirect($this->generateUrl('users_adminuser_liste_produit_souscategorie', array('id'=>$souscategorie->getId())));
}
}