<?php
/**
 * Created by PhpStorm.
 * User: Semer
 * Date: 21/02/2018
 * Time: 18:10
 */

namespace StoryBundle\repository;


use Doctrine\ORM\EntityRepository;

class StoryRepository extends EntityRepository
{




    public function rechercheTitre($titre)
    {

        $query=$this->getEntityManager()
            ->createQuery("SELECT p FROM StoryBundle:Stories p WHERE p.titre =:titre");
        $query->setParameter(':titre',$titre);

        return $query->execute();
    }

}