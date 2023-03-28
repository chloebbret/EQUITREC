<?php

namespace App\Controller;

use App\Entity\Competiteur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CompetiteurRepository;


class ClassementController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/classement', name: 'app_classement')]
    public function index(): Response
    {
        $repository = $this->entityManager->getRepository(Competiteur::class);
        $competiteurs = $repository->findAll();

        return $this->render('classement/index.html.twig', [
            'controller_name' => 'ClassementController',
            'competiteurs' => $competiteurs
        ]);
    }

}


