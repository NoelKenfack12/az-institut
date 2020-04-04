<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Entity\Recrutement;
use Produit\ServiceBundle\Form\RecrutementType;
use Users\UserBundle\Entity\Newsletter;
use Users\UserBundle\Entity\Notification;

use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;
use General\ServiceBundle\AfPdf\PDF;

class RecrutementController extends Controller
{
public function votredossierAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$recrutement = new Recrutement($service);
	$form = $this->createForm(new RecrutementType, $recrutement);
	$request = $this->getRequest();
	
	if($request->getMethod() == 'POST' and $this->getUser() != null and isset($_POST['moyentransfert']) and isset($_POST['montantransfert']) and isset($_POST['pays']))
	{
		$form->bind($request);
		$liste_banque = $this->getArrayBanque();
		$banquecheck = null;
		foreach($liste_banque as $banque)
		{
			if($banque[0] == $_POST['moyentransfert'])
			{
				$banquecheck = $banque;
				break;
			}
		}
			
		if($form->isValid()  and $_POST['moyentransfert'] != '' and $_POST['montantransfert'] != ''  and $_POST['pays'] != '' and $banquecheck != null and count($banquecheck) > 2){
			$recrutement->setUser($this->getUser());

			$recrutement->setMoyentransfert($banquecheck[1]);
			$recrutement->setMontantransfert($_POST['montantransfert']);
			$recrutement->setPays($_POST['pays']);
			
			$em->persist($recrutement);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','FICHE DE DEMANDE D\'AJOUT DES FONDS A ETE CREEE AVEC SUCCES.');
			
			$oldemail = $em->getRepository('UsersUserBundle:Newsletter')
                    ->findBy(array('email'=>$recrutement->getMail()));
			if($oldemail == null and $recrutement->getMail() != null)
			{
				$newsletter = new Newsletter();
				$newsletter->SetNom($recrutement->getUsername());
				$newsletter->SetEmail($recrutement->getMail());
				$em->persist($newsletter);
				$em->flush();
			}
			
			//envoie d'email
			$siteweb = $this->container->getParameter('siteweb');
			$conditionuserlink = $this->container->getParameter('conditionuserlink');
			$sitename = $this->container->getParameter('sitename');
			$emailadmin = $this->container->getParameter('emailadmin');
			
			$tel = $this->container->getParameter('tel');
			$bp = $this->container->getParameter('bp');
				
			// Instanciation de la classe dérivée
			$pdf = new PDF('L','mm','A5');
			$pdf->setDate($recrutement->dateFacture());
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont('Times','',12);

			$pdf->contactstruct($bp,$tel);
			$pdf->contenutransfert($recrutement->numFacture(),$recrutement->getUsername(),$recrutement->getTel().' / '.$recrutement->getMail(),' - ',$banquecheck[1],$banquecheck[2],$banquecheck[3],$_POST['montantransfert'].'FCFA');
			$pdf->completeBorder('Az Corp',$recrutement->getUsername());
			$pdf->SetAuthor('Noel Kenfack');
			
			if(!file_exists ($recrutement->getUploadDossierRootDir()))
			{
				mkdir($recrutement->getUploadDossierRootDir(),0777,true);
			}
			if(!file_exists ($recrutement->getUploadDossierRootDir().'/'.$recrutement->numFacture().'.pdf'))
			{
			$pdf->Output('F',$recrutement->getDossierWebPath());
			}
			
			//Email Administration
			if($service->email($emailadmin))
			{
				$mail = new Afmail();
				
				//Email Administration
				$mail = new Afmail(); // Create the email object
				$mail->setFrom(''.$recrutement->getUsername().' <'.$recrutement->getMail().'>'); // Set the From: address
				$mail->setCc('Az E-learning <gaielbleriot@gmail.com>'); // Set the Cc: address (es)
				$mail->setSubject('UNE FICHE DE DEMANDE D\'AJOUT DES FONDS A ETE GENERE SUR '.$sitename.', Contactez le client !');// Set the subject
				
				$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>''.$sitename,'titre' => ''.$recrutement->getUsername().' vient de générer une fiche de demande d\'ajout des fonts via '.$sitename.' !','contenu'=> 'Contacter le client. Retrouvez ses contacts sur la fiche d\'ajout des fonts ci-joins.')));
				//$mail->addAttachment(new fileAttachment(''.$siteweb.'/Symfony/web/'.$recrutement->getDossierWebPath()));// Add a file to the email
				$mail->setTextCharset('utf-8');
				$mail->setHTMLCharset('utf-8');
				$result = $mail->send(array($emailadmin));
			}
				
			//Email Administration
			if($service->email($recrutement->getMail()))
			{
				$mail = new Afmail();
				
				//Email Administration
				$mail = new Afmail(); // Create the email object
				$mail->setFrom(''.$sitename.' <'.$emailadmin.'>'); // Set the From: address
				$mail->setSubject('Vous avez généré avec succès une fiche de demande d\'ajout de vos fonds sur '.$sitename.' !');// Set the subject
				
				$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$recrutement->getUsername(),'titre' => 'Vous avez généré avec succès une fiche de demande d\'ajout de vos fonds sur '.$sitename.' !','contenu'=> 'Retrouvez ci-joint votre FICHE DE DEMANDE D\'AJOUT DES FONDS, Favorisez la prise en charge immédiate de votre demande en transférant à temps les frais mentionnés sur votre fiche.')));
				//$mail->addAttachment(new fileAttachment(''.$siteweb.'/Symfony/web/'.$panier->getWebPath()));// Add a file to the email
				$mail->setTextCharset('utf-8');
				$mail->setHTMLCharset('utf-8');
				$result = $mail->send(array($recrutement->getMail()));
			}

			return $this->redirect($this->generateUrl('produit_service_dossier_derecrutement_user', array('id'=>$recrutement->getId())));
		}else{
			if($_POST['moyentransfert'] == '' or $_POST['montantransfert'] == '')
			{
				$this->get('session')->getFlashBag()->add('information','Le moyen de tranfert d\'argent ou le montant à transféré n\'a pas été indiqué !');
			}else if($_POST['pays'] == '')
			{
				$this->get('session')->getFlashBag()->add('information','Aucun Pays n\'a été choisi !');
			}else{
				$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée, Vérifiez vos coordonnées en retransmettez le formulaire.');
			}
		}
	}

	$liste_categorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                    ->findAll();
	$liste_banque = $this->getArrayBanque();
    return $this->render('ProduitServiceBundle:Recrutement:votredossier.html.twig',array('form'=>$form->createView(),'liste_banque'=>$liste_banque,'liste_categorie'=>$liste_categorie));
}

