<?php

namespace AppBundle\Controller\Rest;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use UsuarioBundle\Entity\Usuario;

class UsuarioRestController extends FOSRestController
{
    public function getUsuarioRegisterAction(Request $request)
    {

        new Response('hola');
        $userManager = $this->get('fos_user.user_manager');
        $entityManager = $this->get('doctrine')->getManager();
        $data = $request->request->all();

        // Do a check for existing user with userManager->findByUsername

        $user = new Usuario();
        $user->setUsername('riki');
        // ...
        $user->setPlainPassword('riki');
        $user->setEmail('riki@samso.com');
        $user->setEnabled(true);

        $userManager->updateUser($user);

        return $this->generateToken($user, 201);
    }
}
