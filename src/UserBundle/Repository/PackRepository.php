<?php
/**
 * Created by PhpStorm.
 * User: Asus-PC
 * Date: 09/02/2018
 * Time: 22:01
 */

namespace UserBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\BrowserKit\Request;
use UserBundle\Entity\Pack;

class PackRepository extends EntityRepository
{


    public function rechercheBudget($min)
    {

        $query=$this->getEntityManager()
            ->createQuery("SELECT p FROM UserBundle:Pack p WHERE p.prixpack<= ?1");
        $query->setParameter(1,$min);

        return $query->execute();
    }

    public function rechercheExiste($id)
    {

        $query=$this->getEntityManager()
            ->createQuery("SELECT p FROM UserBundle:Commande p WHERE p.idProduit =:id");
        $query->setParameter(':id',$id);

        return $query->execute();
    }


    public function rechercheRegion($pays)
    {

        $query=$this->getEntityManager()
            ->createQuery("SELECT (pack.image),pack.idpack,pack.prixpack
                                FROM UserBundle:Pack AS pack
                                INNER JOIN UserBundle:Ligne AS ligne
                                WITH (pack.idpack) = (ligne.idpack)
                                INNER JOIN UserBundle:Produit AS produit
                                WITH (ligne.idproduit)=(produit.idproduit)
                                Where (produit.region) =:pays")
                            ->setParameter(':pays',$pays);

        return $query->execute();
    }


    public function afficherMesPack($idPack)
    {

        $query=$this->getEntityManager()
            ->createQuery("SELECT (pack.image),pack.idpack,pack.prixpack,pack.lat,pack.long
                                FROM UserBundle:Pack AS pack
                                INNER JOIN UserBundle:Mespack AS mesPack
                                WITH (pack.idpack) = (mesPack.idpack)
                                Where (pack.idpack) =:idPack");

  $query->setParameter('idPack',$idPack);

        return $query->execute();
    }


    public function supprimer2($idPack)
    {
        $query=$this->getEntityManager()
            ->createQuery("DELETE  FROM UserBundle:Mespack pack WHERE pack.idpack=:idPack")
             ->setParameter('idPack',$idPack);

        return $query->execute();
    }


    public function afficherPackUser($id){

        $query=$this->getEntityManager()
            ->createQuery("Select pack  FROM UserBundle:Mespack pack WHERE pack.id=:id")
            ->setParameter('id',$id);

        return $query->execute();


    }


    public function selectProduit($type){

        $query=$this->getEntityManager()
            ->createQuery("Select produit  FROM UserBundle:Produit produit WHERE produit.type=:type and produit.quantite>0")
            ->setParameter('type',$type);

        return $query->execute();


    }

}