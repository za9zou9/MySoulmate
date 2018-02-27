<?php

namespace StoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ligne
 *
 * @ORM\Table(name="ligne", indexes={@ORM\Index(name="idProduit", columns={"idProduit"}), @ORM\Index(name="idPack", columns={"idPack"})})
 * @ORM\Entity
 */
class Ligne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idLigne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idligne;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProduit", referencedColumnName="idProduit")
     * })
     */
    private $idproduit;

    /**
     * @var \Pack
     *
     * @ORM\ManyToOne(targetEntity="Pack")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPack", referencedColumnName="idPack")
     * })
     */
    private $idpack;


}

