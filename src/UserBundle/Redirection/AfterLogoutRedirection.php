<?php
/**
 * Created by PhpStorm.
 * User: Oussama Shili
 * Date: 18/03/2017
 * Time: 15:30
 */

namespace Home\UserBundle\Redirection;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class AfterLogoutRedirection implements LogoutSuccessHandlerInterface
{

    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @var \Symfony\Component\Security\Core\Security
     */
    private $security;

    /**
     * @param Security $security
     */
    public function __construct(RouterInterface $router/*, Security $security*/)
    {
        $this->router = $router;
       // $this->security = $security;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function onLogoutSuccess(Request $request)
    {
        // On récupère la liste des rôles d'un utilisateur
      /*  $roles = $this->security->getToken()->getRoles();
        // On transforme le tableau d'instance en tableau simple
        $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
        // Si c'est un commercial, admin ou un super admin on redirige vers la page de login. Ici nous utilisons la route de FOSUserBundle.
        if (in_array('ROLE_COMMERCIAL', $rolesTab, true) || in_array('ROLE_ADMIN', $rolesTab, true) || in_array('ROLE_SUPER_ADMIN', $rolesTab, true))
            $response = new RedirectResponse($this->router->generate('fos_user_security_login'));*/
        // Sinon on redirige vers la homepage
      //  else
            $response = new RedirectResponse($this->router->generate('client_home'));

        return $response;
    }
}