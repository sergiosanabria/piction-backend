<?php

namespace AppBundle\Controller\Rest;

use AppBundle\Entity\Frase;
use AppBundle\Form\FraseType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class FrasesRestController extends FOSRestController {
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
	public function getFraseAction( Request $request, $id = 1 ) {

		if ( isset( $id ) ) {

			$frase = $this->getDoctrine()->getRepository( "AppBundle:Frase" )->findOneBy(
				array(
					'id'     => $id,
					'activo' => true
				)
			);

		}

		$vista = $this->view( $frase,
			200 );

		return $this->handleView( $vista );
	}

	public function getFrasesAction( Request $request ) {

		$frases = $this->getDoctrine()->getRepository( "AppBundle:Frase" )->findBy(
			array(
				'activo' => true
			)
		);


		$vista = $this->view( $frases,
			200 );

		return $this->handleView( $vista );

	}

	public function postFrasesAction( Request $request ) {

		$entity = new Frase();
		
		$form = $this->createForm( FraseType::class, $entity );

		$form->handleRequest( $request );

		if ( $form->isValid() ) {
			$em = $this->getDoctrine()->getManager();

			$em->persist( $entity );

			$em->flush();

			$vista = $this->view( $entity,
				200 );
		} else {
			$vista = $this->view( $entity,
				500 );
		}


		return $this->handleView( $vista );

	}


}