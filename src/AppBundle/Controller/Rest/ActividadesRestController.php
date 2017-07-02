<?php

namespace AppBundle\Controller\Rest;

use AppBundle\Entity\Actividad;
use AppBundle\Entity\ActividadFrase;
use AppBundle\Entity\ActividadItem;
use AppBundle\Form\ActividadType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class ActividadesRestController extends FOSRestController
{

    public function getActividadAction(Request $request, $id = 1)
    {

        if (isset($id)) {

            $actividad = $this->getDoctrine()->getRepository("AppBundle:Actividad")->findOneBy(
                array(
                    'id' => $id,
                    'activo' => true
                )
            );

        }

        $vista = $this->view($actividad,
            200);

        return $this->handleView($vista);
    }

    public function getActividadesAction()
    {

        $actividades = $this->getActividadesActivas();


        $vista = $this->view($actividades,
            200);

        return $this->handleView($vista);

    }

    private function getActividadesActivas()
    {
        $actividades = $this->getDoctrine()->getRepository("AppBundle:Actividad")->misActividades($this->getUser());

        return $actividades;
    }

    public function postActividadesAction(Request $request)
    {

        $entity = new Actividad();

        $form = $this->createForm(ActividadType::class, $entity);

        $frases = $request->get('frases');

        $request->request->remove('frases');

        $form->handleRequest($request);

        if ($form->isValid()) {

            $this->setActividadesFrase($frases, $entity);

            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);

            $em->flush();

            $actividades = $this->getActividadesActivas();

            $vista = $this->view($actividades,
                200);
        } else {
            $vista = $this->view($entity,
                500);
        }


        return $this->handleView($vista);

    }

    private function getFraseInActividad(Actividad $actividad, $id)
    {
        foreach ($actividad->getFrases() as $item) {
            if ($item->getId() == $id) {
                return $item;
            }
        }

        return false;

    }

    public function setActividadesFrase($frases, Actividad &$entity)
    {
        if (!count($frases)) {
            return false;
        }
        foreach ($frases as $item) {
            if (isset($item['id'])) {
                $actividadFrase = $this->getFraseInActividad($entity, $item['id']);

                if ($actividadFrase) {

                    $this->setActividad($actividadFrase, $entity, $item, false);

                } else {
                    $actividadFrase = new ActividadFrase();

                    $this->setActividad($actividadFrase, $entity, $item);

                }
            } else {

                $actividadFrase = new ActividadFrase();

                $this->setActividad($actividadFrase, $entity, $item);
            }
        }
    }

    private function setActividad(ActividadFrase &$actividadFrase, Actividad &$entity, $item, $new = true)
    {

        $fraseData = $item['frase'];

        $frase = $this->getDoctrine()->getRepository("AppBundle:Frase")->find($fraseData['id']);

        if ($new) {
            $actividadFrase->setActividad($entity);
            $actividadFrase->setFrase($frase);
            $entity->addFrase($actividadFrase);
        } else {
            $actividadFrase->setFrase($frase);
        }
    }


    public function putActividadesAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository("AppBundle:Actividad")->find($id);

        if ($request->get('name')) {
            $frases = $request->get('frases');

            $entity->setName($request->get('name'));
            $entity->setDescription($request->get('description'));
            $this->setActividadesFrase($frases, $entity);

            $em->flush();

            $actividades = $this->getActividadesActivas();

            $vista = $this->view($actividades,
                200);
        } else {
            $vista = $this->view("No se mando el nombre",
                404);
        }


        return $this->handleView($vista);

    }


    public function deleteActividadesItemAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository("AppBundle:ActividadFrase")->find($id);

        if ($entity) {
            $entity->setActivo(false);

            $em->flush();

            $vista = $this->view("ok",
                200);
        } else {
            $vista = $this->view($entity,
                500);
        }


        return $this->handleView($vista);

    }


}