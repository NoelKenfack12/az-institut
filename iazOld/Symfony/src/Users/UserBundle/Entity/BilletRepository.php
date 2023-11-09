<?php

namespace Users\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * BilletRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BilletRepository extends EntityRepository
{
public function myFindReview($page, $nombreParPage)
{
	if ($page < 1){
	throw new \InvalidArgumentException('Page inexistant');
	}
	$query = $this->createQueryBuilder('b')
	              ->leftJoin('b.reponsebillets','r')
				  ->addSelect('r')
	              ->where('b.avis = 1')
	              ->orderBy('b.date','DESC')
                  ->getQuery();
	$query->setFirstResult(($page-1) * $nombreParPage)
		  ->setMaxResults($nombreParPage);
	return new Paginator($query);
}

public function myFindTopReview($page, $nombreParPage)
{
	if ($page < 1){
	throw new \InvalidArgumentException('Page inexistant');
	}
	$query = $this->createQueryBuilder('b')
	              ->leftJoin('b.reponsebillets','r')
				  ->addSelect('r')
	              ->where('b.avis = 1 and b.avisuser >= 3')
	              ->orderBy('b.date','DESC')
                  ->getQuery();
	$query->setFirstResult(($page-1) * $nombreParPage)
		  ->setMaxResults($nombreParPage);
	return new Paginator($query);
}

public function getTotalAvisUtilisateur()
{
	$query = $this->_em->createQuery('SELECT COUNT(b.id) FROM UsersUserBundle:Billet b WHERE b.avis = 1');
	 
	return $query->getSingleScalarResult();
}

public function getSommeAvisValide()
{
	$query = $this->_em->createQuery('SELECT SUM(b.avisuser) FROM UsersUserBundle:Billet b WHERE b.avis = 1');
	 
	return $query->getSingleScalarResult();
}

public function getNbreAvisValeur($val)
{
	$query = $this->_em->createQuery('SELECT COUNT(b.id) FROM UsersUserBundle:Billet b WHERE b.avis = 1 AND b.avisuser = :val');
	$query->setParameter('val', $val);
	 
	return $query->getSingleScalarResult();
}

public function getSommeAvisValeur($val)
{
	$query = $this->_em->createQuery('SELECT SUM(b.avisuser) FROM UsersUserBundle:Billet b WHERE b.avis = 1 AND b.avisuser = :val');
	$query->setParameter('val', $val);
	 
	return $query->getSingleScalarResult();
}
}