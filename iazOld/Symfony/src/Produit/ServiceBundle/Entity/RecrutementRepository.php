<?php

namespace Produit\ServiceBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * RecrutementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RecrutementRepository extends EntityRepository
{
public function myfindAll()
{
	$query = $this->createQueryBuilder('r')
	              ->orderBy('r.date','DESC')
                  ->getQuery();
	return $query->getResult();
}
}
