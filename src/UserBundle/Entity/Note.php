<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note", indexes={@ORM\Index(name="id", columns={"id"}), @ORM\Index(name="idSrorie", columns={"idSrorie"})})
 * @ORM\Entity
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idNote", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnote;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrNote", type="integer", nullable=false)
     */
    private $nbrnote;

    /**
     * @var \Stories
     *
     * @ORM\ManyToOne(targetEntity="Stories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSrorie", referencedColumnName="idStorie")
     * })
     */
    private $idsrorie;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}

