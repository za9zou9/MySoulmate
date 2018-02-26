<?php
/**
 * Created by PhpStorm.
 * User: Asus-PC
 * Date: 21/02/2018
 * Time: 19:20
 */

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\Mesamis;
use UserBundle\Entity\Mespack;
use Symfony\Component\HttpFoundation\Request;





class amisController extends Controller
{

    public function ajouterMesAmisAction($idAmiis,Request $request){

        $em = $this->getDoctrine()->getManager();

        $MonAmi = new Mesamis();



        $user=$this->getUser();
        $id=$user->getId();

        $MonAmi->setId($id);
        $MonAmi->setIdMesAmis($idAmiis);
        if ($request->isMethod('POST')) {

            $em->persist($MonAmi);
            $em->flush();

        }
        return $this->redirectToRoute('profile');
    }


    public function afficherMesAmisAction(){


        $em = $this->getDoctrine()->getManager();

        $user=$this->getUser();
        $id=$user->getId();





        $MesAmis=$em->getRepository("UserBundle:Mesamis")->afficherMesAmis($id);
var_dump($MesAmis);
        $tab = array();

        foreach ($MesAmis as $tableau){


            $MesAmis2=$em->getRepository("UserBundle:User")->find($tableau->getIdmesamis());

            array_push($tab,$MesAmis2);

        }

        return $this->render('UserBundle:FrontOffice:MesAmis.html.twig',array("Profil"=>$tab));
    }


    public function SupprimerAction($id){

        $em=$this->getDoctrine()->getManager();

        $em->getRepository("UserBundle:Mesamis")->supprimer2($id);


        return $this->redirectToRoute('profile');

    }


}