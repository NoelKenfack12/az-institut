<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Avril 2016
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Entity\Quartier;

class QuartierController extends Controller
{
public function autorecherchequartierAction()
{
	$em = $this->getDoctrine()->getManager();
	$liste_localite = $em->getRepository('ProduitServiceBundle:Ville')
	                     ->findAll();
	$tab = array();
	foreach($liste_localite as $localite){
		$d = array();
		$d['drapeau'] = 'template/images/valid.png';
		$d['nom'] = $localite->getNom();
		$d['id'] = $localite->getId();
		$tab[] = $d;
	}
	return new Response(json_encode($tab));
}

public function recherchequartierAction()
{
	$em = $this->getDoctrine()->getManager();
	$liste_localite = $em->getRepository('ProduitServiceBundle:Quartier')
	                     ->findAll();
	$tab = array();
	foreach($liste_localite as $localite){
		$d = array();
		$d['drapeau'] = 'template/images/valid.png';
		if($localite->getVille() != null)
		{
			$d['nom'] = $localite->getNom();
		}else{
			$d['nom'] = $localite->getNom();
		}
		$d['id'] = $localite->getId();
		$tab[] = $d;
	}
	return new Response(json_encode($tab));
}
}
?>