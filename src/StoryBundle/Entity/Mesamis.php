<?php

namespace StoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesamis
 *
 * @ORM\Table(name="mesamis", indexes={@ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Mesamis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAmis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idamis;

    /**
     * @var integer
     *
     * @ORM\Column(name="idMesAmis", type="integer", nullable=false)
     */
    private $idmesamis;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;


}

