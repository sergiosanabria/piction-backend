<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseClass;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @ORM\Entity
 * @ORM\Table(name="persona")
 */
class Persona extends BaseClass
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @var String $nombre
     *
     * @ORM\Column(type="string" , length=150)
     */
    protected $nombre;

    /**
     *
     * @var String $apellido
     *
     * @ORM\Column(type="string" , length=255, nullable=true)
     */
    protected $apellido;

    /**
     *
     * @var String $fechaNacimiento
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $fechaNacimiento;

    /**
     *
     * @var String $sexo
     *
     * @ORM\Column(type="string" , length=50, nullable=true)
     */
    protected $sexo;

    /**
     *
     * @var String $perfil
     *
     * @ORM\Column(type="text" , nullable=true)
     */
    protected $perfil;

    /**
     *
     * @var String $telefonoPrincipal
     *
     * @ORM\Column(type="string" , length=50, nullable=true)
     */
    protected $telefonoPrincipal;

    /**
     *
     * @var String $telefonoSecundario
     *
     * @ORM\Column(type="string" , length=50, nullable=true)
     */
    protected $telefonoSecundario;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", cascade={"persist"})
     */
    protected $image;

    protected $path;


    /**
     * @ORM\OneToOne(targetEntity="UsuarioBundle\Entity\Usuario" ,  inversedBy="persona" ,cascade={"persist","remove"})
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    protected $usuario;

    /**
     * @SerializedName("foto")
     * @VirtualProperty
     */
    public function getPathImage()
    {
        if (!$this->getImage()) {
            return '';
        }
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, strpos($_SERVER["SERVER_PROTOCOL"], '/'))) . '://';
        $host = $protocol . $_SERVER['HTTP_HOST'];
        $rr = '/pictograma-backend/web/uploads/images/image/';

        $host = $host . $rr;
        return $host . $this->getImage()->getImageName();

    }

    /**
     * @SerializedName("nombreCompleto")
     * @VirtualProperty
     */
    public function getNombreCompleto()
    {
        return $this->getNombre(). ' '. $this->getApellido();

    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        $host = $_SERVER['host'];
        return "https://" . $host . $this->getImage()->getImageName();
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
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
     * Set nombreCompleto
     *
     * @param string $nombre
     *
     * @return Persona
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombreCompleto
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Persona
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }


    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Persona
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set telefonoPrincipal
     *
     * @param string $telefonoPrincipal
     *
     * @return Persona
     */
    public function setTelefonoPrincipal($telefonoPrincipal)
    {
        $this->telefonoPrincipal = $telefonoPrincipal;

        return $this;
    }

    /**
     * Get telefonoPrincipal
     *
     * @return string
     */
    public function getTelefonoPrincipal()
    {
        return $this->telefonoPrincipal;
    }

    /**
     * Set telefonoSecundario
     *
     * @param string $telefonoSecundario
     *
     * @return Persona
     */
    public function setTelefonoSecundario($telefonoSecundario)
    {
        $this->telefonoSecundario = $telefonoSecundario;

        return $this;
    }

    /**
     * Get telefonoSecundario
     *
     * @return string
     */
    public function getTelefonoSecundario()
    {
        return $this->telefonoSecundario;
    }


    /**
     * Set usuario
     *
     * @param \UsuarioBundle\Entity\Usuario $usuario
     *
     * @return Persona
     */
    public function setUsuario(\UsuarioBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \UsuarioBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->equipos = new \Doctrine\Common\Collections\ArrayCollection();
    }

//    /**
//     * Retorna el nombre completo del objeto Persona
//     *
//     * @return string
//     */
//    public function getNombreCompleto()
//    {
//        return sprintf('%s %s', $this->getNombre(), $this->getApellido());
//    }


    public function __toString()
    {
        return $this->getNombreCompleto();
    }


    /**
     * Get configuracion
     *
     * @return \AppBundle\Entity\Configuracion
     */
    public function getConfiguracion()
    {
        return $this->configuracion;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Persona
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
     * @return Persona
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
     * @return Persona
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
     * @return Persona
     */
    public function setActualizadoPor(\UsuarioBundle\Entity\Usuario $actualizadoPor = null)
    {
        $this->actualizadoPor = $actualizadoPor;

        return $this;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Persona
     */
    public function setFechaNacimiento(\DateTime $fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Persona
     */
    public function setImage(\AppBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set perfil
     *
     * @param string $perfil
     *
     * @return Persona
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get perfil
     *
     * @return string
     */
    public function getPerfil()
    {
        return $this->perfil;
    }
}
