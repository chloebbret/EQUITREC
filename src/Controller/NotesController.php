<?php

namespace App\Controller;

use App\Repository\CompetiteurRepository;
use App\Repository\CompetitionRepository;
use App\Repository\LogJugesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class NotesController extends AbstractController
{

    private CompetiteurRepository $competiteurRepository;

    public function __construct(CompetiteurRepository $competiteurRepository)
    {
        $this->competiteurRepository = $competiteurRepository;
    }

    #[Route('/notes', name: 'app_notes')]
    public function handle(): Response
    {
        $competiteurs = $this->competiteurRepository->findAll();

        $resComp = [];
        $resNote = [];

        foreach ($competiteurs as $comp) {

            $nom = $comp->getNomCompetiteur();
            $prenom = $comp->getPrenomCompetiteur();
            $note = $comp->getNotesCompetiteur();
            $competition = "Aucune Compétition";

            try {
                $competition = $comp->getCompetition()->getNomCompet();
            } catch (\Exception $e) {

            }

            if ($note === null) {
                $resNote[] = [
                    "id" => $comp->getId(),
                    "title" => "$nom $prenom"
                ];
            }

            $resComp[] = [
                "title" => "$nom $prenom",
                "note" => $note ?? "Non noté",
                "compet" => $competition
            ];
        }

        return $this->render('notes/index.html.twig', [
            'comp' => $resComp,
            'note' => $resNote
        ]);
    }
}


