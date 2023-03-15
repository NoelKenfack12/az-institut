<?php
/*
	(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace App\Controller\Produit\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit\Produit\Categorie;
use App\Form\Produit\Produit\CategorieType;
use App\Entity\Produit\Produit\Souscategorie;
use App\Form\Produit\Produit\SouscategorieType;
use App\Form\Produit\Produit\SouscategorieeditType;
use App\Entity\Produit\Produit\Produit;
use App\Entity\Produit\Produit\Caracteristique;
use App\Form\Produit\Produit\ProduitType;
use App\Form\Produit\Produit\CaracteristiqueType;
use App\Service\Servicetext\GeneralServicetext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Service\Email\Singleemail;

class CategorieController extends AbstractController
{
private $params;
private $_servicemail;

public function __construct(ParameterBagInterface $params, Singleemail $servicemail)
{
	$this->params = $params;
	$this->_servicemail = $servicemail;
}

public function savecategorie(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$categorie = new Categorie($service);
	$form = $this->createForm(CategorieType::class, $categorie);
	if($request->getMethod() == 'POST')
	{
		$form->handleRequest($request);
		$categorie->setUser($this->getUser());
		$categorie->setServicetext($service);
		$nbcategorie = $em->getRepository(Categorie::class)
	                      ->FindAll();
		$nbcategoriemax = $this->params->get('nbcategorie');
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

public function ajoutersouscategorie(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$souscategorie = new Souscategorie($service);
	$form = $this->createForm(SousCategorieType::class, $souscategorie);
	if($request->getMethod() == 'POST')
	{
		$form->handleRequest($request);
		$souscategorie->setUser($this->getUser());
		$souscategorie->setServicetext($service);
		$liste_souscategorie = $em->getRepository(Souscategorie::class)
	                              ->FindBy(array('categorie'=>$souscategorie->getCategorie()));
		$nbcategoriemax = $this->params->get('nbsouscategorie');
		if($form->isValid() and count($liste_souscategorie) <= $nbcategoriemax){
			$em->persist($souscategorie);
			$em->flush();
		}else{
			if( count($liste_souscategorie) > $nbcategoriemax)
			{
			  $this->get('session')->getFlashBag()->add('images','Trop de sous-catégorie.');
			}else{
			  $this->get('session')->getFlashBag()->add('images','Données invalides.');
			}
		}
	}
	return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
}

public function listeproduitadmin(Souscategorie $souscategorie, GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$produit = new Produit($service);
	$formpro = $this->createForm(ProduitType::class, $produit, array('cat'=>$souscategorie->getCategorie()));
	
	if($request->getMethod() == 'POST')
	{
		$formpro->handleRequest($request);
		$produit->setUser($this->getUser());
		$imgpro = $produit->getImgproduit();
		if($imgpro != null)
		{
			$imgpro->setServicetext($service);
		}
		$liste_produit = $em->getRepository(Produit::class)
	                    ->myFindBy($souscategorie->getId());
		$nbprodsouscat = $this->params->get('nbproduitsouscat');
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
	$formcarac = $this->createForm(CaracteristiqueType::class, $caracteristique, array('cat'=>$souscategorie->getCategorie()));
	
	$liste_scat = $em->getRepository(Souscategorie::class)
	                 ->findBy(array('categorie'=>$souscategorie->getCategorie()));
	$liste_caract = $em->getRepository(Caracteristique::class)
	                   ->findBy(array('souscategorie'=>$souscategorie), array('date'=>'desc'));
	$liste_produit = $em->getRepository(Produit::class)
	                    ->myFindBy($souscategorie->getId());
						
	$formsupp = $this->createFormBuilder()->getForm();
	return $this->render('Theme/Users/Adminuser/Categorie/listeproduitadmin.html.twig', 
	array('souscategorie'=>$souscategorie,'liste_scat'=>$liste_scat,'formpro'=>$formpro->createView(),
	'formsupp'=>$formsupp->createView(),'formcarac'=>$formcarac->createView(),'liste_caract'=>$liste_caract));
}

public function modificationcategorie(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$categorie = $em->getRepository(Categorie::class)
					->find($id);
	if($categorie != null)
	{
    $formcat = $this->createForm(new CategorieType, $categorie);
	if ($request->getMethod() == 'POST'){
		$formcat->handleRequest($request);
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
	return $this->render('Theme/Users/Adminuser/Categorie/modificationcategorie.html.twig',
	array('form'=>$formcat->createView(),'cat'=>$categorie));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function altersouscategorie(GeneralServicetext $service, Request $request, $id)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}else{
		$id = $id;
	}
	$souscategorie = $em->getRepository(Souscategorie::class)
					->find($id);
	if($souscategorie != null)
	{
		$formsouscat = $this->createForm(SouscategorieeditType::class, $souscategorie);
		if ($request->getMethod() == 'POST'){
			$formsouscat->handleRequest($request);
			$souscategorie->setServicetext($service);
			if ($formsouscat->isValid()){
				$em->flush();
				$this->get('session')->getFlashBag()->add('information','Modification effectuée avec succès');
			}else{
			$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée!');
			}
			return $this->redirect($this->generateUrl('users_adminuser_accueil_administration'));
		}
		return $this->render('Theme/Users/Adminuser/Categorie/modificationsouscategorie.html.twig',
		array('formcat'=>$formsouscat->createView(),'scat'=>$souscategorie));
	}else{
		echo 'Echec ! Une erreur a été rencontrée.';
		exit;
	}
}

public function supprimercategorie(Categorie $categorie)
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

public function catalogue()
{
	$em = $this->getDoctrine()->getManager();
	$liste_cat = $em->getRepository(Categorie::class)
	                ->myFindAll();
	$repositorie = $em->getRepository(Produit::class);
	$plus_vendu = $repositorie->topProduit(5);
	$plus_like = $repositorie->topLike(5);
	return $this->render('Theme/Produit/Produit/Categorie/catalogue.html.twig',
	array('liste_cat'=>$liste_cat,'plus_vendu'=>$plus_vendu,'plus_like'=>$plus_like));
}

public function supprimersouscategorie(Souscategorie $scategorie)
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

public function addnewcaracteristique(Souscategorie $souscategorie, GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$caracteristique = new Caracteristique();
	$formcarac = $this->createForm(CaracteristiqueType::class, $caracteristique, array('cat'=>$souscategorie->getCategorie()));

	if($request->getMethod() == 'POST')
	{
		$formcarac->handleRequest($request);
		$caracteristique->setUser($this->getUser());

		$liste_caracteristique = $em->getRepository(Caracteristique::class)
	                    ->findBy(array('souscategorie'=>$souscategorie));
		$nbprodsouscat = $this->params->get('nbproduitsouscat');
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