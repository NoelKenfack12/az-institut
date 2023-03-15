<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace App\Controller\Produit\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit\Service\Infoentreprise;
use App\Form\Produit\Service\InfoentrepriseType;
use App\Entity\Produit\Service\Detailinfoentreprise;
use App\Form\Produit\Service\DetailinfoentrepriseType;
use App\Service\Servicetext\GeneralServicetext;

class InfoentrepriseController extends AbstractController
{
public function infoentreprise(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$info = new Infoentreprise($service);
	$form = $this->createForm(InfoentrepriseType::class, $info);
	$formsupp = $this->createFormBuilder()->getForm();

	if($request->getMethod() == 'POST')
	{
		$form->handleRequest($request);
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
	$allinfo = $em->getRepository(Infoentreprise::class)
	                      ->FindAll();
    return $this->render('Theme/Users/Adminuser/Infoentreprise/infoentreprise.html.twig',
	array('form'=>$form->createView(),'allinfo'=>$allinfo,'formsupp'=>$formsupp->createView()));
}

public function supprimerinfoentreprise(Infoentreprise $info, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 

	if ($request->getMethod() == 'POST') {
		$formsupp->handleRequest($request);
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

public function modifierinfoentreprise(Infoentreprise $info, Request $request, GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	$form = $this->createForm(InfoentrepriseType::class, $info);
	$formsupp = $this->createFormBuilder()->getForm();

	if($request->getMethod() == 'POST')
	{
		$form->handleRequest($request);
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
	$formdetail = $this->createForm(DetailinfoentrepriseType::class, $detailinfo);
	$alldetailinfo = $em->getRepository(Detailinfoentreprise::class)
	                      ->findBy(array('infoentreprise'=>$info));
    return $this->render('Theme/Users/Adminuser/Infoentreprise/modifierinfoentreprise.html.twig',
	array('form'=>$form->createView(),'alldetailinfo'=>$alldetailinfo,'formsupp'=>$formsupp->createView(),'info'=>$info,
	'formdetail'=>$formdetail->createView()));
}

public function ajouterinfoentreprise(Infoentreprise $info, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$detailinfo = new Detailinfoentreprise();
	$formdetail = $this->createForm(DetailinfoentrepriseType::class, $detailinfo);

	if($request->getMethod() == 'POST')
	{
		$formdetail->handleRequest($request);
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

public function supprimerdetailinfoentreprise(Detailinfoentreprise $detailinfo, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 

	$info = $detailinfo->getInfoentreprise();
	if ($request->getMethod() == 'POST') {
    $formsupp->handleRequest($request);
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