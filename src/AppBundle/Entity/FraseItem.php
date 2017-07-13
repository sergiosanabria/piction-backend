<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseClass;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * FraseItem
 *
 * @ORM\Table(name="frase_item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FraseItemRepository")
 * @ExclusionPolicy("all")
 */
class FraseItem extends BaseClass
{
    /**
     * @var int
     * @expose()
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
     * @ORM\Column(name="pictoId", type="string", nullable=true, length=10)
     */
    private $pictoId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="text", nullable=true)
     */
    private $data;

    /**
     * @var string
     * @expose()
     * @ORM\Column(name="type", type="string", length=40, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="fileName", type="string", length=255, nullable=true)
     */
    private $fileName;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PictogramaCustom")
     * @ORM\JoinColumn(name="pictograma_custom_id", referencedColumnName="id", nullable=true)
     */
    private $pictogramaCustom;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Frase", inversedBy="items")
     * @ORM\JoinColumn(name="frase_id", referencedColumnName="id", nullable=true)
     */
    private $frase;


    /**
     * @SerializedName("data")
     * @VirtualProperty
     */
    public function getJsonData()
    {

        return json_decode($this->data, true);

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
     * @return FraseItem
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
     * Set type
     *
     * @param string $type
     *
     * @return FraseItem
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set fileName
     *
     * @param string $fileName
     *
     * @return FraseItem
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return FraseItem
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return FraseItem
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
     * @return FraseItem
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
     * @return FraseItem
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
     * Set creadoPor
     *
     * @param \UsuarioBundle\Entity\Usuario $creadoPor
     *
     * @return FraseItem
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
     * @return FraseItem
     */
    public function setActualizadoPor(\UsuarioBundle\Entity\Usuario $actualizadoPor = null)
    {
        $this->actualizadoPor = $actualizadoPor;

        return $this;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return FraseItem
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set data
     *
     * @param string $data
     *
     * @return FraseItem
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set pictoId
     *
     * @param string $pictoId
     *
     * @return FraseItem
     */
    public function setPictoId($pictoId)
    {
        $this->pictoId = $pictoId;

        return $this;
    }

    /**
     * Get pictoId
     *
     * @return string
     */
    public function getPictoId()
    {
        return $this->pictoId;
    }

    /**
     * Set pictogramaCustom
     *
     * @param \AppBundle\Entity\PictogramaCustom $pictogramaCustom
     *
     * @return FraseItem
     */
        public function setPictogramaCustom(\AppBundle\Entity\PictogramaCustom $pictogramaCustom = null)
    {
        $this->pictogramaCustom = $pictogramaCustom;

        return $this;
    }

    /**
     * Get pictogramaCustom
     *
     * @return \AppBundle\Entity\PictogramaCustom
     */
    public function getPictogramaCustom()
    {
        return $this->pictogramaCustom;
    }
}
