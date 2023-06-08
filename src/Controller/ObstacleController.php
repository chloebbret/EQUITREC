<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObstacleController extends AbstractController
{
    #[Route('/obstacle', name: 'app_obstacle')]
    public function index(): Response
    {
        return $this->render('obstacle/obstacle.html.twig', [
            'controller_name' => 'ObstacleController',
        ]);
    }

}
