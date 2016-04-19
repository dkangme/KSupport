<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Requerimiento
 *
 * @ORM\Table(name="Requerimiento", indexes={@ORM\Index(name="fk_Requerimiento_Usuario_idx", columns={"Usuario_id"})})
 * @ORM\Entity
 */
class Requerimiento
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp_apertura", type="datetime", nullable=false)
     */
    private $timestampApertura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp_cierre", type="datetime", nullable=true)
     */
    private $timestampCierre;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=24, nullable=false)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1024, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;



    /**
     * Set timestampApertura
     *
     * @param \DateTime $timestampApertura
     *
     * @return Requerimiento
     */
    public function setTimestampApertura($timestampApertura)
    {
        $this->timestampApertura = $timestampApertura;

        return $this;
    }

    /**
     * Get timestampApertura
     *
     * @return \DateTime
     */
    public function getTimestampApertura()
    {
        return $this->timestampApertura;
    }

    /**
     * Set timestampCierre
     *
     * @param \DateTime $timestampCierre
     *
     * @return Requerimiento
     */
    public function setTimestampCierre($timestampCierre)
    {
        $this->timestampCierre = $timestampCierre;

        return $this;
    }

    /**
     * Get timestampCierre
     *
     * @return \DateTime
     */
    public function getTimestampCierre()
    {
        return $this->timestampCierre;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Requerimiento
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Requerimiento
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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

    /**
     * Set usuario
     *
     * @param \AppBundle\Entity\Usuario $usuario
     *
     * @return Requerimiento
     */
    public function setUsuario(\AppBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \AppBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
