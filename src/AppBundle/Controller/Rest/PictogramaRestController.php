<?php

namespace AppBundle\Controller\Rest;

use AppBundle\Entity\Image;
use AppBundle\Entity\Persona;
use AppBundle\Entity\PictogramaCustom;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use UsuarioBundle\Entity\Usuario;

class PictogramaRestController extends FOSRestController
{

    public function getPictogramasAction(Request $request)
    {

        $pictos = $this->getPictos($request);

        $vista = $this->view($pictos,
            200);

        return $this->handleView($vista);
    }

    public function postPictogramaAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $picto = new PictogramaCustom();
        $picto->setName($request->get('name'));
        $picto->setDescription($request->get('description'));


        $em->persist($picto);

        $em->flush();


        $vista = $this->view($picto->getId(),
            200);

        return $this->handleView($vista);
    }

    public function postPictogramaImageAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $picto = $em->getRepository("AppBundle:PictogramaCustom")->find($id);

        if ($picto) {
            $imagenFile = $request->files->get('file');

            if ($picto->getImage()) {
                $image = $picto->getImage();
            } else {
                $image = new Image();
            }


            $image->setImageFile($imagenFile);
            $image->setImageName("$id.png");

            $picto->setImage($image);


            $em->flush();
        }


        $vista = $this->view($picto,
            200);

        return $this->handleView($vista);
    }

    public function putPictogramaAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $picto = $em->getRepository("AppBundle:PictogramaCustom")->find($id);

        $picto->setName($request->get('name'));
        $picto->setDescription($request->get('description'));


        $em->flush();


        $vista = $this->view($picto->getId(),
            200);

        return $this->handleView($vista);
    }

    public function deletePictogramaAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $picto = $em->getRepository("AppBundle:PictogramaCustom")->find($id);

        $picto->setActivo(false);


        $em->flush();


        $vista = $this->view($picto->getId(),
            200);

        return $this->handleView($vista);
    }

    private function getPictos(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $pictos = $em->getRepository('AppBundle:PictogramaCustom')->misPictos($this->getUser());

        $ip = $request->getHost();

        $host = $request->getScheme() . '://' . $ip . $request->getBasePath() . $this->getParameter('app.path.image');

        /**
         * @var $picto PictogramaCustom
         */
        foreach ($pictos as $picto) {
            if ($picto->getImage()) {
                $picto->setPath("$host/" . $picto->getImage()->getImageName());
            }

        }


        return $pictos;
    }
}
