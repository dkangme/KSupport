<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ejecuta
 *
 * @ORM\Table(name="Ejecuta", indexes={@ORM\Index(name="fk_Ejecuta_Requerimiento1_idx", columns={"Requerimiento_id"}), @ORM\Index(name="fk_Ejecuta_Agente1_idx", columns={"Agente_id"})})
 * @ORM\Entity
 */
class Ejecuta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var \AppBundle\Entity\Requerimiento
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Requerimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Requerimiento_id", referencedColumnName="id")
     * })
     */
    private $requerimiento;



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
     * Set agente
     *
     * @param \AppBundle\Entity\Agente $agente
     *
     * @return Ejecuta
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

    /**
     * Set requerimiento
     *
     * @param \AppBundle\Entity\Requerimiento $requerimiento
     *
     * @return Ejecuta
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
}
