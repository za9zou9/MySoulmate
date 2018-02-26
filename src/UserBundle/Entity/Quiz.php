<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quiz
 *
 * @ORM\Table(name="quiz", indexes={@ORM\Index(name="fk_qz", columns={"id"}), @ORM\Index(name="reponse1", columns={"reponse1"}), @ORM\Index(name="reponse2", columns={"reponse2"}), @ORM\Index(name="idQuiz", columns={"idQuiz"})})
 * @ORM\Entity(repositoryClass="UserBundle\Repository\QuizRepository")
 */
class Quiz
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idQuiz", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idquiz;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse1", type="string", length=100, nullable=false)
     */
    private $reponse1;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse2", type="string", length=100, nullable=false)
     */
    private $reponse2;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse3", type="string", length=100, nullable=false)
     */
    private $reponse3;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse4", type="string", length=100, nullable=false)
     */
    private $reponse4;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse5", type="string", length=100, nullable=false)
     */
    private $reponse5;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse6", type="string", length=100, nullable=false)
     */
    private $reponse6;

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
     * Get idquiz
     *
     * @return integer
     */
    public function getIdquiz()
    {
        return $this->idquiz;
    }

    /**
     * Set reponse1
     *
     * @param string $reponse1
     *
     * @return Quiz
     */
    public function setReponse1($reponse1)
    {
        $this->reponse1 = $reponse1;

        return $this;
    }

    /**
     * Get reponse1
     *
     * @return string
     */
    public function getReponse1()
    {
        return $this->reponse1;
    }

    /**
     * Set reponse2
     *
     * @param string $reponse2
     *
     * @return Quiz
     */
    public function setReponse2($reponse2)
    {
        $this->reponse2 = $reponse2;

        return $this;
    }

    /**
     * Get reponse2
     *
     * @return string
     */
    public function getReponse2()
    {
        return $this->reponse2;
    }

    /**
     * Set reponse3
     *
     * @param string $reponse3
     *
     * @return Quiz
     */
    public function setReponse3($reponse3)
    {
        $this->reponse3 = $reponse3;

        return $this;
    }

    /**
     * Get reponse3
     *
     * @return string
     */
    public function getReponse3()
    {
        return $this->reponse3;
    }

    /**
     * Set id
     *
     * @param \UserBundle\Entity\User $id
     *
     * @return Quiz
     */
    public function setId($id )
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \UserBundle\Entity\User
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getReponse4()
    {
        return $this->reponse4;
    }

    /**
     * @param string $reponse4
     */
    public function setReponse4($reponse4)
    {
        $this->reponse4 = $reponse4;
    }

    /**
     * @return string
     */
    public function getReponse5()
    {
        return $this->reponse5;
    }

    /**
     * @param string $reponse5
     */
    public function setReponse5($reponse5)
    {
        $this->reponse5 = $reponse5;
    }

    /**
     * @return string
     */
    public function getReponse6()
    {
        return $this->reponse6;
    }

    /**
     * @param string $reponse6
     */
    public function setReponse6($reponse6)
    {
        $this->reponse6 = $reponse6;
    }

}
