<?php

namespace UserBundle\Entity;

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
     * @ORM\Column(name="image", type="string", length=100, nullable=false)
     */
    private $image;

    /**
     * @var \Commercant
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Commercant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPack", referencedColumnName="idCommercant")
     * })
     */
    private $idpack;


}

