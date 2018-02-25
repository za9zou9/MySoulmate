<?php

namespace EvenementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partcipation
 *
 * @ORM\Table(name="partcipation", indexes={@ORM\Index(name="id", columns={"id"}), @ORM\Index(name="idEvenement", columns={"idEvenement"})})
 * @ORM\Entity(repositoryClass="EvenementBundle\Repository\EventSearch")
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
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEvenement", referencedColumnName="idEvenement")
     * })
     */
    private $idevenement;

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
     * @return int
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * @param int $reponse
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }

    /**
     * @return \Evenement
     */
    public function getIdevenement()
    {
        return $this->idevenement;
    }

    /**
     * @param \Evenement $idevenement
     */
    public function setIdevenement($idevenement)
    {
        $this->idevenement = $idevenement;
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

