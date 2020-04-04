<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Form\MessemailType;
use Produit\ServiceBundle\Entity\Messemail;

use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;

class MessemailController extends Controller
{
public function messageemailAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$messemail = new Messemail();
    $form = $this->createForm(new MessemailType, $messemail);
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$form->bind($request);
	$messemail->setUser($this->getUser());
    if ($form->isValid()){

		//envoie d'email
		$siteweb = $this->container->getParameter('siteweb');
		$sitename = $this->container->getParameter('sitename');
		$emailadmin = $this->container->getParameter('emailadmin');
		
		$liste_newsletter = $em->getRepository('UsersUserBundle:Newsletter')
		                 ->findAll();
		foreach($liste_newsletter as $news)
		{
			list($compte,$domaine)=split("@",$news->getEmail(),2);
		    if (checkdnsrr($domaine,"MX") or checkdnsrr($domaine,"A")){
			$mail = new Afmail();
			
			$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
			$mail->setSubject($messemail->getTitre()); 
			$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$news->getNom(),'titre' =>$messemail->getTitre(),'contenu'=> $messemail->getContenu())));
			$mail->setTextCharset('utf-8');
			$mail->setHTMLCharset('utf-8');
			$result = $mail->send(array($news->getEmail()));
		    
		    $courantemail = $em->getRepository('UsersUserBundle:Newsletter')
		                 ->findOneBy(array('email'=>$news->getEmail()));
		    if($courantemail != null)
		    {
		    	$courantemail->setLastemail(new \Datetime());
		    	$em->flush();
		    }
		    sleep(5);
	        }
		}
		
		$em->persist($messemail);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée');
	}
	}
	$liste_mess = $em->getRepository('ProduitServiceBundle:Messemail')
	                    ->findAll();
	return $this->render('UsersAdminuserBundle:Messemail:messemail.html.twig',
	array('form'=>$form->createView(),'liste_mess'=>$liste_mess,'formsupp'=>$formsupp->createView()));
}

public function messageidentifieduserAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	if(isset($_POST['nomdutilisateur']) and isset($_POST['emailutilisateur']) and isset($_POST['titremessage']) and isset($_POST['contenumessage']))
	{
		//envoie d'email
		$siteweb = $this->container->getParameter('siteweb');
		$sitename = $this->container->getParameter('sitename');
		$emailadmin = $this->container->getParameter('emailadmin');
		if($service->email($_POST['emailutilisateur']) and $service->chaineValide($_POST['nomdutilisateur'],3,150) and $service->chaineValide($_POST['titremessage'],3,250) and $service->chaineValide($_POST['contenumessage'],5,2000))
		{
			$messemail = new Messemail();
			$messemail->setTitre($_POST['titremessage']);
			$messemail->setContenu($_POST['contenumessage']);
			$messemail->setCorrespondant($_POST['emailutilisateur']);
			$messemail->setListe(false);
			$messemail->setUser($this->getUser());
			$em->persist($messemail);
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
			
			//envoie d'email
			$siteweb = $this->container->getParameter('siteweb');
			$sitename = $this->container->getParameter('sitename');
			$emailadmin = $this->container->getParameter('emailadmin');
			$mail = new Afmail();
			
			$mail->setFrom($sitename.' <'.$emailadmin.'>'); 
			$mail->setSubject($messemail->getTitre()); 
			$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>$_POST['nomdutilisateur'],'titre' =>$messemail->getTitre(),'contenu'=> $messemail->getContenu())));
			$mail->setTextCharset('utf-8');
			$mail->setHTMLCharset('utf-8');
			$result = $mail->send(array($_POST['emailutilisateur']));
		}else{
			$this->get('session')->getFlashBag()->add('information','Une érreur a été rencontrée.');
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Toutes les données n\'ont pas été reçu.');
	}
	return $this->redirect($this->generateUrl('users_adminuser_message_email_new_letter'));
}

public function supprimermessemailAction(Messemail $mess)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST') {
	$formsupp->bind($request);
	if ($formsupp->isValid()){
	$em->remove($mess);
	$em->flush();
	$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
	}
	}else{
	$this->get('session')->getFlashBag()->add('supprime_mess',$mess->getId());
	$this->get('session')->getFlashBag()->add('supprime_mess',$mess->getTitre());
	}
	return $this->redirect($this->generateUrl('users_adminuser_message_email_new_letter'));
}
}