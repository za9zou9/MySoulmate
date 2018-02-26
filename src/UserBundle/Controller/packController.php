<?php
/**
 * Created by PhpStorm.
 * User: Asus-PC
 * Date: 09/02/2018
 * Time: 21:41
 */

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\Ligne;
use UserBundle\Entity\Mespack;
use UserBundle\Entity\Pack;
use UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;



use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class packController extends Controller
{


    public function packChoixAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();




        $Pack = $em->getRepository("UserBundle:Pack")->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $Pack, /* query NOT result */
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 2)
        );
        $min = $request->get('budget');

        if ($request->isXmlHttpRequest()) {

            $em=$this->getDoctrine()->getManager();
            $Pack = $em->getRepository("UserBundle:Pack")->rechercheBudget($min);
            $serializer=new Serializer((array(new ObjectNormalizer())));
            $data=$serializer->normalize($Pack);

            return new JsonResponse($data);


        }

        return $this->render('UserBundle:FrontOffice:pack.html.twig',array("Pack"=>$pagination));




    }




    public function packChoixPaysAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();

        $Pack = $em->getRepository("UserBundle:Pack")->findAll();


        if ($request->isXmlHttpRequest()) {
            $pays = $request->get('pays');
            $em = $this->getDoctrine()->getManager();
            $Pack = $em->getRepository("UserBundle:Pack")->rechercheRegion($pays);
            $serializer = new Serializer((array(new ObjectNormalizer())));
            $data = $serializer->normalize($Pack);

            return new JsonResponse($data);

        }
        return $this->render('UserBundle:FrontOffice:pack.html.twig',array("Pack"=>$Pack));

    }



    public function ajouterMesPackAction($idPack ,Request $request){

        $em = $this->getDoctrine()->getManager();

        $MonPack = new Mespack();

        $Pack2 = $em->getRepository("UserBundle:Pack")->findAll();

        $user=$this->getUser();
        $id=$user->getId();

        $MonPack->setId($id);
        $MonPack->setIdpack($idPack);
        if ($request->isMethod('POST')) {

            $em->persist($MonPack);
            $em->flush();

        }
        return $this->render('UserBundle:FrontOffice:pack.html.twig',array("Pack"=>$Pack2));
    }

    public function afficherMesPackAction(){


        $em = $this->getDoctrine()->getManager();

        $user=$this->getUser();
        $id=$user->getId();



        $MonPack=$em->getRepository("UserBundle:Pack")->afficherMesPack(1);

        return $this->render('UserBundle:FrontOffice:MesPack.html.twig',array("Pack"=>$MonPack));
    }



    public function SupprimerAction($idPack){

        $em=$this->getDoctrine()->getManager();

        $em->getRepository("UserBundle:Mespack")->supprimer2($idPack);

        $MonPack=$em->getRepository("UserBundle:Pack")->afficherMesPack(2);
        return $this->render('UserBundle:FrontOffice:MesPack.html.twig',array("Pack"=>$MonPack));

    }


    public function AjouterPackAction(Request $request){

        $em=$this->getDoctrine()->getManager();
        $pack = new Pack();
        $ligne = new Ligne();



        if ($request->isMethod('POST')){

            $pack->setImage($request->get('image'));
            $pack->setPrixpack($request->get('prix'));

            $em->persist($pack);
            $em->flush();

            $ligne1 = new Ligne();
            $ligne2 = new Ligne();
           $ligne->setIdpack($pack);
           $salle2 = $em->getRepository("UserBundle:Produit")->findOneBy(array('idproduit'=>$request->get('salle')));
           $ligne->setIdproduit($salle2);
            $em->persist($ligne);
            $em->flush();

            $ligne1->setIdpack($pack);
            $musique2 = $em->getRepository("UserBundle:Produit")->findOneBy(array('idproduit'=>$request->get('musique')));
            $ligne1->setIdproduit($musique2);
            $em->persist($ligne1);
            $em->flush();


            $ligne2->setIdpack($pack);
            $fleurs2 = $em->getRepository("UserBundle:Produit")->findOneBy(array('idproduit'=>$request->get('fleurs')));
            $ligne2->setIdproduit($fleurs2);
            $em->persist($ligne2);
            $em->flush();
        }

        return $this->render('UserBundle:FrontOffice:quiz.html.twig',array());

    }



    public function AfficherPackAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();

        $Pack = $em->getRepository("UserBundle:Pack")->findAll();



        return $this->render('UserBundle:BackOffice:afficherPack.html.twig',array("Pack"=>$Pack));

    }


}