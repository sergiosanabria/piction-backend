<?php

namespace UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuarioController extends Controller
{
    public function postRegisterAction(Request $request)
    {
        $userManager = $this->get('fos_user.user_manager');
        $entityManager = $this->get('doctrine')->getManager();
        $data = $request->request->all();

        // Do a check for existing user with userManager->findByUsername

        $user = $userManager->createUser();
        $user->setUsername($data['username']);
        // ...
        $user->setPlainPassword($data['password']);
        $user->setEnabled(true);

        $userManager->updateUser($user);

        return $this->generateToken($user, 201);
    }
}
