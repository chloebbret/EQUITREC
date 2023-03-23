<?php

namespace App\Controller;

use App\Repository\CompetitionRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Competition;

class InfosCompetitionController extends AbstractController
{
    #[Route('/infos/competition', name: 'app_infos_competition')]
    public function index(CompetitionRepository $repo): Response
    {
        $competitions = $repo->assoJuges();

        return $this->render('infoscompetition/infoscompetition.html.twig', [
            'competitions' => $competitions,
        ]);
    }
}
