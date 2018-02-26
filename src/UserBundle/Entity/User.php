<?php

namespace UserBundle\Entity;


use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="idStorie", columns={"idStorie"}), @ORM\Index(name="idQuiz", columns={"idQuiz"})})
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=50, nullable=true)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100, nullable=false)
     */
    private $mail;


    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=false)
     */
    private $prenom;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeNaissance", type="date", nullable=false)
     */
    private $datedenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=100, nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=100, nullable=false)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=100, nullable=false)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=100, nullable=false)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=100, nullable=false)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=100, nullable=false)
     */
    private $ville;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

    /**
     * @var integer
     *
     * @ORM\Column(name="idStorie", type="integer", nullable=false)
     */
    private $idstorie;

    /**
     * @var integer
     *
     * @ORM\Column(name="idQuiz", type="integer", nullable=false)
     */
    private $idquiz;
}