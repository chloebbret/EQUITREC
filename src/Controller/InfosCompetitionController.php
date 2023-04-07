<?php

namespace App\Controller;

use App\Repository\CompetitionRepository;
use App\Repository\JugeRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class InfosCompetitionController extends AbstractController
{
    #[Route('/competition', name: 'app_infos_competition')]
    public function Competitions(CompetitionRepository $repoCompet, JugeRepository $repoJuge): Response
    {

        $competitions = $repoCompet -> findAll();

        return $this->render('infoscompetition/infoscompetition.html.twig', [
            'competitions' => $competitions
        ]);
    }
}
