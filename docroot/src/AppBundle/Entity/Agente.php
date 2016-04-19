<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agente
 *
 * @ORM\Table(name="Agente")
 * @ORM\Entity
 */
class Agente
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_completo", type="string", length=45, nullable=false)
     */
    private $nombreCompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=45, nullable=false)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="anexo", type="string", length=45, nullable=true)
     */
    private $anexo;

    /**
     * @var string
     *
     * @ORM\Column(name="Avatar", type="string", length=45, nullable=true)
     */
    private $avatar;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set nombreCompleto
     *
     * @param string $nombreCompleto
     *
     * @return Agente
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    /**
     * Get nombreCompleto
     *
     * @return string
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Agente
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set anexo
     *
     * @param string $anexo
     *
     * @return Agente
     */
    public function setAnexo($anexo)
    {
        $this->anexo = $anexo;

        return $this;
    }

    /**
     * Get anexo
     *
     * @return string
     */
    public function getAnexo()
    {
        return $this->anexo;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Agente
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
