<?php

namespace UsuarioBundle\Entity;

/**
 * AlumnoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuarioRepository extends \Doctrine\ORM\EntityRepository
{

    public function buscarAmigos($nombre, $usuario)
    {

        $nombre = strtoupper(trim($nombre));

        $arrayNombre = explode(' ', $nombre);

        foreach ($arrayNombre as $n) {
            $arraySqlNombre [] = "p.nombre like '%$n%' OR p.apellido like '%$n%'";
        }

        $sqlNombre = implode(' OR ', $arraySqlNombre);


        $qb = $this->createQueryBuilder('u')
            ->innerJoin('u.persona', 'p')
            ->where('p.activo = true')
//            ->andWhere("p.nombre like '%$nombre%' OR p.nombre like '%$nombre%'")
            ->andWhere($sqlNombre)
            ->andWhere('u <> :usuario')
            ->setParameter('usuario', $usuario)
            ->setMaxResults(15);

        return $qb->getQuery()->getResult();;

    }

    public function misAmigos($nombre, $usuario)
    {

        $nombre = strtoupper(trim($nombre));

        $arrayNombre = explode(' ', $nombre);

        foreach ($arrayNombre as $n) {
            $arraySqlNombre [] = "p.nombre like '%$n%' OR p.apellido like '%$n%'";
        }

        $sqlNombre = implode(' OR ', $arraySqlNombre);


        $qb = $this->createQueryBuilder('u')
            ->innerJoin('u.persona', 'p')
            ->where('p.activo = true')
//            ->andWhere("p.nombre like '%$nombre%' OR p.nombre like '%$nombre%'")
            ->andWhere($sqlNombre)
            ->andWhere('u <> :usuario')
            ->setParameter('usuario', $usuario)
            ->setMaxResults(15);

        return $qb->getQuery()->getResult();;

    }

    public function getSolicitudesAmistadEnviadas($usuario)
    {


        $qb = $this->createQueryBuilder('u')
            ->innerJoin('u.solicitudAmistad', 'sa')
            ->innerJoin('sa.usuarioSolicita', 'usuarioSolicita')
            ->innerJoin('sa.usuarioSolicitado', 'usuarioSolicitado')
            ->where('sa.activo = true')
            ->andWhere('usuarioSolicita = :usuario')
            ->setParameter('usuario', $usuario)
            ->setMaxResults(15);

        return $qb->getQuery()->getResult();

    }



    public function getSolicitudesAmistadByUsuario($usuario, $usuarioSolicitado)
    {


        $qb = $this->createQueryBuilder('u')
            ->innerJoin('u.solicitudesAmistad', 'solicitudesAmistad')
            ->where('solicitudesAmistad.activo = true')
            ->andWhere('solicitudesAmistad.usuarioSolicita = :usuario')
            ->andWhere('solicitudesAmistad.usuarioSolicitado = :usuarioSolicitado')
            ->setParameter('usuario', $usuario)
            ->setParameter('usuarioSolicitado', $usuarioSolicitado)
            ->setMaxResults(15);

        return $qb->getQuery()->getResult();

    }
}