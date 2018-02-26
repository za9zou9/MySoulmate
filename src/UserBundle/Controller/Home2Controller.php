<?php
/**
 * Created by PhpStorm.
 * User: Asus-PC
 * Date: 08/02/2018
 * Time: 18:21
 */

namespace UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class Home2Controller extends Controller
{



    public function home2Action()
    {
        return $this->render('UserBundle:FrontOffice:home2.html.twig');
    }






}