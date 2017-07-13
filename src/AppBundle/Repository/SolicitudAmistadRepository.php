<?php

namespace AppBundle\Repository;

/**
 * SolicitudAmistadRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SolicitudAmistadRepository extends \Doctrine\ORM\EntityRepository
{
    public function getSolicitudesAmistadByUsuario($usuario, $usuarioSolicitado)
    {


        $qb = $this->createQueryBuilder('solicitudesAmistad')
            ->where('solicitudesAmistad.activo = true')
            ->andWhere('solicitudesAmistad.usuarioSolicita = :usuario')
            ->andWhere('solicitudesAmistad.usuarioSolicitado = :usuarioSolicitado')
            ->setParameter('usuario', $usuario)
            ->setParameter('usuarioSolicitado', $usuarioSolicitado)
            ->orderBy('solicitudesAmistad.fechaCreacion', 'DESC')
            ->setMaxResults(15);

        return $qb->getQuery()->getResult();

    }

    public function getSolicitudesAmistadRecibidas($usuario)
    {


        $qb = $this->createQueryBuilder('sa')
            ->innerJoin('sa.usuarioSolicita', 'usuarioSolicita')
            ->innerJoin('sa.usuarioSolicitado', 'usuarioSolicitado')
            ->where('sa.activo = true')
            ->andWhere('usuarioSolicitado = :usuario')
            ->andWhere('sa.aceptado <> true')
            ->setParameter('usuario', $usuario)
        ;

        return $qb->getQuery()->getResult();

    }
}