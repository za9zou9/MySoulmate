<?php

namespace CommentaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CommentaireBundle\Entity\User;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="fk_cmt", columns={"id"})})
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCommentaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=10000, nullable=false)
     */
    private $description;

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
     * @var \Stories
     *
     * @ORM\ManyToOne(targetEntity="Stories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idStorie", referencedColumnName="idStorie")
     * })
     */
    private $idStorie;

    /**
     * @return \Stories
     */
    public function getIdStorie()
    {
        return $this->idStorie;
    }

    /**
     * @param \Stories $idStorie
     */
    public function setIdStorie($idStorie)
    {
        $this->idStorie = $idStorie;
    }



    /**
     * @return int
     */
    public function getIdcommentaire()
    {
        return $this->idcommentaire;
    }

    /**
     * @param int $idcommentaire
     */
    public function setIdcommentaire($idcommentaire)
    {
        $this->idcommentaire = $idcommentaire;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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

