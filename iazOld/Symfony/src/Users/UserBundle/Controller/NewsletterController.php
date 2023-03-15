<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace Users\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Users\UserBundle\Entity\Newsletter;
use Users\UserBundle\Form\NewsletterType;

class NewsletterController extends Controller
{
public function createaccountAction()
{
	$em = $this->getDoctrine()->getManager();
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
	$this->get('session')->getFlashBag()->add('alertnewsletter','Inscription a la newsletter effectuée avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('alertnewsletter','Une erreur a été rencontré, Il se peut que votre email est déjà enregistré');
	}
	}
	return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
}
}