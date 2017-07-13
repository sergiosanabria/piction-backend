<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Docente
 *
 * @ORM\Table(name="docente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DocenteRepository")
 */
class Docente extends Persona
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
     *
     * @var String $propDocente
     *
     * @ORM\Column(type="string" , length=50, nullable=true)
     */
    private $propDocente;

    public function isDocente()
    {

         return true;
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
     * Set propDocente
     *
     * @param string $propDocente
     *
     * @return Docente
     */
    public function setPropDocente($propDocente)
    {
        $this->propDocente = $propDocente;

        return $this;
    }

    /**
     * Get propDocente
     *
     * @return string
     */
    public function getPropDocente()
    {
        return $this->propDocente;
    }
}
