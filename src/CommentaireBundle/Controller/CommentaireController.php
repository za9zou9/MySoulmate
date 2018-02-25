<?php

namespace CommentaireBundle\Controller;

use CommentaireBundle\Entity\Commentaire;
use CommentaireBundle\Entity\Stories;
use CommentaireBundle\Form\AjoutType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use CommentaireBundle\Repository\CommRpository;
use CommentaireBundle\Entity\User;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class CommentaireController extends Controller
{






    public function createAction(Request $request)
    {
        $user = $this->getUser();
        $x=$user->getId();

        $commentaires=new Commentaire();
        $em=$this->getDoctrine()->getManager();
        $moi=$em->getRepository(User::class)->find($x);
        $form=$this->createForm(AjoutType::class,$commentaires);
        $story=$em->getRepository(Stories::class)->find(1);

        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()){
$commentaires->setIdStorie($story);
            $commentaires->setId($moi);
            $em->persist($commentaires);
            $em->flush();




        }
        $coms=$em->getRepository(Commentaire::class)->findAll();

        return $this->render('CommentaireBundle::AjoutComm.html.twig', array(
            'form'=>$form->createView(), 'commentaires'=>$coms,'utilisateur'=>$moi,'story'=>$story
        ));
    }


    public function deleteAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $commentaire=$em->getRepository(Commentaire::class)->find($id);
        $em->remove($commentaire);
        $em->flush();
        return $this->redirectToRoute('create');



    }





    public function readAction(Request $request)
    { $em=$this->getDoctrine()->getManager();
        $user = $this->getUser();
        $x=$user->getId();
        $moi=$em->getRepository(User::class)->find($x);
        $commentaires=new Commentaire();
        $form=$this->createForm(AjoutType::class,$commentaires);
        $coms=$em->getRepository(Commentaire::class)->findAll();
        if ($request->isXmlHttpRequest()) {


            $serializer=new Serializer((array(new ObjectNormalizer())));
            $data=$serializer->normalize($coms);

            return new JsonResponse($data);

        }
        return $this->render('CommentaireBundle::AjoutComm.html.twig', array(
            'form'=>$form->createView(), 'commentaires'=>$coms,'utilisateur'=>$moi
        ));
    }



}
