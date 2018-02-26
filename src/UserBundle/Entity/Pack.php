<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pack
 *
 * @ORM\Table(name="pack", indexes={@ORM\Index(name="idPack", columns={"idPack"})})
 * @ORM\Entity(repositoryClass="UserBundle\Repository\PackRepository")
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
     * @ORM\Column(name="lat", type="string", length=100, nullable=false)
     */
    private $lat;





    /**
     * @var string
     *
     * @ORM\Column(name="lon", type="string", length=100, nullable=false)
     */
    private $long;



    /**
     * Set prixpack
     *
     * @param integer $prixpack
     *
     * @return Pack
     */
    public function setPrixpack($prixpack)
    {
        $this->prixpack = $prixpack;

        return $this;
    }

    /**
     * Get prixpack
     *
     * @return integer
     */
    public function getPrixpack()
    {
        return $this->prixpack;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Pack
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get idpack
     *
     * @return integer
     */
    public function getIdpack()
    {
        return $this->idpack;
    }

    /**
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return string
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param string $long
     */
    public function setLong($long)
    {
        $this->long = $long;
    }


}
