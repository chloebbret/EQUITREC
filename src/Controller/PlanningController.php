<?php

namespace App\Controller;

use App\Repository\CompetitionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningController extends AbstractController
{
    #[Route('/planning', name: 'app_planning')]
    public function Competitions(CompetitionRepository $competitionRepository): Response
    {
        $competitions = $competitionRepository->findCompetitionDates();

        return $this->render('planning/index.html.twig', [
            'competitions' => $competitions,
        ]);
    }
}
