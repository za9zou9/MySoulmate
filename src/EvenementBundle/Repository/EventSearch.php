<?php
/**
 * Created by PhpStorm.
 * User: skan
 * Date: 11/02/2018
 * Time: 15:29
 */

namespace EvenementBundle\Repository;


class EventSearch extends \Doctrine\ORM\EntityRepository
{
    public function findByLieuDqlLike($lieu)
    {
        $qd=$this->getEntityManager()
            ->createQuery("SELECT v FROM EvenementBundle:Evenement v WHERE v.lieu like :lieu")
            ->setParameter(':lieu',$lieu);
        return $qd->getResult();
    }

    public function findByLieuDql($lieu)
    {
        $qd=$this->getEntityManager()
            ->createQuery("SELECT v FROM EvenementBundle:Evenement v WHERE v.lieu=:lieu ")
            ->setParameter('lieu',$lieu);
        return $qd->getResult();
    }
    public function testerdoublon($id,$idevenement)
    {

        $query=$this->getEntityManager()

            ->createQuery("SELECT v FROM EvenementBundle:Partcipation v WHERE v.id=:id AND v.idevenement=:idevenement");

        $query->setParameter('id',$id);
        $query->setParameter('idevenement',$idevenement);

        return $query->execute();
    }

    public function SearchPart($idevenement)
    {

        $query=$this->getEntityManager()

            ->createQuery("SELECT v FROM EvenementBundle:Partcipation v WHERE v.idevenement=:idevenement");


        $query->setParameter('idevenement',$idevenement);

        return $query->execute();
    }


    public function DeleteByDateDql()
    {
        $qd=$this->getEntityManager()
            ->createQuery("DELETE FROM EvenementBundle:Evenement v WHERE v.date<CURRENT_DATE() ");

        return $qd->execute();
    }

    public function AVenirDql()
    {
        $qd=$this->getEntityManager()
            ->createQuery("SELECT v FROM EvenementBundle:Evenement v WHERE v.date>CURRENT_DATE() ");

        return $qd->execute();
    }


}