<?php

namespace AppBundle\Controller\Rest;

use AppBundle\Entity\Frase;
use AppBundle\Entity\FraseItem;
use AppBundle\Form\FraseType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class FrasesRestController extends FOSRestController
{
//    public function getOndasAction(Request $request)
//    {
//        $criteria = array('activo' => true);
//        $locale = $request->get('locale') ? $request->get('locale') : 'es';
//        switch ($locale) {
//            case 'en':
//                $prop = 'getEn';
//                break;
//            case 'pt':
//                $prop = 'getPt';
//                break;
//            default:
//                $prop = 'getNombre';
//        }
//        $categorias = $this->getDoctrine()->getRepository("AppBundle:Onda")->findBy($criteria);
//        foreach ($categorias as $categoria) {
//            $categoria->setNombre($categoria->$prop());
//        }
//        $vista = $this->view($categorias,
//            200);
//        return $this->handleView($vista);
//    }
//
    public function getFraseAction(Request $request, $id = 1)
    {

        if (isset($id)) {

            $frase = $this->getDoctrine()->getRepository("AppBundle:Frase")->findOneBy(
                array(
                    'id' => $id,
                    'activo' => true
                )
            );

        }

        $vista = $this->view($frase,
            200);

        return $this->handleView($vista);
    }

    public function getFrasesAction()
    {

        $frases = $this->getFrasesActivas();


        $vista = $this->view($frases,
            200);

        return $this->handleView($vista);

    }

    private function getFrasesActivas()
    {
        $frases = $this->getDoctrine()->getRepository("AppBundle:Frase")->misFrases($this->getUser());

        return $frases;
    }

    public function postFrasesAction(Request $request)
    {

        $entity = new Frase();

        $form = $this->createForm(FraseType::class, $entity);

        $items = $request->get('items');

        $request->request->remove('items');

        $form->handleRequest($request);

        if ($form->isValid()) {

            $this->setFrasesItem($items, $entity);

            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);

            $em->flush();

            $frases = $this->getFrasesActivas();

            $vista = $this->view($frases,
                200);
        } else {
            $vista = $this->view($entity,
                500);
        }


        return $this->handleView($vista);

    }

    private function getItemById(Frase $frase, $id)
    {
        foreach ($frase->getItems() as $item) {
            if ($item->getId() == $id) {
                return $item;
            }
        }

        return false;

    }

    public function setFrasesItem($items, Frase &$entity)
    {
        if (!count($items)) {
            return false;
        }
        foreach ($items as $item) {
            if (isset($item['id'])) {
                $fraseItem = $this->getItemById($entity, $item['id']);

                if ($fraseItem) {

                    $this->setItem($fraseItem, $entity, $item, false);

                } else {
                    $fraseItem = new FraseItem();

                    $this->setItem($fraseItem, $entity, $item);

                }
            } else {

                $fraseItem = new FraseItem();

                $this->setItem($fraseItem, $entity, $item);
            }
        }
    }

    private function setItem(&$fraseItem, &$entity, $item, $new = true)
    {

        $data = $item['data'];

        $type = $item["type"];

        if ($type == "picto") {
            $fraseItem->setName($data['name']);
            $fraseItem->setData(json_encode($data));
            $fraseItem->setPictoId($data['id']);
            $fraseItem->setDescription($data['description']);
            $fraseItem->setPath($data['path']);
            $fraseItem->setFileName(isset($data['file_name']) ? $data['file_name'] : $data['name']);
            $fraseItem->setType($item['type']);

        } else if ($type == "custom") {
            $fraseItem->setName($data['name']);
            $fraseItem->setData(json_encode($data));
            $picCustom = $this->getDoctrine()->getManager()->find("AppBundle:PictogramaCustom", ($data['id']));

            $fraseItem->setPictogramaCustom($picCustom);
            $fraseItem->setDescription($data['description']);
            $fraseItem->setPath($data['path']);
            $fraseItem->setFileName(isset($data['file_name']) ? $data['file_name'] : $data['name']);
            $fraseItem->setType($item['type']);
        } else {
            $fraseItem->setName($data['name']);
            $fraseItem->setData(json_encode($data));
        }

        if ($new) {
            $fraseItem->setFrase($entity);
            $entity->addItem($fraseItem);
        }
    }


    public function putFrasesAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository("AppBundle:Frase")->find($id);

        if ($request->get('name')) {
            $items = $request->get('items');

            $entity->setName($request->get('name'));
            $entity->setDescription($request->get('description'));
            $entity->setCompartir($request->get('compartir'));
            $this->setFrasesItem($items, $entity);

            $em->flush();

            $frases = $this->getFrasesActivas();

            $vista = $this->view($frases,
                200);
        } else {
            $vista = $this->view("No se mando el nombre",
                404);
        }


        return $this->handleView($vista);

    }

    public function deleteFraseAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository("AppBundle:Frase")->find($id);

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


    public function deleteFraseItemAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository("AppBundle:FraseItem")->find($id);

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