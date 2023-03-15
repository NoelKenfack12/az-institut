<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Form\MessageType;
use Produit\ServiceBundle\Entity\Message;

class MessageController extends Controller
{
public function contactusAction()
{
	$em = $this->getDoctrine()->getManager();
	$mess = new Message();
    $form = $this->createForm(new MessageType, $mess);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$form->bind($request);
	if($this->getUser() != null)
	{
		$mess->setUser($this->getUser());
	}else{
		if($mess->getNom() == null and $mess->getEmail() == null)
		{
			$this->get('session')->getFlashBag()->add('information','Vous devez entrer votre nom et votre email!');
			return $this->redirect($this->generateUrl('produit_service_contact_us'));
		}
	}
	
    if ($form->isValid()){
		$em->persist($mess);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Votre message a été enregistré avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée, Vérifier le formulaire !');
	}
	}
	return $this->render('ProduitServiceBundle:Message:contactus.html.twig', array('form'=>$form->createView()));
}
public function messagerecuAction()
{
	$em = $this->getDoctrine()->getManager();
	$liste_mess = $em->getRepository('ProduitServiceBundle:Message')
	                 ->myfindAll();
	$formsupp = $this->createFormBuilder()->getForm();
	return $this->render('ProduitServiceBundle:Message:messagerecu.html.twig', array('liste_mess'=>$liste_mess,'formsupp'=>$formsupp->createView()));
}
public function supprimermessageAction(Message $message)
{
	$em = $this->getDoctrine()->getManager();
		$formsupp = $this->createFormBuilder()->getForm();
		$request = $this->get('request');
		if ($request->getMethod() == 'POST') {
		$formsupp->bind($request);
		if ($formsupp->isValid()){
		$em->remove($message);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Suppression effectuée avec succès');
		}
		}else{
		$this->get('session')->getFlashBag()->add('supprime_mess',$message->getId());
	    $this->get('session')->getFlashBag()->add('supprime_mess',$message->getTitre());
		}
	return $this->redirect($this->generateUrl('users_adminuser_liste_message_recu'));
}
public function assistanceentrepriseAction($entreprise)
{
	$em = $this->getDoctrine()->getManager();
	$mess = new Message();
    $form = $this->createForm(new MessageType, $mess);
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$form->bind($request);
	if($this->getUser() != null)
	{
		$mess->setUser($this->getUser());
	}else{
		if($mess->getNom() == null and $mess->getEmail() == null)
		{
			$this->get('session')->getFlashBag()->add('information','Vous devez entrer votre nom et votre email!');
			return $this->redirect($this->generateUrl('produit_service_assistance_entreprise'));
		}
	}
	
    if ($form->isValid()){
		$em->persist($mess);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Votre message a été enregistré avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une ereur a été rencontrée, Vérifier le formulaire !');
	}
	}
	return $this->render('ProduitServiceBundle:Message:assistanceentreprise.html.twig', array('form'=>$form->createView(),'entreprise'=>$entreprise));
}
}