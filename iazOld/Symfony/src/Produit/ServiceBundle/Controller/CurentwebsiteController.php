<?php
/*(c) Noel Kenfack <noel.kenfack@yahoo.fr>
*/
namespace Produit\ServiceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Produit\ServiceBundle\Entity\Curentwebsite;

class CurentwebsiteController extends Controller
{
public function curentwebsiteAction()
{
	$curentwebsite = $this->container->getParameter('curentwebsite');
	$website = explode('-',$curentwebsite);
	$key = '';
	for($i = 0; $i < count($website); $i++)
	{
		$key = $key.''.$website[$i];
	}
	$em = $this->getDoctrine()->getManager();
	$curentsite = $em->getRepository('ProduitServiceBundle:Curentwebsite')
						->findOneBy(array('nom'=>$key));
	$request = $this->getRequest();
	if($request->getMethod() == 'POST')
	{
	if(isset($_POST['key_one']) and isset($_POST['key_two']) and isset($_POST['key_three']))
	{
		$essaie = $_POST['key_one'].''.$_POST['key_two'].''.$_POST['key_three'];
		if($essaie == $key and $curentsite == null)
		{
			$instance = new Curentwebsite();
			$instance->setNom($essaie);
			$em->persist($instance);
			$em->flush();
			return $this->redirect($this->generateUrl('users_user_acces_plateforme'));
		}
	}
	}
	return new Response('<h2 style="color: red;">Cette clé d\'identification n\'existe pas.</h2>');
}
}