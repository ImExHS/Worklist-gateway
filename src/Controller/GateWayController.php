<?php

namespace App\Controller;

use App\handle\UtilsConvertData;
use App\Services\GetStudies;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GateWayController extends AbstractController
{
    /**
     * @Route("/gateway/{provenance}", name="app_gate_way")
     */
    public function converter(GetStudies $studies, Request $request, $provenance = ''): JsonResponse
    {
        if ($provenance === 'pacs'){
            $method = 'GET';
            $domain = 'http://143.198.25.142:8012/dcm4chee-arc/aets/DCM4CHEE/rs/studies?includefield=00081030';
        }        

        $studyList = $studies->getRequest($method, $domain);
        $studyListCoverted = new UtilsConvertData();
        $studyListCoverted = $studyListCoverted->convertDataPacs($studyList);

        return new JsonResponse($studyListCoverted);
    }
}
