<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="fk_ticket_Agente1_idx", columns={"Agente_id"}), @ORM\Index(name="fk_ticket_Requerimiento1_idx", columns={"Requerimiento_id"}), @ORM\Index(name="fk_ticket_Tipo1_idx", columns={"Tipo_id"})})
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1024, nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="apertura", type="datetime", nullable=true)
     */
    private $apertura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cierre", type="datetime", nullable=true)
     */
    private $cierre;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=45, nullable=true)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Tipo
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Tipo_id", referencedColumnName="id")
     * })
     */
    private $tipo;

    /**
     * @var \AppBundle\Entity\Requerimiento
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Requerimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Requerimiento_id", referencedColumnName="id")
     * })
     */
    private $requerimiento;

    /**
     * @var \AppBundle\Entity\Agente
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Agente_id", referencedColumnName="id")
     * })
     */
    private $agente;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Ticket
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
     * Set apertura
     *
     * @param \DateTime $apertura
     *
     * @return Ticket
     */
    public function setApertura($apertura)
    {
        $this->apertura = $apertura;

        return $this;
    }

    /**
     * Get apertura
     *
     * @return \DateTime
     */
    public function getApertura()
    {
        return $this->apertura;
    }

    /**
     * Set cierre
     *
     * @param \DateTime $cierre
     *
     * @return Ticket
     */
    public function setCierre($cierre)
    {
        $this->cierre = $cierre;

        return $this;
    }

    /**
     * Get cierre
     *
     * @return \DateTime
     */
    public function getCierre()
    {
        return $this->cierre;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Ticket
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipo
     *
     * @param \AppBundle\Entity\Tipo $tipo
     *
     * @return Ticket
     */
    public function setTipo(\AppBundle\Entity\Tipo $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \AppBundle\Entity\Tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set requerimiento
     *
     * @param \AppBundle\Entity\Requerimiento $requerimiento
     *
     * @return Ticket
     */
    public function setRequerimiento(\AppBundle\Entity\Requerimiento $requerimiento = null)
    {
        $this->requerimiento = $requerimiento;

        return $this;
    }

    /**
     * Get requerimiento
     *
     * @return \AppBundle\Entity\Requerimiento
     */
    public function getRequerimiento()
    {
        return $this->requerimiento;
    }

    /**
     * Set agente
     *
     * @param \AppBundle\Entity\Agente $agente
     *
     * @return Ticket
     */
    public function setAgente(\AppBundle\Entity\Agente $agente = null)
    {
        $this->agente = $agente;

        return $this;
    }

    /**
     * Get agente
     *
     * @return \AppBundle\Entity\Agente
     */
    public function getAgente()
    {
        return $this->agente;
    }
}
