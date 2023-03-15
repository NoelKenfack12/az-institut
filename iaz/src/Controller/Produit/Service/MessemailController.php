<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2016
*/
namespace App\Controller\Produit\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Produit\Service\MessemailType;
use App\Entity\Produit\Service\Messemail;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;
use App\Entity\Users\User\User;
use App\Entity\Users\User\Newsletter;

class MessemailController extends AbstractController
{
public function messageemail(GeneralServicetext $service, Request $request)
{
	$em = $this->getDoctrine()->getManager();
	$messemail = new Messemail();
    $form = $this->createForm(MessemailType::class, $messemail);
	$formsupp = $this->createFormBuilder()->getForm();

	if ($request->getMethod() == 'POST'){
	$form->handleRequest($request);
	$messemail->setUser($this->getUser());
    if ($form->isValid()){
		
		$liste_user = $em->getRepository(User::class)
		                 ->findAll();
		$liste_email = array();
		foreach($liste_user as $user)
		{
			if($service->email($user->getUsername()) and !in_array($user->getUsername(),$liste_email))
			{
				array_push($liste_email, $user->getUsername());
			}
		}
		
		$liste_newsletter = $em->getRepository(Newsletter::class)
		                 ->findAll();
		foreach($liste_newsletter as $news)
		{
			if($news->getEmail() != null and !in_array($news->getEmail(),$liste_email))
			{
				array_push($liste_email, $news->getEmail());
			}
		}
		
		for($i = 0; $i < count($liste_email); $i++)
		{
			$mailer = $this->get('mailer');
			$message = \Swift_Message::newInstance()
			->setSubject($messemail->getTitre())
			->setFrom('infos@azcorporation.net')
			->setTo($liste_email[$i])
			->setBody($messemail->getContenu());
			$mailer->send($message);
		}
		
		$em->persist($messemail);
		$em->flush();
		$this->get('session')->getFlashBag()->add('information','Enregistrement effectué avec succès');
	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée');
	}
	}
	$liste_mess = $em->getRepository(Messemail::class)
	                    ->findAll();
	return $this->render('Theme/Users/Adminuser/Messemail/messemail.html.twig',
	array('form'=>$form->createView(),'liste_mess'=>$liste_mess,'formsupp'=>$formsupp->createView()));
}

public function supprimermessemail(Messemail $mess)
{
	$em = $this->getDoctrine()->getManager();
	$formsupp = $this->createFormBuilder()->getForm();
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
	$formsupp->handleRequest($request);
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