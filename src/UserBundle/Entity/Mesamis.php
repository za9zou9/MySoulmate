<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesamis
 *
 * @ORM\Table(name="mesamis", indexes={@ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity(repositoryClass="UserBundle\Repository\amisRepository")
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

    /**
     * @return int
     */
    public function getIdamis()
    {
        return $this->idamis;
    }

    /**
     * @param int $idamis
     */
    public function setIdamis($idamis)
    {
        $this->idamis = $idamis;
    }

    /**
     * @return int
     */
    public function getIdmesamis()
    {
        return $this->idmesamis;
    }

    /**
     * @param int $idmesamis
     */
    public function setIdmesamis($idmesamis)
    {
        $this->idmesamis = $idmesamis;
    }

    /**
     * @return \User
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \User $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}

