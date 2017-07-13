<?php

namespace AppBundle\Controller\Rest;

use AppBundle\Entity\Amistad;
use AppBundle\Entity\Image;
use AppBundle\Entity\Persona;
use AppBundle\Entity\SolicitudAmistad;
use AppBundle\Form\PersonaType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use UsuarioBundle\Entity\Usuario;

class AmistadRestController extends FOSRestController
{
    public function postAmistadEnviarSolicitudAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $usuarioId = $request->get('usuarioId');

        $usuarioSolicita = $this->getUser();
        $usuarioSolicitado = $em->getRepository('UsuarioBundle:Usuario')->find($usuarioId);

        $unaSolicitud = new SolicitudAmistad();

        $unaSolicitud->setUsuarioSolicita($usuarioSolicita);
        $unaSolicitud->setUsuarioSolicitado($usuarioSolicitado);

        $em->persist($unaSolicitud);
        $em->flush($unaSolicitud);


        $vista = $this->view($unaSolicitud,
            200);

        return $this->handleView($vista);
    }

    public function postAmistadCancelarSolicitudAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id = $request->get('solicitudAmistadId');

        $solicitudAmistad = $em->getRepository('AppBundle:SolicitudAmistad')->find($id);

        $solicitudAmistad->setActivo(false);

        $em->flush();


        $vista = $this->view($solicitudAmistad,
            200);

        return $this->handleView($vista);
    }

    public function postAmistadAceptarSolicitudAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id = $request->get('solicitudAmistadId');


        /* @var \AppBundle\Entity\SolicitudAmistad $solicitudAmistad */
        $solicitudAmistad = $em->getRepository('AppBundle:SolicitudAmistad')->find($id);

        $solicitudAmistad->setAceptado(true);

        $amistad = new Amistad();

        $amistad->setSolicitud($solicitudAmistad);

        $amistad->setUsuarioA($solicitudAmistad->getUsuarioSolicita());
        $amistad->setUsuarioB($solicitudAmistad->getUsuarioSolicitado());

        $em->persist($amistad);

        $amistad2 = new Amistad();

        $amistad2->setSolicitud($solicitudAmistad);

        $amistad2->setUsuarioA($solicitudAmistad->getUsuarioSolicitado());
        $amistad2->setUsuarioB($solicitudAmistad->getUsuarioSolicita());

        $em->persist($amistad2);

        $em->flush();

        $vista = $this->view($solicitudAmistad,
            200);

        return $this->handleView($vista);
    }

    public function getAmistadSolicitudesRecibidasAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();


        /* @var Usuario $usuario */
        $usuario = $this->getUser();

        $solicitudes = $em->getRepository("AppBundle:SolicitudAmistad")->getSolicitudesAmistadRecibidas($usuario);


        $usuarios = array();

        if (count($solicitudes)) {
            /* @var SolicitudAmistad $u */
            foreach ($solicitudes as $u) {

                $usuarios [] = $u->getUsuarioSolicita();
                $u->getUsuarioSolicita()->setSolicito($u->getId());

            }
        }


        $vista = $this->view($usuarios,
            200);

        return $this->handleView($vista);
    }

    public function getAmistadMisAmigosAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $search = $request->get('search');


        /* @var Usuario $usuario */
        $usuario = $this->getUser();

        $usuarios = $em->getRepository("AppBundle:Amistad")->misAmigos($search, $usuario);


        if (count($usuarios)) {
            /* @var Usuario $u */
            foreach ($usuarios as $u) {
                $arraySolicitudes [] = $u->getUsuarioB();

            }
        }


        $vista = $this->view($arraySolicitudes,
            200);

        return $this->handleView($vista);
    }

    public function getAmistadAccionesMisAmigosAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();


        /* @var Usuario $usuario */
        $usuario = $this->getUser();

        $amigos = $em->getRepository("AppBundle:Amistad")->misAmigos("", $usuario);

        $acciones = [];

        if ($amigos) {
            $arrayUsuarios = [];

            foreach ($amigos as $u) {
                $arrayUsuarios [] = $u->getUsuarioB();
            }

            $frases = $em->getRepository("AppBundle:Frase")->frasesAmigos($arrayUsuarios);

            $acciones = array_merge($frases);
        }


        $vista = $this->view($acciones,
            200);

        return $this->handleView($vista);
    }
}
