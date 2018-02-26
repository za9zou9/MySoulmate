<?php
/**
 * Created by PhpStorm.
 * User: Asus-PC
 * Date: 14/02/2018
 * Time: 17:18
 */

namespace UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Pack;
use UserBundle\Entity\Produit;
use UserBundle\Form\PackForm;


class backController extends Controller
{


    public function indexBackAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();


        $salle = $em->getRepository("UserBundle:Produit")->selectProduit("salle");
        var_dump($salle);
        $musique = $em->getRepository("UserBundle:Produit")->selectProduit("musique");
        $fleurs = $em->getRepository("UserBundle:Produit")->selectProduit("fleurs");


        $form=$this->createForm(PackForm::class,$fleurs);

        $form->handleRequest($request);

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
        {

            return $this->redirectToRoute("fos_user_security_login");
        }

        else
        {

            return $this->render('UserBundle:BackOffice:Index.html.twig',array('form'=>$form->createView(),"salle"=>$salle,"musique"=>$musique,"fleurs"=>$fleurs));

        }





    }






}