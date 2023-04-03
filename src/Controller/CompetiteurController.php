<?php

namespace App\Controller;
use App\Repository\CompetiteurRepository;
use App\Entity\Competition;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetiteurController extends AbstractController
{
    #[Route('/competiteur', name: 'app_competiteur_list')]
    public function list(CompetiteurRepository $competiteurRepository): Response
    {
        $competiteurs = $competiteurRepository->findAllCompetiteurs();

        return $this->render('notes/notes.html.twig', [
            'competiteurs' => $competiteurs,
        ]);
    }
}
