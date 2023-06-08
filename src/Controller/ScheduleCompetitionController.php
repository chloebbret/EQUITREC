<?php

namespace App\Controller;

use App\Repository\CompetitionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScheduleCompetitionController extends AbstractController
{
    #[Route('/planification/competition', name: 'app_planification_competition')]
    public function renderPlanning(CompetitionRepository $competitionRepository): Response
    {
        $competitions = $competitionRepository->findAll();
        return $this->render('schedule/competition/schedule_competition.html.twig');
    }
}