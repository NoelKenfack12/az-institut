<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Form\MessageType;
use Produit\ServiceBundle\Entity\Message;
use Users\UserBundle\Entity\Newsletter;

use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;

class MessageController extends Controller
{
public function contactusAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
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
		
		//envoie d'email
		$siteweb = $this->container->getParameter('siteweb');
		$sitename = $this->container->getParameter('sitename');
		$emailadmin = $this->container->getParameter('emailadmin');
		if($service->email($emailadmin))
		{
			$mail = new Afmail();
			
			$mail->setFrom($sitename.' <'.$mess->getEmail().'>'); 
			$mail->setSubject($mess->getNom().' viens d\'envoyer un message sur '.$sitename); 
			$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>'Team '.$sitename,'titre' => $mess->getTitre(),'contenu'=> $mess->getContenu())));
			$mail->setTextCharset('utf-8');
			$mail->setHTMLCharset('utf-8');
			$result = $mail->send(array($emailadmin));
		}
		
		$oldemail = $em->getRepository('UsersUserBundle:Newsletter')
                    ->findBy(array('email'=>$mess->getEmail()));
		if($oldemail == null)
		{
			$newsletter = new Newsletter();
			$newsletter->setNom($mess->getNom());
			$newsletter->setEmail($mess->getEmail());
			$em->persist($newsletter);
			$em->flush();
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée, Vérifier le formulaire !');
	}
	}
	
	$liste_categorie = $em->getRepository('ProduitProduitBundle:Categorie')
	                    ->findAll();
	return $this->render('ProduitServiceBundle:Message:contactus.html.twig', array('form'=>$form->createView(),'liste_categorie'=>$liste_categorie));
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

}