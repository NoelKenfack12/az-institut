<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace Produit\ProduitBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Produit\ProduitBundle\Entity\Questionnaire;
use Produit\ProduitBundle\Entity\Proposition;
use Produit\ProduitBundle\Entity\Chapitrecours;
use Produit\ProduitBundle\Entity\Produitpanier;
use Produit\ProduitBundle\Entity\Composquestionnaire;
use Produit\ProduitBundle\Form\QuestionnaireType;

class QuestionnaireController extends Controller
{
public function nouvellequestionAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	$service = $this->container->get('general_service.servicetext');

	$question = new Questionnaire();
	$formquestion = $this->createForm(new QuestionnaireType(), $question); 
	
	$request = $this->get('request');
	if ($request->getMethod() == 'POST'){
    $formquestion->bind($request);
	if($formquestion->isValid()){
		$question->setChapitrecours($chapitre);
		$em->persist($question);
		$em->flush();

		$this->get('session')->getFlashBag()->add('information','Votre questionnaire a été mis à jour avec succès.');

	}else{
		$this->get('session')->getFlashBag()->add('information','Une erreur a été rencontrée !!! Vérifier la taille du titre [3,250]');
	}
	}
	return $this->redirect($this->generateUrl('produit_produit_user_modif_chapter', array('id'=>$chapitre->getId())));
}

public function questionnairenotionAction(Chapitrecours $chapitre, $src)
{
	$em = $this->getDoctrine()->getManager();
	$liste_questionnaire = $em->getRepository('ProduitProduitBundle:Questionnaire')
	                          ->findBy(array('chapitrecours'=>$chapitre), array('date'=>'asc'));
	return $this->render('ProduitProduitBundle:Questionnaire:questionnairenotion.html.twig', 
	array('chapitre'=>$chapitre,'liste_questionnaire'=>$liste_questionnaire, 'src'=>$src));
}

public function composquestionnaireAction(Chapitrecours $chapitre, $idpropan, $src)
{
	$em = $this->getDoctrine()->getManager();
	$liste_questionnaire = $em->getRepository('ProduitProduitBundle:Questionnaire')
	                          ->findBy(array('chapitrecours'=>$chapitre,'valide'=>true), array('date'=>'asc'));
	$produit = $chapitre->getPartiecours()->getProduit();
	
	$prodpan = $em->getRepository('ProduitProduitBundle:Produitpanier')
				  ->find($idpropan);
	
	if($prodpan !=  null)
	{
		foreach($liste_questionnaire as $question)
		{
			$oldcompos = $em->getRepository('ProduitProduitBundle:Composquestionnaire')
							->findOneBy(array('produitpanier'=>$prodpan,'questionnaire'=>$question));
			if($oldcompos != null and $oldcompos->getProposition() != null)
			{
				$question->setElement($oldcompos->getProposition()->getId());
			}
		}
	}
	
	$liste_chapter = $em->getRepository('ProduitProduitBundle:Chapitrecours')
						->listechapitrecours($chapitre->getPartiecours()->getProduit()->getId());
	$prechapter = null;			
	foreach($liste_chapter as $chapter)
	{
		if($chapter == $chapitre)
		{
			break;
		}else{
			$prechapter = $chapter;
			$chapter->setEm($em);
		}
	}
	$notemin = $this->container->getParameter('notemin');
	return $this->render('ProduitProduitBundle:Questionnaire:composquestionnaire.html.twig', 
	array('chapitre'=>$chapitre,'prechapter'=>$prechapter,'notemin'=>$notemin,'liste_questionnaire'=>$liste_questionnaire,'prodpan'=>$prodpan, 'src'=>$src));
}

public function validationquestionnaireAction(Chapitrecours $chapitre, Produitpanier $prodpan)
{
	$em = $this->getDoctrine()->getManager();
	$liste_questionnaire = $em->getRepository('ProduitProduitBundle:Questionnaire')
	                          ->findBy(array('chapitrecours'=>$chapitre,'valide'=>true), array('date'=>'asc'));
	$produit = $chapitre->getPartiecours()->getProduit();
	$update = true;
	$request = $this->get('request');
	$newtime = time();
	$repeat = $this->container->getParameter('repeattime');
	$timerequiredexecption = false;
	$lastrepeat = 0;
	$notemin = $this->container->getParameter('notemin');
	$service = $this->container->get('general_service.servicetext');
	$chapitre->setEm($em);
	$noteuser = $chapitre->getNoteQuestionnaire($prodpan);
	if($noteuser >= $notemin)
	{
		$fermer = true;
	}else{
		$fermer = false;
	}
	if($request->getMethod() == 'POST' and $this->getUser() == $prodpan->getPanier()->getUser())
	{
		foreach($liste_questionnaire as $question)
		{
			$oldcompos = $em->getRepository('ProduitProduitBundle:Composquestionnaire')
							->findOneBy(array('produitpanier'=>$prodpan,'questionnaire'=>$question));
			if($oldcompos != null and $oldcompos->getProposition() != null and (((time() - $oldcompos->getLastvalidation())/3600) >= $repeat))
			{
				$oldcompos->setFermer($fermer);
				$oldcompos->setLastvalidation($newtime);
			}else{
				if(((time() - $oldcompos->getLastvalidation())/3600) < $repeat)
				{
					$timerequiredexecption = true;
					$lastrepeat = $oldcompos->getLastvalidation();
				}
				$update = false;
				break;
			}
		}
		
		if($update == true)
		{
			$em->flush();
			$this->get('session')->getFlashBag()->add('information','Votre feuille de composition a été soumise avec succès. Vous avez eu une note de '.$noteuser.'/'.$service->getBareme());
		}else{
			if($timerequiredexecption == true)
			{
				$this->get('session')->getFlashBag()->add('information','Echec ! Vous devez attendre environs '.($repeat - ceil((time() - $lastrepeat)/3600)).'H pour une nouvelle tentative.');
			}else{
				$this->get('session')->getFlashBag()->add('information','Echec ! Il ya des questions que vous n\'avez pas répondu.');
			}
		}
	}else{
		$this->get('session')->getFlashBag()->add('information','Echec ! Vous n\'avez pas le droit de valider ce questionnaire.');
	}
	return $this->redirect($this->generateUrl('produit_produit_presentation_chapter', array('id'=>$chapitre->getId())));
}

