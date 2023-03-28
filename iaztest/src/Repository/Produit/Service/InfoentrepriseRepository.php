<?php

namespace App\Repository\Produit\Service;

use Doctrine\ORM\EntityRepository;

/**
 * InfoentrepriseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InfoentrepriseRepository extends EntityRepository
{
public function myFindAll()
{
	$query = $this->createQueryBuilder('i')
	              ->leftJoin('i.detailinfoentreprises','d')
	              ->leftJoin('i.imginfoentreprise','ig')
				  ->addSelect('d')
				  ->addSelect('ig')
	              ->orderBy('i.rang','ASC')
                  ->getQuery();
	return $query->getResult();
}
}