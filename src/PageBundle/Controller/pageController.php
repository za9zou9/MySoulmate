<?php

namespace PageBundle\Controller;

use PageBundle\Entity\Stories;
use PageBundle\Entity\User;
use PageBundle\Form\AjoutType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class pageController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }


    public function createAction(Request $request)
    {

        return $this->render('@Page/create.html.twig',array());
    }


}
