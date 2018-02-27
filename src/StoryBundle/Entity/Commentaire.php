<?php

namespace StoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="fk_cmt", columns={"id"}), @ORM\Index(name="idStorie", columns={"idStorie"})})
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
    private $idstorie;


}

