<?php
/**
 * Created by PhpStorm.
 * User: Asus-PC
 * Date: 05/02/2018
 * Time: 23:05
 */

namespace UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class frontController extends Controller
{
    public function signUpAction()
    {
        return $this->render('UserBundle:FrontOffice:register.html.twig');
    }
}