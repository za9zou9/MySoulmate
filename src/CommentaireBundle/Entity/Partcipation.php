<?php

namespace CommentaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partcipation
 *
 * @ORM\Table(name="partcipation", indexes={@ORM\Index(name="idEvenement", columns={"idEvenement"}), @ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Partcipation
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="reponse", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reponse;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="idEvenement", type="integer", nullable=false)
     */
    private $idevenement;


}

