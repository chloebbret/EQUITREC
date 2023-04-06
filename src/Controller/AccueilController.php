<?php

namespace App\Controller;

use App\Repository\CompetiteurRepository;
use App\Repository\CompetitionRepository;
use App\Repository\LogJugesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('accueil/accueil.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    #[Route('/chart-data', name: 'app_chart_data')]
    public function affichageMoyenneNotes(CompetitionRepository $repoCompetition) {
        $data = $repoCompetition->moyenneCompetition();

        return new JsonResponse($data);

    }

    #[Route('/api/connexionJournee', name: 'connexionJournee', methods: ['GET'])]
    public function getConnectedUsers(LogJugesRepository $logRepo): JsonResponse
    {
        $connectedUsers = $logRepo->connexionJournee();

        return $this->json($connectedUsers);
    }
}


