<?php
/**
 * Created by PhpStorm.
 * User: Asus-PC
 * Date: 21/02/2018
 * Time: 21:12
 */

namespace UserBundle\Repository;


use Doctrine\ORM\EntityRepository;

class amisRepository extends EntityRepository
{
    public function supprimer2($id)
    {
        $query=$this->getEntityManager()
            ->createQuery("DELETE  FROM UserBundle:Mesamis amis WHERE amis.idmesamis=:id")
            ->setParameter('id',$id);

        return $query->execute();
    }


    public function afficherMesAmis($id)
    {

        $query=$this->getEntityManager()
            ->createQuery("SELECT amis
                                FROM UserBundle:User as u
                                INNER JOIN UserBundle:Mesamis AS amis
                                WITH (u.id) = (amis.id)
                                Where (amis.id) =:id");

        $query->setParameter('id',$id);

        return $query->execute();
    }


}