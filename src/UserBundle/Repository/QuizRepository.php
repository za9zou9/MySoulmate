<?php






namespace UserBundle\Repository;
use Doctrine\ORM\EntityRepository;


class QuizRepository extends EntityRepository
{


    public function updateIdQuiz($idQuiz , $id)
    {

        $query=$this->getEntityManager()
            ->createQuery("UPDATE UserBundle:User  a SET a.idquiz=:idquiz WHERE a.id=:id")
            ->setParameter('id',$id)
            ->setParameter('idquiz',$idQuiz);
        return $query->execute();
    }

    public function rechercheNotNull(){

        $query=$this->getEntityManager()
            ->createQuery("SELECT user from UserBundle:user user WHERE 

                                 user.idquiz IS NOT NULL ");

        return $query->execute();

    }



    public function rechercheQ1($id){

        $query=$this->getEntityManager()
            ->createQuery("SELECT quiz from UserBundle:Quiz quiz WHERE 

                                 quiz.id!=:id ")
        ->setParameter('id',$id);

        return $query->execute();

    }


    public function rechercheQuizConnecte($id){

        $query=$this->getEntityManager()
            ->createQuery("SELECT quiz from UserBundle:Quiz quiz WHERE 

                                 quiz.id=:id ")
            ->setParameter('id',$id);

        return $query->execute();

    }




}