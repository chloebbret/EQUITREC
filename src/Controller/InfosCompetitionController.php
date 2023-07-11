<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Repository\CompetitionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class InfosCompetitionController extends AbstractController
{
    #[Route('/infos/competition', name: 'app_infos_competition')]
    public function Competitions(CompetitionRepository $repoCompet, Request $request, EntityManagerInterface $em): Response
    {
        $competitions = $repoCompet->findAll();

        if ($request->isMethod('POST')) {
            // Vérifier si le formulaire d'ajout a été soumis
            if ($request->request->has('nomCompet')) {
                $competition = new Competition();
                $nomCompet = $request->request->get('nomCompet');
                $debutCompet = $request->request->get('debutCompet');
                $finCompet = $request->request->get('finCompet');
                $nbEpreuves = $request->request->get('nbEpreuves');

                $competition->setNomCompet($nomCompet);
                $competition->setDebutCompet(new \DateTime($debutCompet));
                $competition->setFinCompet(new \DateTime($finCompet));
                $competition->setNbEpreuves($nbEpreuves);

                $em->persist($competition);
                $em->flush();

                // Rediriger vers la même page pour afficher la liste mise à jour des compétitions
                return $this->redirectToRoute('app_infos_competition');

            }
        }

        return $this->render('infoscompetition/infoscompetition.html.twig', [
            'competitions' => $competitions,
        ]);
    }

    #[Route('/infos/competition/{id}', name: 'competition_delete', methods: ['POST'])]
    public function deleteCompet(Request $request, Competition $competition, EntityManagerInterface $em): Response
    {

        if ($this->isCsrfTokenValid('delete' . $competition->getId(), $request->request->get('_token'))) {
            $em->remove($competition);
            $em->flush();

            // Ajouter une instruction de débogage
            $this->addFlash('success', 'La compétition a été supprimée avec succès');
        } else {
            // Ajouter une instruction de débogage
            $this->addFlash('error', 'Le jeton CSRF est invalide');
        }

        // Rediriger vers la page d'origine pour afficher la liste mise à jour des compétitions
        return $this->redirectToRoute('app_infos_competition');
    }
}
