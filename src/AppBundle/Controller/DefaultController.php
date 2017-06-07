<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function estadisticasAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:Default:estadisticas.html.twig', [

        ]);
    }

    public function estadisticasHistoricosAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:Default:estadisticas_historicos.html.twig', [

        ]);
    }

    public function estadisticasTiempoRealAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:Default:estadisticas_tiempo_real.html.twig', [

        ]);
    }
}
