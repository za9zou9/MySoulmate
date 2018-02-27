<?php

namespace StoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partcipation
 *
 * @ORM\Table(name="partcipation", indexes={@ORM\Index(name="id", columns={"id"}), @ORM\Index(name="idEvenement", columns={"idEvenement"}), @ORM\Index(name="id_2", columns={"id"}), @ORM\Index(name="idEvenement_2", columns={"idEvenement"})})
 * @ORM\Entity
 */
class Partcipation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="reponse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reponse;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEvenement", referencedColumnName="idEvenement")
     * })
     */
    private $idevenement;


}

