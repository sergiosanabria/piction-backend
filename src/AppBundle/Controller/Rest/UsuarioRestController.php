<?php

namespace AppBundle\Controller\Rest;

use AppBundle\Entity\Persona;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use UsuarioBundle\Entity\Usuario;

class UsuarioRestController extends FOSRestController
{
    public function postUsuarioRegisterAction(Request $request)
    {

        $userManager = $this->get('fos_user.user_manager');
        $entityManager = $this->get('doctrine')->getManager();
        $data = $request->request->all();

        // Do a check for existing user with userManager->findByUsername

        $user = new Usuario();
        $user->setUsername($data['username']);
        if ($data['pass1'] != $data['pass2']) {
            //todo error pass no coinciden
        }


        $persona = new Persona();

        $persona->setNombre($data['nombres']);
        $persona->setApellido($data['apellido']);
        $persona->setFechaNacimiento(new \DateTime($data['fechaNacimiento']));
//        $persona->setSexo($data['sexo'] );
        $persona->setSexo('m');

        $user->setPlainPassword($data['pass1']);
        $user->setEmail($data['email']);
        $user->setEnabled(true);

        $user->setPersona($persona);

        $persona->setUsuario($user);

        $userManager->updateUser($user);

        $vista = $this->view($user,
            200);

        return $this->handleView($vista);
    }

    public function getCheckAction()
    {
        $vista = $this->view($this->getUser(),
            200);

        return $this->handleView($vista);
    }
}
