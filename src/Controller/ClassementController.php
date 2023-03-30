<?php

namespace App\Controller;

use App\Repository\CompetiteurRepository;
use App\Repository\CompetitionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ClassementController extends AbstractController

{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/classement', name: 'app_classement')]
    public function index(CompetiteurRepository $competiteurRepository, CompetitionRepository $repoCompet, Request $request): Response
    {
        $competitionId = $request->query->get('id_competition');
        $competiteurs = $competiteurRepository -> classementCompet();
        $competitions = $repoCompet -> findNom();


        return $this->render('classement/index.html.twig', [
            'controller_name' => 'ClassementController',
            'competiteurs' => $competiteurs,
            'competitions' => $competitions,
            'competitionId' => $competitionId
        ]);
    }

}


