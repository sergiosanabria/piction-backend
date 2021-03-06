<?php

namespace AppBundle\Repository;

/**
 * ActividadRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ActividadRepository extends \Doctrine\ORM\EntityRepository
{

    public function misActividades($user)
    {
        $qb = $this->createQueryBuilder('a')
            ->andWhere("a.activo = true")
            ->andWhere("a.creadoPor = :user")
            ->setParameter("user", $user);

        return $qb->getQuery()->getResult();

    }
}
