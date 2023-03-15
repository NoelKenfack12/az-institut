<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Avril 2016
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Form\VilleType;
use Produit\ServiceBundle\Entity\Ville;

class VilleController extends Controller
{
public function ajoutvilleAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$ville = new Ville($service);
    $form = $this->createForm(new VilleType, $ville);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST' and isset($_POST['pays'])){
	$form->bind($request);
	$ville->setUser($this->getUser());
    if ($form->isValid() and $_POST['pays'] != ''){
		$ville->setPays($_POST['pays']);
		$em->persist($ville);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée, Choisissez une ville et retransmettez le formulaire!');
	}
	}
	$liste_ville = $em->getRepository('ProduitServiceBundle:Ville')
	                    ->findAll();
	return $this->render('UsersAdminuserBundle:Service:ville.html.twig',
	array('form'=>$form->createView(),'liste_ville'=>$liste_ville,'formsupp'=>$formsupp->createView()));
}
public function supprimervilleAction(Ville $ville)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST') {
	$formsupp->bind($request);
	$liste_panier = $em->getRepository('ProduitProduitBundle:Panier')
	                    ->findBy(array('ville'=>$ville));
	if ($formsupp->isValid() and count($ville->getCoutlivraisons()) == 0 and count($liste_panier) == 0){
	$em->remove($ville);
	$em->flush();
	$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	}else{
	$this->get('session')->getFlashBag()->add('information','Action réfusée! Il ya les produits dont la livraison est liée à cette ville');
	}
	}else{
	$this->get('session')->getFlashBag()->add('supprime_ville',$ville->getId());
	$this->get('session')->getFlashBag()->add('supprime_ville',$ville->getNom());
	}
	return $this->redirect($this->generateUrl('produit_service_ajouter_ville'));
}
}
?>