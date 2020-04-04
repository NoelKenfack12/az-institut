<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace Users\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Users\UserBundle\Entity\Newsletter;
use Users\UserBundle\Form\NewsletterType;

use General\ServiceBundle\AfMail\Afmail;
use General\ServiceBundle\AfMail\fileAttachment;

class NewsletterController extends Controller
{
public function createaccountAction()
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');
	$newsletter = new Newsletter();
	$form = $this->createForm(new NewsletterType, $newsletter);
    $request = $this->get('request');
	if ($request->getMethod() == 'POST'){
    $form->bind($request);
    if ($form->isValid()){
	$em->persist($newsletter);
    $em->flush();
	$session = $this->get('session');
	$session->set('test_newsletter',100);
	$this->get('session')->getFlashBag()->add('alertnewsletter','<span class="fa fa-info-circle"></span> Inscription a la newsletter effectuée avec succès');
	
	//envoie d'email
	$siteweb = $this->container->getParameter('siteweb');
	$sitename = $this->container->getParameter('sitename');
	$emailadmin = $this->container->getParameter('emailadmin');
	if($service->email($emailadmin))
	{
		$mail = new Afmail();
		
		$mail->setFrom($newsletter->getNom().' <'.$newsletter->getEmail().'>'); 
		$mail->setSubject($newsletter->getNom().' viens de suscrire pour la newsletter sur '.$sitename); 
		$mail->setHTML($this->renderView('UsersUserBundle:User:envoiemail.html.twig', array('nom'=>'Hello Team '.$sitename,'titre' => $newsletter->getNom().' viens de suscrire pour la newsletter sur '.$sitename,'contenu'=> 'Envoyé lui un petit message pour lui souhaité la bienvenue !')));
		$mail->setTextCharset('utf-8');
		$mail->setHTMLCharset('utf-8');
		$result = $mail->send(array($emailadmin));
	}
						
	}else{
		$this->get('session')->getFlashBag()->add('alertnewsletter','<span class="fa fa-info-circle"></span> Une erreur a été rencontré, Il se peut que votre email est déjà enregistré');
	}
	}
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
}
}