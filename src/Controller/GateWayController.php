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
     * @Route("/gateway/{dataSource}", name="app_gate_way")
     */
    public function converter(GetStudies $studies, Request $request, $dataSource = ''): JsonResponse
    {

        if ($dataSource === 'label-Pacs'){
            $method = 'GET';
            $domain = 'http://143.198.25.142:8012/dcm4chee-arc/aets/DCM4CHEE/rs/studies?includefield=00081030';
            $studyList = $studies->getRequest($method, $domain);
            $studyListCoverted = new UtilsConvertData();
            $studyListCoverted = $studyListCoverted->convertDataPacs($studyList);
        }     
        else{
            $studyListCoverted = [];
        }   

        return new JsonResponse($studyListCoverted);
    }
}
