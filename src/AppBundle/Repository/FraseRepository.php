<?php

namespace AppBundle\Repository;

/**
 * FraseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FraseRepository extends \Doctrine\ORM\EntityRepository
{


    public function misFrases($user){

        $qb = $this->createQueryBuilder('f')
            ->andWhere("f.activo = true")
            ->andWhere("f.creadoPor = :user")
            ->setParameter("user", $user)
            ;

        return $qb->getQuery()->getResult();
    }
}
