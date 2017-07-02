<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseClass;
use Doctrine\ORM\Mapping as ORM;

/**
 * ActividadFrase
 *
 * @ORM\Table(name="actividad_frase")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActividadFraseRepository")
 */
class ActividadFrase extends BaseClass
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Frase")
     * @ORM\JoinColumn(name="frase_id", referencedColumnName="id", nullable=true)
     */
    private $frase;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Actividad")
     * @ORM\JoinColumn(name="actividad_id", referencedColumnName="id", nullable=true)
     */
    private $actividad;


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
     * @return ActividadFrase
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
     * @return ActividadFrase
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    /**
     * Set frase
     *
     * @param \AppBundle\Entity\Frase $frase
     *
     * @return ActividadFrase
     */
    public function setFrase(\AppBundle\Entity\Frase $frase = null)
    {
        $this->frase = $frase;

        return $this;
    }

    /**
     * Get frase
     *
     * @return \AppBundle\Entity\Frase
     */
    public function getFrase()
    {
        return $this->frase;
    }

    /**
     * Set actividad
     *
     * @param \AppBundle\Entity\Actividad $actividad
     *
     * @return ActividadFrase
     */
    public function setActividad(\AppBundle\Entity\Actividad $actividad = null)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return \AppBundle\Entity\Actividad
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Set creadoPor
     *
     * @param \UsuarioBundle\Entity\Usuario $creadoPor
     *
     * @return ActividadFrase
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
     * @return ActividadFrase
     */
    public function setActualizadoPor(\UsuarioBundle\Entity\Usuario $actualizadoPor = null)
    {
        $this->actualizadoPor = $actualizadoPor;

        return $this;
    }
}
