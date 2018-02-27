<?php

namespace StoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mespack
 *
 * @ORM\Table(name="mespack", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Mespack
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPack", type="integer", nullable=false)
     */
    private $idpack;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="idMesPack", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmespack;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=100, nullable=false)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="long", type="string", length=100, nullable=false)
     */
    private $long;


}

