<?php

namespace EvenementBundle\Controller;


use EvenementBundle\Entity\Evenement;
use EvenementBundle\Entity\Mail;
use EvenementBundle\Entity\Partcipation;
use EvenementBundle\Entity\User;
use EvenementBundle\Form\AjoutAdminType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Swift_Message;
use Symfony\Component\Validator\Constraints\DateTime;


class EventsController extends Controller
{




    public function deleteAction($idevenement)
    {

        $em=$this->getDoctrine()->getManager();
        $evenement=$em->getRepository(Evenement::class)->find($idevenement);
        $em->remove($evenement);
        $em->flush();
        return $this->redirectToRoute('reade');



    }


    public function readAction(Request $request)
    {

        $user = $this->getUser();
        $x=$user->getId();
        $em=$this->getDoctrine()->getManager();
        $liste=$em->getRepository(Evenement::class)->AVenirDql();



        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $liste, /* query NOT result */
            $request->query->getInt('page', 1),
        $request->query->getInt('limit',4 )
        );


        $lieu = $request->get('lieu');
        $date= $request->get('date');
        if ($request->isXmlHttpRequest()) {


            $event = $em->getRepository("EvenementBundle:Evenement")->findByLieuDql($lieu);
            $serializer = new Serializer((array(new ObjectNormalizer())));
            $data = $serializer->normalize($event);
            return new JsonResponse($data);
        }

            if ($request->isXmlHttpRequest()) {


            $venment = $em->getRepository("EvenementBundle:Evenement")->findByDateDql($date);
            $serializer=new Serializer((array(new ObjectNormalizer())));
            $data=$serializer->normalize($venment);
                return new JsonResponse($data);

        }


        return $this->render('@Evenement/Events.html.twig', array(
            'listes'=>$pagination,
        ));



    }

    public function readeAction()
    {
        $em=$this->getDoctrine()->getManager();
        $liste=$em->getRepository(Evenement::class)->findAll();


        return $this->render('EvenementBundle::AdminUpdate.html.twig', array(
            'listes'=>$liste
        ));



    }

    public function readeeAction($idevenement)
    {
        $em=$this->getDoctrine()->getManager();
        $lista=$em->getRepository(Partcipation::class)->SearchPart($idevenement);



        return $this->render('EvenementBundle::participants.html.twig', array(
            'listas'=>$lista
        ));



    }

    public function confirmerAction($idevenement)
    {
        $em=$this->getDoctrine()->getManager();

        $user = $this->getUser();
        $x=$user->getId();
        $howa=$em->getRepository(Evenement::class)->find($idevenement);


        return $this->render('@Evenement/confirmation.html.twig', array(
            'howas'=>$howa
        ));



    }







    public function participerAction(Request $request,$idevenement)
    {

        $user = $this->getUser();
        $x=$user->getId();

        $em = $this->getDoctrine()->getManager();
        $liste=$em->getRepository(Evenement::class)->AVenirDql();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $liste, /* query NOT result */
            $request->query->getInt('page', 1),
            $request->query->getInt('limit',4 )
        );


        $ibra=$em->getRepository(Partcipation::class)->testerdoublon($x,$idevenement);
        if ($ibra==null) {
            echo "<script> alert('Participation Enregistrée');</script>";

            $moi = $em->getRepository(User::class)->find($x);
            $harba = $em->getRepository(Evenement::class)->find($idevenement);
            $participation = new Partcipation();
            $participation->setId($moi);
            $participation->setIdevenement($harba);


            $em->persist($participation);
            $em->flush();

            return $this->render('EvenementBundle::Events.html.twig', array(
                'listes'=>$pagination
            ));
        }

    else {
        echo "<script> alert('Vous participez déja à cet Evènement');</script>";


        return $this->render('EvenementBundle::Events.html.twig', array(
            'listes' => $pagination
        ));
    }
    }




    public function creAction(Request $request)
    { $em=$this->getDoctrine()->getManager();
        $users=$em->getRepository(User::class)->findAll();
        $evenements=new Evenement();
        $form=$this->createForm(AjoutAdminType::class,$evenements);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()){
            $evenements->setImage($request->get('image'));
            $param1=$evenements->getDate();

            $result = $param1->format('d-m-Y');
            $param2=$evenements->getLieu();
            $param3=$evenements->getDescription();
            $em->persist($evenements);
            $em->flush();

            foreach($users as $user)
            {$etat=$user->getEtat();
                $email=$user->getEmail();

            if($etat=='celib')
            {
                $message = \Swift_Message::newInstance()->setSubject('Nouvel Evenement')->setFrom('mysoulmate.freeminds@gmail.com')->setTo($email)->setBody('Nous vous informons qu un nouvel évènement est lancé, il se déroulera le '.$result.' à '.$param2.', Sa description est la suivante: '.$param3);

                $this->get('mailer')->send($message);}
            }
            $this->redirectToRoute('cre');
        }


        return $this->render('@Evenement/adminEvents.html.twig', array(
            'form'=>$form->createView()
        ));
    }






    public function updateAction(Request $request,$idevenement){

        $em=$this->getDoctrine()->getManager();
        $evenement=$em->getRepository(Evenement::class)->find($idevenement);

        $form=$this->createForm(AjoutAdminType::class,$evenement);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted())
        {
            $em->flush();
            return $this->redirectToRoute('reade');
        }
        return $this->render('@Evenement/modif.html.twig', array(
            'form'=>$form->createView()
        ));
    }








}
