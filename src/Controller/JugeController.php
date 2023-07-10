<?php

namespace App\Controller;
use App\Repository\JugeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JugeController extends AbstractController
{
    #[Route('/juge', name: 'app_juge')]
    public function Juge(JugeRepository $jugeRepository): Response
    {
        $juges = $jugeRepository->findAll();

        return $this->render('juges/index.html.twig', [
            'controller_name' => 'JugeController',
            'juges' => $juges,
        ]);
    }
}