public function getArrayBanque()
{
	$orangemoney = $this->container->getParameter('orangemoney');
	$mtnmobile = $this->container->getParameter('mtnmobile');
	return array(array('1','Orange Money','Az Corp',$orangemoney),array('2','MTN Mobile','Az Corp',$mtnmobile));
}

public function affichedossieruserAction(Recrutement $dossier)
{
	$em = $this->getDoctrine()->getManager();
	$liste_categorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                    ->findAll();
	return $this->render('ProduitServiceBundle:Recrutement:affichedossieruser.html.twig',
	array('dossier'=>$dossier,'liste_categorie'=>$liste_categorie));
}

public function ajoutdossieruserAction()
{
	$service = $this->container->get('general_service.servicetext');
	$em = $this->getDoctrine()->getManager();
	$recrutement = new Recrutement($service);
	$form = $this->createForm(new RecrutementType, $recrutement);
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
		$form->bind($request);
		$recrutement->getYourcv()->setServicetext($service);
		if($form->isValid() and $this->getUser() != null){
			$recrutement->setUser($this->getUser());
			$em->persist($recrutement);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Votre dossier a été soumis avec succès.');
		}else{
			$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée, Vérifiez la taille de votre message et de vos fichiers et retransmettez le formulaire.');
		}
	}
	return $this->redirect($this->generateUrl('produit_service_yourcv_recrutement'));
}
public function listedossierAction()
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
	$liste_dossier = $em->getRepository('ProduitServiceBundle:Recrutement')
	                          ->myfindAll();
	return $this->render('UsersAdminuserBundle:Recrutement:listedossier.html.twig',
	array('liste_dossier'=>$liste_dossier,'formsupp'=>$formsupp->createView()));
}
public function supprimerdossierAction(Recrutement $recrut)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm(); 
    $request = $this->get('request');
	if ($request->getMethod() == 'POST') {
    $formsupp->bind($request);
    if ($formsupp->isValid()){
		if(file_exists ($recrut->getUploadDossierRootDir().'/'.$recrut->numFacture().'.pdf'))
		{
		unlink($recrut->getUploadDossierRootDir().'/'.$recrut->numFacture().'.pdf');
		}
		$em->remove($recrut);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
		return $this->redirect($this->generateUrl('users_adminuser_liste_dossier_recrutement'));
	}
	}
    $this->get('session')->getFlashBag()->add('supprime_dossier',$recrut->getId());
	$this->get('session')->getFlashBag()->add('supprime_dossier',$recrut->getUser()->name(20));
	return $this->redirect($this->generateUrl('users_adminuser_liste_dossier_recrutement'));
}
public function validerdossierAction(Recrutement $recrut)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$formsupp = $this->createFormBuilder()->getForm(); 
    $request = $this->get('request');
	if ($request->getMethod() == 'POST'){
    $formsupp->bind($request);
    if ($formsupp->isValid() and $recrut->setValide(false)){
		$recrut->setValide(true);
		$recrut->getUser()->setSoldeprincipal($recrut->getUser()->getSoldeprincipal() + $recrut->getMontantransfert());
		
		//envoie d'email
		$siteweb = $this->container->getParameter('siteweb');
		$sitename = $this->container->getParameter('sitename');
		$emailadmin = $this->container->getParameter('emailadmin');
		
		$notif = new Notification();
		$notif->setTitre('Votre compte a été crédité avec succès.');
		$notif->setContenu('Un montant de '.$recrut->getMontantransfert().'FCFA a été déposé sur votre compte via '.$recrut->getMoyentransfert().' pour vos futur commandes sur '.$sitename);
		$notif->setUser($recrut->getUser());
		$em->persist($notif);
		$em->flush();

		if($service->email($recrut->getUser()->getUsername()))
		{
			$mail = new Afmail();
			
			$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
			$mail->setSubject('Votre compte a été crédité avec succès.'); 
			$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$recrut->getUser()->name(40),'titre' => 'Votre compte a été crédité avec succès.','contenu'=> 'Un montant de '.$recrut->getMontantransfert().'FCFA a été déposé sur votre compte via '.$recrut->getMoyentransfert().' pour vos futur commande sur '.$sitename)));
			$mail->setTextCharset('utf-8');
			$mail->setHTMLCharset('utf-8');
			$result = $mail->send(array($recrut->getUser()->getUsername()));
		}
			
		$this->get('session')->getFlashBag()->add('information','Solde mis à jour avec succès');
		return $this->redirect($this->generateUrl('users_adminuser_liste_dossier_recrutement'));
	}
	}
    $this->get('session')->getFlashBag()->add('valider_dossier',$recrut->getId());
	$this->get('session')->getFlashBag()->add('valider_dossier',$recrut->getUser()->name(20));
	return $this->redirect($this->generateUrl('users_adminuser_liste_dossier_recrutement'));
}

public function telechargercvAction(Recrutement $recrut)
{
	$namefile = '/../../../Symfony/web/'.$recrut->getYourcv()->getWebPath();
	return $this->redirect($namefile);
}

public function telechargerlettreAction(Recrutement $recrut)
{
	$namefile = '/../../../Symfony/web/'.$recrut->getDossierWebPath();
	return $this->redirect($namefile);
}
}