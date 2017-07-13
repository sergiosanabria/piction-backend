<?php
// src/AppBundle/Entity/User.php

namespace UsuarioBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Exclude;

/**
 * @ORM\Entity()
 * @ORM\Entity(repositoryClass="UsuarioBundle\Entity\UsuarioRepository")
 * @UniqueEntity("email",errorPath="email",groups={"Registracion"})
 * @UniqueEntity("username",errorPath="username",groups={"Registracion"})
 * @ORM\Table(name="fos_user")
 */
class Usuario extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var $persona
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Persona", mappedBy="usuario",cascade={"persist","remove"}))
     */
    protected $persona;

    private $solicito;

    private $envio;

    private $aceptado;


    /**
     * @exclude()
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\SolicitudAmistad" ,mappedBy="usuarioSolicita" ,cascade={"persist","remove"})
     */
    private $solicitudesAmistad;

    /**
     * @return mixed
     */
    public function getAceptado()
    {
        return $this->aceptado;
    }

    /**
     * @param mixed $aceptado
     */
    public function setAceptado($aceptado)
    {
        $this->aceptado = $aceptado;
    }




    /**
     * @return mixed
     */
    public function getSolicito()
    {
        return $this->solicito;
    }

    /**
     * @param mixed $solicito
     */
    public function setSolicito($solicito)
    {
        $this->solicito = $solicito;
    }

    /**
     * @return mixed
     */
    public function getEnvio()
    {
        return $this->envio;
    }

    /**
     * @param mixed $envio
     */
    public function setEnvio($envio)
    {
        $this->envio = $envio;
    }




    public function solicitoAmistad($usuario, $set = false)
    {
        if ($this->solicitudesRecibidas && !$this->getSolicitudesRecibidas()->isEmpty()) {
            foreach ($this->solicitudesRecibidas as $u) {
                if ($u == $usuario) {

                    if ($set){
                        $this->setSolicito(true);

                        return $this;
                    }

                    return true;
                }
            }
        }

        return false;
    }

    public function soliciteAmistad($usuario, $set = false)
    {
        if (count($this->solicitudesEnviadas)) {
            foreach ($this->solicitudesEnviadas as $u) {
                if ($u == $usuario) {

                    if ($set){
                        $this->setEnvio(true);

                        return $this;
                    }

                    return true;
                }
            }
        }

        return false;
    }




    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set persona
     *
     * @param \AppBundle\Entity\Persona $persona
     *
     * @return Usuario
     */
    public function setPersona(\AppBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \AppBundle\Entity\Persona
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Add solicitudesAmistad
     *
     * @param \AppBundle\Entity\SolicitudAmistad $solicitudesAmistad
     *
     * @return Usuario
     */
    public function addSolicitudesAmistad(\AppBundle\Entity\SolicitudAmistad $solicitudesAmistad)
    {
        $this->solicitudesAmistad[] = $solicitudesAmistad;

        return $this;
    }

    /**
     * Remove solicitudesAmistad
     *
     * @param \AppBundle\Entity\SolicitudAmistad $solicitudesAmistad
     */
    public function removeSolicitudesAmistad(\AppBundle\Entity\SolicitudAmistad $solicitudesAmistad)
    {
        $this->solicitudesAmistad->removeElement($solicitudesAmistad);
    }

    /**
     * Get solicitudesAmistad
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSolicitudesAmistad()
    {
        return $this->solicitudesAmistad;
    }
}
