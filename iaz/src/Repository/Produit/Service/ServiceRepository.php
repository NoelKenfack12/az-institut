<?php

namespace App\Repository\Produit\Service;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * ServiceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ServiceRepository extends EntityRepository
{
public function myfindAll()
{
	$query = $this->createQueryBuilder('s')
	              ->leftJoin('s.evenements','e')
				  ->addSelect('e')
	              ->orderBy('s.date','ASC')
                  ->getQuery();
	return $query->getResult();
}

public function findPhotoArticle($id)
{
	$query = $this->createQueryBuilder('s')
	              ->leftJoin('s.evenements','e')
				  ->addSelect('e')
				  ->where('s.typearticle LIKE :n AND s.id != :id')
				  ->setParameter('n','%galeriephoto%')
				  ->setParameter('id',$id)
	              ->orderBy('s.date','ASC')
                  ->getQuery();
	return $query->getResult();
}
public function findVideoArticle($id)
{
	$query = $this->createQueryBuilder('s')
	              ->leftJoin('s.evenements','e')
				  ->addSelect('e')
				  ->where('s.typearticle LIKE :n AND s.id != :id')
				  ->setParameter('n','%mediatheque%')
				  ->setParameter('id',$id)
	              ->orderBy('s.date','ASC')
                  ->getQuery();
	return $query->getResult();
}

public function findAllArticle($page, $nombreParPage)
{
	if($page < 1){
		throw new \InvalidArgumentException('Page inexistant');
	}
	$query = $this->createQueryBuilder('s')
	              ->leftJoin('s.type','t')
				  ->addSelect('t')
				  ->where('t IS NULL')
	              ->orderBy('s.rang','ASC')
                  ->getQuery();
	$query->setFirstResult(($page-1) * $nombreParPage)
		  ->setMaxResults($nombreParPage);
	return new Paginator($query);
}
public function findArticleType($id, $page, $nombreParPage)
{
	if($page < 1){
		throw new \InvalidArgumentException('Page inexistant');
	}
	$query = $this->createQueryBuilder('s')
	              ->leftJoin('s.type','t')
	              ->leftJoin('s.souscategorie','sc')
				  ->addSelect('t')
				  ->addSelect('sc')
				  ->where('t.id = :id')
				  ->setParameter('id',$id)
	              ->orderBy('s.rang','ASC')
                  ->getQuery();
	$query->setFirstResult(($page-1) * $nombreParPage)
		  ->setMaxResults($nombreParPage);
	return new Paginator($query);
}

public function topservice($id)
{
	$query = $this->createQueryBuilder('s')
	              ->leftJoin('s.evenements','e')
	              ->orderBy('s.date','ASC')
				  ->where('s.principal = 1')
				  ->setMaxResults($id)
                  ->getQuery();
	return $query->getResult();
}

public function findBlog($page,$nombreParPage,$type='')
{
     // On déplace la vérification du numéro de page dans cette méthode
    if ($page < 1){
    throw new \InvalidArgumentException('Page inexistant');
    }
    // La construction de la requête reste inchangée
    $query = $this->createQueryBuilder('s')
	              ->leftJoin('s.evenements', 'e')
				  ->addSelect('e')
				  ->where('s.typearticle LIKE :ta')
				  ->setParameter('ta','%'.$type.'%')
                  ->orderBy('s.rang', 'ASC')
                  ->getQuery();
    // On définit l'établissemnt à partir duquel commencer la liste
    $query->setFirstResult(($page-1) * $nombreParPage)
    // Ainsi que le nombre d'établissement à afficher
          ->setMaxResults($nombreParPage);
    // Enfin, on retourne l'objet Paginator correspondant à la requête construite
return new Paginator($query);
}

public function myAllBlog($id, $page,$nombreParPage,$type='')
{
     // On déplace la vérification du numéro de page dans cette méthode
    if($page < 1){
		throw new \InvalidArgumentException('Page inexistant');
    }
    // La construction de la requête reste inchangée
    $query = $this->createQueryBuilder('s')
	              ->leftJoin('s.evenements', 'e')
	              ->leftJoin('s.type', 't')
				  ->addSelect('e')
				  ->addSelect('t')
				  ->where('s.typearticle LIKE :ta AND t.id = :id')
				  ->setParameter('ta','%'.$type.'%')
				  ->setParameter('id',$id)
                  ->orderBy('s.rang', 'ASC')
                  ->getQuery();
    // On définit l'établissemnt à partir duquel commencer la liste
    $query->setFirstResult(($page-1) * $nombreParPage)
    // Ainsi que le nombre d'établissement à afficher
          ->setMaxResults($nombreParPage);
    // Enfin, on retourne l'objet Paginator correspondant à la requête construite
return new Paginator($query);
}

public function getSelectList()
{
	 $qb = $this->createQueryBuilder('s')

                  ->orderBy('s.nom','ASC');
	return $qb;
}

public function myFindType($type)
{
	$query = $this->createQueryBuilder('s')
	              ->leftJoin('s.type','t')
				  ->addSelect('t')
	              ->where('t.position LIKE :n')
				  ->setParameter('n','%'.$type.'%')
	              ->orderBy('s.rang','ASC')
                  ->getQuery();
	return $query->getResult();
}
}
