<?php

namespace StoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamations
 *
 * @ORM\Table(name="reclamations", indexes={@ORM\Index(name="fk_rec", columns={"id"})})
 * @ORM\Entity
 */
class Reclamations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idReclamation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreclamation;

    /**
     * @var integer
     *
     * @ORM\Column(name="sujet", type="integer", nullable=false)
     */
    private $sujet;

    /**
     * @var integer
     *
     * @ORM\Column(name="message", type="integer", nullable=false)
     */
    private $message;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}

