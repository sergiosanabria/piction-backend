<?php

namespace AppBundle\Controller\Rest;

use AppBundle\Entity\Alumno;
use AppBundle\Entity\Docente;
use AppBundle\Entity\DocenteAlumno;
use AppBundle\Entity\Persona;
use AppBundle\Entity\SolicitudAmistad;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use UsuarioBundle\Entity\Usuario;

class AlumnoRestController extends FOSRestController
{
    public function postAlumnoRegisterAction(Request $request)
    {

        $userManager = $this->get('fos_user.user_manager');
        $data = $request->request->all();

        // Do a check for existing user with userManager->findByUsername

        $user = new Usuario();
        $user->setUsername($data['username']);
        if ($data['pass1'] != $data['pass2']) {
            //todo error pass no coinciden
        }


        $persona = new Alumno();

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

        $docenteAlumno = new DocenteAlumno();

        $docenteAlumno->setAlumno($persona);
        $docenteAlumno->setDocente($this->getUser()->getPersona());

        $userManager->updateUser($user);

        $em = $this->getDoctrine()->getManager();

        $em->persist($docenteAlumno);
        $em->flush();

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


    public function getUsuarioBuscarAmigosAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $search = $request->get('search');

        if (!trim($search)){
            $vista = $this->view([],
                200);

            return $this->handleView($vista);
        }

        /* @var Usuario $usuario */
        $usuario = $this->getUser();

        $usuarios = $em->getRepository("UsuarioBundle:Usuario")->buscarAmigos($search, $usuario);

        $arraySolicitudes = array();

        if (count($usuarios)) {
            /* @var Usuario $u */
            foreach ($usuarios as $u) {
                $arraySolicitudesEnviadas = $em->getRepository("AppBundle:SolicitudAmistad")->getSolicitudesAmistadByUsuario($usuario, $u);
                if ($arraySolicitudesEnviadas) {
                    $u->setEnvio($arraySolicitudesEnviadas[0]->getId());
                    $u->setAceptado($arraySolicitudesEnviadas[0]->getAceptado());
                }
                $arraySolicitudesRecibidas = $em->getRepository("AppBundle:SolicitudAmistad")->getSolicitudesAmistadByUsuario($u, $usuario);
                if ($arraySolicitudesRecibidas) {
                    $u->setSolicito($arraySolicitudesRecibidas[0]->getId());
                    $u->setAceptado($arraySolicitudesRecibidas[0]->getAceptado());
                }

            }
        }


        $vista = $this->view($usuarios,
            200);

        return $this->handleView($vista);
    }
}
