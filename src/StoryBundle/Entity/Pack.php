<?php

namespace StoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pack
 *
 * @ORM\Table(name="pack", indexes={@ORM\Index(name="idPack", columns={"idPack"})})
 * @ORM\Entity
 */
class Pack
{
    /**
     * @var integer
     *
     * @ORM\Column(name="prixPack", type="integer", nullable=false)
     */
    private $prixpack;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="idPack", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpack;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=100, nullable=true)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lon", type="string", length=100, nullable=true)
     */
    private $lon;


}

