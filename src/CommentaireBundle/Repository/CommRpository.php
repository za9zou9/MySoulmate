<?php
/**
 * Created by PhpStorm.
 * User: skan
 * Date: 10/02/2018
 * Time: 17:50
 */

namespace CommentaireBundle\Repository;


class CommRpository extends \Doctrine\ORM\EntityRepository
{
    public function updateIdComm($idComm , $id)
    {

        $query=$this->getEntityManager()
            ->createQuery("UPDATE CommentaireBundle:Commentaire  a SET a.id=:id ")
            ->setParameter('id',$id);

        return $query->execute();
    }

}