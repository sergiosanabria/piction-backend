<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseClass;
use Doctrine\ORM\Mapping as ORM;

/**
 * Amistad
 *
 * @ORM\Table(name="amistad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AmistadRepository")
 */
class Amistad extends BaseClass
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="usuario_a", referencedColumnName="id")
     */
    private $usuarioA;

    /**
     * @ORM\ManyToOne(targetEntity="UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="usuario_b", referencedColumnName="id")
     */
    private $usuarioB;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SolicitudAmistad")
     * @ORM\JoinColumn(name="solicitud", referencedColumnName="id")
     */
    private $solicitud;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set solicitud
     *
     * @param \AppBundle\Entity\SolicitudAmistad $solicitud
     *
     * @return Amistad
     */
    public function setSolicitud(\AppBundle\Entity\SolicitudAmistad $solicitud = null)
    {
        $this->solicitud = $solicitud;

        return $this;
    }

    /**
     * Get solicitud
     *
     * @return \AppBundle\Entity\SolicitudAmistad
     */
    public function getSolicitud()
    {
        return $this->solicitud;
    }

    /**
     * Set usuarioA
     *
     * @param \UsuarioBundle\Entity\Usuario $usuarioA
     *
     * @return Amistad
     */
    public function setUsuarioA(\UsuarioBundle\Entity\Usuario $usuarioA = null)
    {
        $this->usuarioA = $usuarioA;

        return $this;
    }

    /**
     * Get usuarioA
     *
     * @return \UsuarioBundle\Entity\Usuario
     */
    public function getUsuarioA()
    {
        return $this->usuarioA;
    }

    /**
     * Set usuarioB
     *
     * @param \UsuarioBundle\Entity\Usuario $usuarioB
     *
     * @return Amistad
     */
    public function setUsuarioB(\UsuarioBundle\Entity\Usuario $usuarioB = null)
    {
        $this->usuarioB = $usuarioB;

        return $this;
    }

    /**
     * Get usuarioB
     *
     * @return \UsuarioBundle\Entity\Usuario
     */
    public function getUsuarioB()
    {
        return $this->usuarioB;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Amistad
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Set fechaActualizacion
     *
     * @param \DateTime $fechaActualizacion
     *
     * @return Amistad
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    /**
     * Set creadoPor
     *
     * @param \UsuarioBundle\Entity\Usuario $creadoPor
     *
     * @return Amistad
     */
    public function setCreadoPor(\UsuarioBundle\Entity\Usuario $creadoPor = null)
    {
        $this->creadoPor = $creadoPor;

        return $this;
    }

    /**
     * Set actualizadoPor
     *
     * @param \UsuarioBundle\Entity\Usuario $actualizadoPor
     *
     * @return Amistad
     */
    public function setActualizadoPor(\UsuarioBundle\Entity\Usuario $actualizadoPor = null)
    {
        $this->actualizadoPor = $actualizadoPor;

        return $this;
    }
}
