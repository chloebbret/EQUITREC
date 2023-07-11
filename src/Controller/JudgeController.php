<?php

namespace App\Controller;

use App\Repository\JugeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class JudgeController extends AbstractController
{
    #[Route('/juge', name: 'app_juge')]
    public function juge(JugeRepository $jugeRepository): Response
    {
        $juges = $jugeRepository->findAll();

        $jsonData = '{
            "judges": [
                {
                    "id": 0,
                    "name": "Lucien",
                    "surname": "Maire"
                }
            ],
            "riders": [
                {
                    "id": 1,
                    "name": "Marc",
                    "surname": "Antoine",
                    "level_id": 0,
                    "bib_number": 69
                },
                {
                    "id": 2,
                    "name": "Zinedine",
                    "surname": "Arkhaboule",
                    "level_id": 0,
                    "bib_number": 69
                }
            ],
            "levels": [
                {
                    "id": 0,
                    "label": "Amateur 3"
                }
            ],
            "obstacles": [
                {
                    "id": 0,
                    "label": "Barrière"
                }
            ],
            "competitions": [
                {
                    "id": 0,
                    "participant_id": 0,
                    "judge_id": 0
                }
            ],
            "competition_obstacles": [
                {
                    "competition_id": 0,
                    "obstacle_id": 0
                }
            ]
        }';

        $jsonData = json_decode($jsonData, true); // Convertir le JSON en tableau associatif

        return $this->render('juges/index.html.twig', [
            'controller_name' => 'JudgeController',
            'juges' => $juges,
            'jsonData' => $jsonData,
        ]);
    }
}
