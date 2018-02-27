<?php

namespace StoryBundle\Controller;

use StoryBundle\Entity\User;
use StoryBundle\Form\AjoutType;
use StoryBundle\Form\hhh;
use StoryBundle\Form\ModifierForm;
use StoryBundle\StoryBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use StoryBundle\Entity\Stories;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class storiesController extends Controller
{

    public function readAction(Request $request)
    { $user=$this->getUser();
        $id=$user->getId();


        $em=$this->getDoctrine()->getManager();
        $moi=$em->getRepository(User::class)->find($id);

        $story=$em->getRepository(Stories::class)->findAll();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $story, /* query NOT result */
            $request->query->getInt('page', 1),
            $request->query->getInt('limit',2 )
        );
        return $this->render('StoryBundle::Menu1.html.twig', array(
            'stories'=>$pagination,'users'=>$moi
        ));

    }



    public function createAction(Request $request)
    {
        $user=$this->getUser();
        $id=$user->getId();
        $em=$this->getDoctrine()->getManager();
        $moi=$em->getRepository(User::class)->find($id);


        $stories=new Stories();


        $form=$this->createForm(hhh::class,$stories);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()){
            $stories->setId($moi);
            $stories->setImage($request->get('image'));
            $em->persist($stories);
            $em->flush();

        }
        return $this->render('@Story/create.html.twig', array(
            'form'=>$form->createView()
        ));
    }



    public function deleteAction($idstorie) {
        $user=$this->getUser();
        $id=$user->getId();

        $em=$this->getDoctrine()->getManager();
        $moi=$em->getRepository(User::class)->find($id);
        $stories=$em->getRepository(Stories::class)->findAll();

        $story=$em->getRepository(Stories::class)->find($idstorie);
        $em->remove($story);
        $em->flush();
        return $this->redirectToRoute('afficher');


    }
    public function modifierAction($idstorie, Request $request) {
        $em = $this->getDoctrine()->getManager();


        $story = $em->getRepository("StoryBundle:Stories")->find($idstorie);
        $Form = $this->createForm(ModifierForm::class,$story);
        $Form->handleRequest($request);


        if ($Form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($story);
            $em->flush();
            return  $this->redirectToRoute('afficher');

        }

        return $this->render('StoryBundle:Default:modifier.html.twig',array('form'=>$Form->createView()));

    }


    public function rechercheAction(Request $request)
    { $em=$this->getDoctrine()->getManager();

        $Story = $em->getRepository("StoryBundle:Stories")->findAll();


        if ($request->isXmlHttpRequest()) {
            $titre = $request->get('titre');
            $em = $this->getDoctrine()->getManager();
            $st = $em->getRepository("StoryBundle:Stories")->rechercheTitre($titre);
            $serializer = new Serializer((array(new ObjectNormalizer())));
            $data = $serializer->normalize($st);

            return new JsonResponse($data);

        }
        return $this->render('StoryBundle::Menu1.html.twig',array("stories"=>$Story));

    }




}
