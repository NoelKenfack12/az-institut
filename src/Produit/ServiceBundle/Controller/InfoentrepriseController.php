<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Entity\Infoentreprise;
use Produit\ServiceBundle\Form\InfoentrepriseType;
use Produit\ServiceBundle\Entity\Detailinfoentreprise;
use Produit\ServiceBundle\Form\DetailinfoentrepriseType;

class InfoentrepriseController extends Controller
{
public function infoentrepriseAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$info = new Infoentreprise($service);
	$form = $this->createForm(new InfoentrepriseType, $info);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$info->setUser($this->getUser());
		if($info->getImginfoentreprise() !== null)
		{
		$info->getImginfoentreprise()->setServicetext($service);
		}
		$aucuneinfo = false;
		if($info->getTitre() == null and $info->getDescription() == null)
		{
			$aucuneinfo = true;
		}
		if($form->isValid() and $aucuneinfo == false){
			$em->persist($info);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Publication enregistrée avec succès.');
		}else{
			if($aucuneinfo == true)
			{
				$this->get('session')->getFlashBag()->add('information','Vous ne pouvez laissez le titre et le contenu vide.');
			}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée.');
			}
		}
	}
	$allinfo = $em->getRepository('ProduitServiceBundle:Infoentreprise')
	                      ->FindBy(array('valeur'=>0));
    return $this->render('UsersAdminuserBundle:Infoentreprise:infoentreprise.html.twig',
	array('form'=>$form->createView(),'allinfo'=>$allinfo,'formsupp'=>$formsupp->createView()));
}

public function supprimerinfoentrepriseAction(Infoentreprise $info)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
    $request = $this->get('request');
	if ($request->getMethod() == 'POST') {
    $formsupp->bind($request);
    if ($formsupp->isValid()){
	$details = $info->getDetailinfoentreprises();
	foreach($details as $detail)
	{
		$em->remove($detail);
	}
	$em->remove($info);
    $em->flush();
	$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	return $this->redirect($this->generateUrl('users_adminuser_gestion_info_entreprise'));
	}
	}
    $this->get('session')->getFlashBag()->add('supprime_apropos',$info->getId());
	$this->get('session')->getFlashBag()->add('supprime_apropos',$info->getTitre());
	return $this->redirect($this->generateUrl('users_adminuser_gestion_info_entreprise'));
}
public function modifierinfoentrepriseAction(Infoentreprise $info)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$form = $this->createForm(new InfoentrepriseType, $info);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$info->setUser($this->getUser());
		if($info->getImginfoentreprise() !== null)
		{
		$info->getImginfoentreprise()->setServicetext($service);
		}
		$aucuneinfo = false;
		if($info->getTitre() == null and $info->getDescription() == null)
		{
			$aucuneinfo = true;
		}
		if($form->isValid() and $aucuneinfo == false){
			$em->persist($info);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Modification effectuée succès.');
			return $this->redirect($this->generateUrl('users_adminuser_gestion_info_entreprise'));
		}else{
			if($aucuneinfo == true)
			{
				$this->get('session')->getFlashBag()->add('information','Vous ne pouvez laissez le titre et le contenu vide.');
			}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée.');
			}
		}
	}
	$detailinfo = new Detailinfoentreprise();
	$formdetail = $this->createForm(new DetailinfoentrepriseType, $detailinfo);
	$allinfo = $em->getRepository('ProduitServiceBundle:Infoentreprise')
	              ->FindBy(array('valeur'=>0));
    return $this->render('UsersAdminuserBundle:Infoentreprise:modifierinfoentreprise.html.twig',
	array('form'=>$form->createView(),'allinfo'=>$allinfo,'formsupp'=>$formsupp->createView(),'info'=>$info,'formdetail'=>$formdetail->createView()));
}
public function ajouterinfoentrepriseAction(Infoentreprise $info)
{
	$em = $this->getDoctrine()->getManager();
	$detailinfo = new Detailinfoentreprise();
	$formdetail = $this->createForm(new DetailinfoentrepriseType, $detailinfo);
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$formdetail->bind($request);
		$detailinfo->setUser($this->getUser());
		$detailinfo->setInfoentreprise($info);
		$aucuneinfo = false;
		if($detailinfo->getTitre() == null and $detailinfo->getDescription() == null)
		{
			$aucuneinfo = true;
		}
		if($formdetail->isValid() and $aucuneinfo == false){
			$em->persist($detailinfo);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Publication enregistrée avec succès.');
		}else{
			if($aucuneinfo == true)
			{
				$this->get('session')->getFlashBag()->add('information','Vous ne pouvez laissez le titre et le contenu vide.');
			}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée.');
			}
		}
	}
	return $this->redirect($this->generateUrl('users_adminuser_modification_information_entreprise_courant',array('id'=>$info->getId())));
}
public function supprimerdetailinfoentrepriseAction(Detailinfoentreprise $detailinfo)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
    $request = $this->get('request');
	$info = $detailinfo->getInfoentreprise();
	if ($request->getMethod() == 'POST') {
    $formsupp->bind($request);
    if ($formsupp->isValid()){
	$em->remove($detailinfo);
    $em->flush();
	$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	return $this->redirect($this->generateUrl('users_adminuser_modification_information_entreprise_courant',array('id'=>$info->getId())));
	}
	}
    $this->get('session')->getFlashBag()->add('supprime_apropos',$detailinfo->getId());
	$this->get('session')->getFlashBag()->add('supprime_apropos',$detailinfo->getTitre());
	return $this->redirect($this->generateUrl('users_adminuser_modification_information_entreprise_courant',array('id'=>$info->getId())));
}
}