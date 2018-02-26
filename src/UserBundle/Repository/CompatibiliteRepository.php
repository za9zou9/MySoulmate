<?php
/**
 * Created by PhpStorm.
 * User: Semer
 * Date: 10/02/2018
 * Time: 18:52
 */

namespace UserBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CompatibiliteRepository extends EntityRepository
{



    public function rechercheNotNull(){

        $query=$this->getEntityManager()
            ->createQuery("SELECT  from UserBundle:user user WHERE 

                                 user.idQuiz IS NOT NULL ");

        return $query->execute();

    }



    public function RechercheQ1 (){

        $query=$this->getEntityManager()
            ->createQuery("SELECT user.username,quiz.reponse1
                                FROM UserBundle:user AS user 
                                INNER JOIN UserBundle:quiz AS quiz
                                Where (user.idquiz)=quiz.idquiz ");


        return $query->execute();

    }



}