<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfosCompetitionController extends AbstractController
{
    #[Route('/infos/competition', name: 'app_infos_competition')]
    public function index(): Response
    {
        return $this->render('infoscompetition/infoscompetition.html.twig', [
            'controller_name' => 'InfosCompetitionController',
        ]);
    }
}
