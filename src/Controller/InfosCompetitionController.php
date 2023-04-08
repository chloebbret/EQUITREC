<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Repository\CompetitionRepository;
use App\Repository\JugeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;



class InfosCompetitionController extends AbstractController
{
    #[Route('/competition', name: 'app_infos_competition')]
    public function Competitions(CompetitionRepository $repoCompet, Request $request, EntityManagerInterface $em): Response
    {

        $competitions = $repoCompet->findAll();

        if ($request->isMethod('POST')) {
            $competition = new Competition();
            $nomCompet = $request->request->get('nomCompet');
            $adresse = $request->request->get('adresse');
            $codePostal = $request->request->get('codePostal');
            $ville = $request->request->get('ville');
            $debutCompet = $request->request->get('debutCompet');
            $finCompet = $request->request->get('finCompet');
            $nbEpreuves = $request->request->get('nbEpreuves');


            $competition->setNomCompet($nomCompet);
            $competition->setAdrCompet($adresse);
            $competition->setCpCompet($codePostal);
            $competition->setVilleCompet($ville);
            $competition->setDebutCompet(new \DateTime($debutCompet));
            $competition->setFinCompet(new \DateTime($finCompet));
            $competition->setNbEpreuves($nbEpreuves);

            $em->persist($competition);
            $em->flush();

            // Rediriger vers la même page pour afficher la liste mise à jour des compétitions
            return $this->redirectToRoute('app_infos_competition');
        }


        return $this->render('infoscompetition/infoscompetition.html.twig', [
            'competitions' => $competitions
        ]);
    }
    public function deleteCompetition(int $id, CompetitionRepository $repoCompet, EntityManagerInterface $em): RedirectResponse
    {
        $competition = $repoCompet->find($id);

        if ($competition) {
            $em->remove($competition);
            $em->flush();
        }

        return $this->redirectToRoute('app_infos_competition');
    }

}
