<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseClass;
use Doctrine\ORM\Mapping as ORM;

/**
 * SolicitudAmistad
 *
 * @ORM\Table(name="solicitud_amistad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SolicitudAmistadRepository")
 */
class SolicitudAmistad extends BaseClass
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
     * @ORM\ManyToOne(targetEntity="UsuarioBundle\Entity\Usuario", inversedBy="solicitudesAmistad")
     * @ORM\JoinColumn(name="usuario_solicita_id", referencedColumnName="id")
     */
    private $usuarioSolicita;

    /**
     * @ORM\ManyToOne(targetEntity="UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="usuario_solicitado_id", referencedColumnName="id")
     */
    private $usuarioSolicitado;

    /**
     * @var bool
     *
     * @ORM\Column(name="aceptado", type="boolean")
     */
    protected $aceptado = false;


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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return SolicitudAmistad
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
     * @return SolicitudAmistad
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    /**
     * Set usuarioSolicita
     *
     * @param \UsuarioBundle\Entity\Usuario $usuarioSolicita
     *
     * @return SolicitudAmistad
     */
    public function setUsuarioSolicita(\UsuarioBundle\Entity\Usuario $usuarioSolicita = null)
    {
        $this->usuarioSolicita = $usuarioSolicita;

        return $this;
    }

    /**
     * Get usuarioSolicita
     *
     * @return \UsuarioBundle\Entity\Usuario
     */
    public function getUsuarioSolicita()
    {
        return $this->usuarioSolicita;
    }

    /**
     * Set usuarioSolicitado
     *
     * @param \UsuarioBundle\Entity\Usuario $usuarioSolicitado
     *
     * @return SolicitudAmistad
     */
    public function setUsuarioSolicitado(\UsuarioBundle\Entity\Usuario $usuarioSolicitado = null)
    {
        $this->usuarioSolicitado = $usuarioSolicitado;

        return $this;
    }

    /**
     * Get usuarioSolicitado
     *
     * @return \UsuarioBundle\Entity\Usuario
     */
    public function getUsuarioSolicitado()
    {
        return $this->usuarioSolicitado;
    }

    /**
     * Set creadoPor
     *
     * @param \UsuarioBundle\Entity\Usuario $creadoPor
     *
     * @return SolicitudAmistad
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
     * @return SolicitudAmistad
     */
    public function setActualizadoPor(\UsuarioBundle\Entity\Usuario $actualizadoPor = null)
    {
        $this->actualizadoPor = $actualizadoPor;

        return $this;
    }

    /**
     * Set aceptado
     *
     * @param boolean $aceptado
     *
     * @return SolicitudAmistad
     */
    public function setAceptado($aceptado)
    {
        $this->aceptado = $aceptado;

        return $this;
    }

    /**
     * Get aceptado
     *
     * @return boolean
     */
    public function getAceptado()
    {
        return $this->aceptado;
    }
}
