<?php

namespace CommentaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CommentaireBundle:Default:index.html.twig');
    }
}
