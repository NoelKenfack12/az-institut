<?php

namespace Users\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
public function findManager()
{
	$query = $this->createQueryBuilder('u')
				  ->where('u.roles LIKE :n OR u.roles LIKE :g OR u.roles LIKE :m')
				  ->setParameter('n','%ROLE_ADMIN%')
				  ->setParameter('g','%ROLE_GESTION%')
				  ->setParameter('m','%ROLE_MANAGER_ED%')
                  ->orderBy('u.nom', 'ASC')
                  ->getQuery();
return $query->getResult();
}
}
