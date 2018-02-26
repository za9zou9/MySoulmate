<?php

namespace UserBundle\Entity;

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



    /**
     * Get idligne
     *
     * @return integer
     */
    public function getIdligne()
    {
        return $this->idligne;
    }

    /**
     * Set idproduit
     *
     * @param \UserBundle\Entity\Produit $idproduit
     *
     * @return Ligne
     */
    public function setIdproduit( $idproduit )
    {
        $this->idproduit = $idproduit;

        return $this;
    }

    /**
     * Get idproduit
     *
     * @return \UserBundle\Entity\Produit
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Set idpack
     *
     * @param \UserBundle\Entity\Pack $idpack
     *
     * @return Ligne
     */
    public function setIdpack($idpack )
    {
        $this->idpack = $idpack;

        return $this;
    }

    /**
     * Get idpack
     *
     * @return \UserBundle\Entity\Pack
     */
    public function getIdpack()
    {
        return $this->idpack;
    }
}
