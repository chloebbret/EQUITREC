<?php

namespace App\Controller;

use App\Repository\LogJugesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogController extends AbstractController
{
    #[Route('/log', name: 'app_log')]
    public function index(): Response
    {
        return $this->render('log/index.html.twig', [
            'controller_name' => 'LogController',
        ]);
    }

    public function getConnections(LogJugesRepository $repoLog): JsonResponse
    {
        $connections = $repoLog->findConnectionsByDay();

        return $this->json($connections);
    }
}
