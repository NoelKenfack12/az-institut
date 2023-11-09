<?php
/* (c) Noel Kenfack <noel.kenfack@yahoo.fr> Février 2015
*/
namespace App\Controller\Users\Adminuser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users\Adminuser\Parametreadmin;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Servicetext\GeneralServicetext;

class ParametreadminController extends AbstractController
{
public function parametresadmin(GeneralServicetext $service)
{
	$em = $this->getDoctrine()->getManager();
	$liste_param = $em->getRepository(Parametreadmin::class)
	                  ->findAll();
	// la variable nbparamètre permet de savoir le nombre de paramètres disponible à enregistrés
	$nbparametre = 10;
	if($nbparametre != count($liste_param))
	{
		$oldparam1 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'slideacceuil'));
		if($oldparam1 == null)
		{
			$param1 = new Parametreadmin($service);
			$param1->setType('slideacceuil');
			$param1->setDescription('Permet de choisir le template du slide à l\'accueil.');
			$param1->setUser($this->getUser());
			$em->persist($param1);
		}
		
		$oldparam2 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'logosm'));
		if($oldparam2 == null)
		{
			$param2 = new Parametreadmin($service);
			$param2->setType('logosm');
			$param2->setDescription('Permet d\'enregistrer l\'image reduit du logo.');
			$param2->setUser($this->getUser());
			$em->persist($param2);
		}
		
		$oldparam3 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'telprincipal'));
		if($oldparam3 == null)
		{
			$param3 = new Parametreadmin($service);
			$param3->setType('telprincipal');
			$param3->setDescription('Permet d\'enregistrer le numéro principal de l\'entreprise');
			$param3->setUser($this->getUser());
			$em->persist($param3);
		}
		
		$oldparam4 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'emailprincipal'));
		if($oldparam4 == null)
		{
			$param4 = new Parametreadmin($service);
			$param4->setType('emailprincipal');
			$param4->setDescription('Permet d\'enregistrer l\'adresse email principale de l\'entreprise');
			$param4->setUser($this->getUser());
			$em->persist($param4);
		}
		
		$oldparam5 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'aproposvideo'));
		if($oldparam5 == null)
		{
			$param5 = new Parametreadmin($service);
			$param5->setType('aproposvideo');
			$param5->setDescription('Permet d\'insérer un message à propos de l\'entreprise à l\'accueil de la plateforme');
			$param5->setUser($this->getUser());
			$em->persist($param5);
		}
		
		$oldparam6 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'aproposfooter'));
		if($oldparam6 == null)
		{
			$param6 = new Parametreadmin($service);
			$param6->setType('aproposfooter');
			$param6->setDescription('Permet d\'insérer un message à propos de l\'entreprise à pied de page de la plateforme');
			$param6->setUser($this->getUser());
			$em->persist($param6);
		}
		
		$oldparam7 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'telwhatsapp'));
		if($oldparam7 == null)
		{
			$param7 = new Parametreadmin($service);
			$param7->setType('telwhatsapp');
			$param7->setDescription('Permet d\'insérer votre Numéro Whatsapp');
			$param7->setUser($this->getUser());
			$em->persist($param7);
		}
		
		$oldparam8 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'telligne2'));
		if($oldparam8 == null)
		{
			$param8 = new Parametreadmin($service);
			$param8->setType('telligne2');
			$param8->setDescription('Permet d\'insérer la ligne téléphonique Numéro 2');
			$param8->setUser($this->getUser());
			$em->persist($param8);
		}
		
		$oldparam9 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'localisation'));
		if($oldparam9 == null)
		{
			$param9 = new Parametreadmin($service);
			$param9->setType('localisation');
			$param9->setDescription('Permet d\'insérer le lieu dit de la boutique');
			$param9->setUser($this->getUser());
			$em->persist($param9);
		}
		
		$oldparam10 = $em->getRepository(Parametreadmin::class)
	                    ->findOneBy(array('type'=>'adresse'));
		if($oldparam10 == null)
		{
			$param10 = new Parametreadmin($service);
			$param10->setType('adresse');
			$param10->setDescription('Permet d\'insérer l\'adresse contenant la boite postale de la boutique');
			$param10->setUser($this->getUser());
			$em->persist($param10);
		}
		
		$em->flush();
		$this->get('session')->getFlashBag()->add('parametres','les paramètres ont été mise à jour avec succès !!!');
	}
	
	if(isset($_POST['valeur']) and isset($_POST['idparam']))
	{ 
		$oldparam = $em->getRepository(Parametreadmin::class)
	                   ->find($_POST['idparam']);
		if($oldparam != null)
		{
			$oldparam->setValeur($_POST['valeur']);
			if(isset($_POST['link']))
			{
				$oldparam->setLink($_POST['link']);
			}
			$em->flush();
		}
	}else if(isset($_FILES['logosm']) and isset($_POST['idparam']))
	{
		$oldparam = $em->getRepository(Parametreadmin::class)
	                   ->find($_POST['idparam']);
		if($oldparam != null)
		{
			$src = 0;
			$extension = '';
			if($_FILES['logosm']['error'] == 0)
			{
				$uploadedFile = new UploadedFile($_FILES['logosm']['tmp_name'],$_FILES['logosm']['name'],strtolower(substr(strrchr($_FILES['logosm']['name'], '.'),1)),$_FILES['logosm']['size']);

				$extension = strtolower($uploadedFile->getClientOriginalExtension());
				if(in_array($extension, array('gif','jpg','png','bmp','jpeg')))
				{
					$oldparam->setServicetext($service);
					$oldparam->setFile($uploadedFile);
					$oldparam->setValeur($extension);
					$oldparam->setDate(new \Datetime());
					$em->persist($oldparam);
				}
			}
			$em->flush();
		}
	}
	
	$liste_param = $em->getRepository(Parametreadmin::class)
	                  ->myFindAll();
	return $this->render('Theme/Users/Adminuser/Parametresadmin/parametresadmin.html.twig',
	array('liste_param'=>$liste_param));
}

}