public function updatecompositionAction(Produitpanier $propan)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['id']) and isset($_POST['question']))
	{
		$proposition = $em->getRepository('ProduitProduitBundle:Proposition')
	                          ->find($_POST['id']);
		$questionnaire = $em->getRepository('ProduitProduitBundle:Questionnaire')
	                          ->find($_POST['question']);
		$repeat = $this->container->getParameter('repeattime');
		if($proposition != null and $questionnaire != null)
		{
			$oldcompos = $em->getRepository('ProduitProduitBundle:Composquestionnaire')
	                        ->findOneBy(array('produitpanier'=>$propan,'questionnaire'=>$questionnaire));
			if($oldcompos != null)
			{
				if(((time() - $oldcompos->getLastvalidation())/3600) >= $repeat and $oldcompos->getFermer() == false)
				{
					$oldcompos->setProposition($proposition);
				}else{
					if($oldcompos->getFermer() == true)
					{
						echo -1;
						exit;
					}else{
						echo ($repeat - ceil((time() - $oldcompos->getLastvalidation())/3600));
						exit;
					}
				}
			}else{
				$compos = new Composquestionnaire();
				$compos->setQuestionnaire($questionnaire);
				$compos->setProduitpanier($propan);
				$compos->setProposition($proposition);
				$em->persist($compos);
			}
			$em->flush();
			return $this->redirect($this->generateUrl('produit_produit_liste_questionnaire_composition_chapter', array('id'=>$questionnaire->getChapitrecours()->getId(), 'idpropan'=>$propan->getId())));
		}
	}
	echo 'Une erreur a été rencontrée ! Données n\'ont reçus.';
	exit;
}

public function addnewpropositionAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['id']) and isset($_POST['titre']))
	{
		$questionnaire = $em->getRepository('ProduitProduitBundle:Questionnaire')
	                          ->find($_POST['id']);
		if($questionnaire != null)
		{
			$question = new Proposition();
			$question->setTitre(htmlspecialchars($_POST['titre']));
			$question->setQuestionnaire($questionnaire);
			$em->persist($question);
			$em->flush();
			return $this->redirect($this->generateUrl('produit_produit_user_liste_propos_questionnaire', array('id'=>$chapitre->getId())));
		}
	}
	echo 'Une erreur a été rencontrée ! Données n\'ont reçus.';
	exit;
}

public function updatereponseAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['id']))
	{
		$proposition = $em->getRepository('ProduitProduitBundle:Proposition')
	                          ->find($_POST['id']);
		if($proposition != null)
		{
			$question = $proposition->getQuestionnaire();
			$liste_propos = $question->getPropositions();
			
			foreach($liste_propos as $propos)
			{
				$propos->setReponse(false);
			}
			$em->flush();
			
			$proposition->setReponse(true);
			$em->flush();
			return $this->redirect($this->generateUrl('produit_produit_user_liste_propos_questionnaire', array('id'=>$chapitre->getId())));
		}
	}
	echo 'Une erreur a été rencontrée ! Données n\'ont reçus.';
	exit;
}

public function supprimerpropositionAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['id']))
	{
		$proposition = $em->getRepository('ProduitProduitBundle:Proposition')
	                          ->find($_POST['id']);
		if($proposition != null)
		{
			$em->remove($proposition);
			$em->flush();
			return $this->redirect($this->generateUrl('produit_produit_user_liste_propos_questionnaire', array('id'=>$chapitre->getId())));
		}
	}
	echo 'Une erreur a été rencontrée ! Données n\'ont reçus.';
	exit;
}

public function validatequestionAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['id']))
	{
		$question = $em->getRepository('ProduitProduitBundle:Questionnaire')
	                          ->find($_POST['id']);
		if($question != null)
		{
			if($question->getValide() == true)
			{
				$question->setValide(false);
			}else{
				$question->setValide(true);
			}
			$em->flush();
			return $this->redirect($this->generateUrl('produit_produit_user_liste_propos_questionnaire', array('id'=>$chapitre->getId())));
		}
	}
	echo 'Une erreur a été rencontrée ! Données n\'ont reçus.';
	exit;
}

public function deletequestionnaireAction(Chapitrecours $chapitre)
{
	$em = $this->getDoctrine()->getManager();
	if(isset($_POST['id']))
	{
		$questionnaire = $em->getRepository('ProduitProduitBundle:Questionnaire')
	                          ->find($_POST['id']);
		if($questionnaire != null)
		{
			$em->remove($questionnaire);
			$em->flush();
			return $this->redirect($this->generateUrl('produit_produit_user_liste_propos_questionnaire', array('id'=>$chapitre->getId())));
		}
	}
	echo 'Une erreur a été rencontrée ! Données n\'ont reçus.';
	exit;
}
}