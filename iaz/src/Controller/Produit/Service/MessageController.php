<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace App\Controller\Produit\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Produit\Service\MessageType;
use App\Entity\Produit\Service\Message;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;

class MessageController extends AbstractController
{
public function contactus(Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$mess = new Message();
    $form = $this->createForm(MessageType::class, $mess);

	if ($request->getMethod() == 'POST'){
	$form->handleRequest($request);
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
	return $this->render('Theme/Produit/Service/Message/contactus.html.twig', array('form'=>$form->createView()));
}

public function messagerecu()
{
	$em = $this->getDoctrine()->getManager();
	$liste_mess = $em->getRepository(Message::class)
	                 ->myfindAll();
	$formsupp = $this->createFormBuilder()->getForm();
	return $this->render('Theme/Produit/Service/Message/messagerecu.html.twig', array('liste_mess'=>$liste_mess,'formsupp'=>$formsupp->createView()));
}

public function supprimermessage(Message $message, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm();

	if($request->getMethod() == 'POST') {
		$formsupp->handleRequest($request);
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

public function assistanceentreprise(Request $request, $entreprise)
{
	$em = $this->getDoctrine()->getManager();
	$mess = new Message();
    $form = $this->createForm(MessageType::class, $mess);

	if ($request->getMethod() == 'POST'){
	$form->handleRequest($request);
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
	return $this->render('Theme/Produit/Service/Message/assistanceentreprise.html.twig', 
	array('form'=>$form->createView(),'entreprise'=>$entreprise));
}
}