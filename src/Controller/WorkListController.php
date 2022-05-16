<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WorkListController extends AbstractController
{
    /**
     * @Route("/work/list", name="app_work_list", methods={"POST"})
     */
    public function index(Request $request): JsonResponse
    {
        // return $this->json([
        //     'message' => 'Welcome to your new controller!',
        //     'path' => 'src/Controller/WorkListController.php',
        // ]);
        $data = json_decode($request->getContent(), true);
      

        return new JsonResponse($data);
    }
}
