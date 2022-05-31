<?php

namespace App\Controller;

use App\Entity\Worklist;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class WorkListController extends AbstractController
{

    private $doctrine;
    private $entityManager;
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->entityManager = $doctrine->getManager();
    }
    /**
     * @Route("/work/list", name="app_work_list", methods={"POST"})
     */
    public function index(Request $request): JsonResponse
    {

        $data = json_decode($request->getContent(), true);

        $workList = new Worklist();
        $workList->setProvenance($data['provenance']);
        $workList->setNextNode($data['nextNode']);
        $workList->setCurrent(DateTime::createFromFormat('Y-m-d', date("Y-m-d", strtotime($data['current']))));
        $workList->setItsTheFinal($data['its_the_final']);

        $this->entityManager->persist($workList);
        $this->entityManager->flush();

        return new JsonResponse($data);
    }
}
