<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\Quiz;
use UserBundle\Entity\User;
use UserBundle\UserBundle;

class CompatibiliteController extends Controller
{
    public function profileAction()
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();

        // Profil1 = les user eli 3andhom Quiz

        $Profil1 = $em->getRepository("UserBundle:User")->rechercheNotNull();


        $id = $this->getUser();

        //Quiz = Quiz mta3 l membre eli connecté

        $Quiz = $em->getRepository("UserBundle:Quiz")->find($id->getIdquiz());




        $tab = array();


        if ($Profil1 != null) {

// Quiz2 = les Quiz mta3 laabed lkol sauf sayed eli connecté

            $Quiz2 = $em->getRepository("UserBundle:Quiz")->rechercheQ1(1);


            $tab = array();




$size = sizeof($Quiz2);
            for($i=0;$i<$size;$i++){

                $nb = 0;

                if ($Quiz2[$i]->getReponse1() != $Quiz->getReponse1()) {

                    $nb = $nb + 1;


                    if ($Quiz2[$i]->getReponse2() == $Quiz->getReponse2()) {

                        $nb = $nb + 1;

                    }
                    if ($Quiz2[$i]->getReponse3() == $Quiz->getReponse3()) {

                        $nb = $nb + 1;

                    }
                    if ($Quiz2[$i]->getReponse4() == $Quiz->getReponse4()) {

                        $nb = $nb + 1;

                    }
                    if ($Quiz2[$i]->getReponse5() == $Quiz->getReponse5()) {

                        $nb = $nb + 1;

                    }
                    if ($Quiz2[$i]->getReponse6() == $Quiz->getReponse6()) {

                        $nb = $nb + 1;

                    }


                    if ($nb > 0) {


                        $Profil2 = $em->getRepository("UserBundle:User")->findBy(array('id' => $Quiz2[$i]->getId()));
                      foreach ($Profil2 as $tableau){

                      array_push($tab,$tableau);



                      }


                    }


                }

            }

            return $this->render('UserBundle:FrontOffice:Profile.html.twig', array("Profil" => $tab));

        }
        return $this->render('UserBundle:FrontOffice:Profile.html.twig', array("Profil" => $tab));
    }

}
