<?php
/*
* (c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace App\Controller\Users\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users\User\Newsletter;
use App\Form\Users\User\NewsletterType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;

class NewsletterController extends AbstractController
{
public function createaccount(Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$newsletter = new Newsletter();
	$form = $this->createForm(NewsletterType::class, $newsletter);

	if ($request->getMethod() == 'POST'){
		$form->handleRequest($request);
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