<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseClass;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Exclude;

/**
 * Actividad
 *
 * @ORM\Table(name="actividad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActividadRepository")
 */
class Actividad extends BaseClass
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $description;


    /**
     * @exclude()
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ActividadFrase" ,mappedBy="actividad" ,cascade={"persist","remove"})
     */
    private $frases;

    /**
     * @SerializedName("frases")
     * @VirtualProperty
     */
    public function getFrasesActivas()
    {
        $retorno = array();
        if (count($this->frases)){
            foreach ($this->frases as $item) {
                if ($item->getActivo() && $item->getFrase()->getActivo()) {
                    $retorno [] = $item;
                }
            }
        }

        return $retorno;
    }


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
     * Set name
     *
     * @param string $name
     *
     * @return Actividad
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set descripcion
     *
     * @param string $description
     *
     * @return Actividad
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->frases = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Actividad
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
     * @return Actividad
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    /**
     * Add frase
     *
     * @param \AppBundle\Entity\ActividadFrase $frase
     *
     * @return Actividad
     */
    public function addFrase(\AppBundle\Entity\ActividadFrase $frase)
    {
        $this->frases[] = $frase;

        return $this;
    }

    /**
     * Remove frase
     *
     * @param \AppBundle\Entity\ActividadFrase $frase
     */
    public function removeFrase(\AppBundle\Entity\ActividadFrase $frase)
    {
        $this->frases->removeElement($frase);
    }

    /**
     * Get frases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFrases()
    {
        return $this->frases;
    }

    /**
     * Set creadoPor
     *
     * @param \UsuarioBundle\Entity\Usuario $creadoPor
     *
     * @return Actividad
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
     * @return Actividad
     */
    public function setActualizadoPor(\UsuarioBundle\Entity\Usuario $actualizadoPor = null)
    {
        $this->actualizadoPor = $actualizadoPor;

        return $this;
    }
}
