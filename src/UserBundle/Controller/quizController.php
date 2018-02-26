<?php
/**
 * Created by PhpStorm.
 * User: Asus-PC
 * Date: 07/02/2018
 * Time: 02:20
 */

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\Quiz;



class quizController extends Controller
{




    public function ajouterQuizAction(Request $request)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();


        $quiz=new Quiz();
        $em = $this->getDoctrine()->getManager();

        if($request->isMethod('POST'))
        {
            $quiz->setReponse1($request->get('reponse1'));
            $quiz->setReponse2($request->get('reponse2'));
            $quiz->setReponse3($request->get('reponse3'));
            $quiz->setId($user);
            $em->persist($quiz);
            $em->flush();


        }



        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'))
        {

            return $this->redirectToRoute("fos_user_security_login");
        }

        else
        {
            return $this->render('UserBundle:FrontOffice:quiz.html.twig',array());

        }


        return $this->render('UserBundle:FrontOffice:quiz.html.twig',array());

    }







}