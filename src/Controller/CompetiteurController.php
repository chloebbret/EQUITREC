<?php
// src/Controller/CompetiteurController.php
namespace App\Controller;

use App\Entity\Competiteur;
use App\Repository\CompetiteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class CompetiteurController extends AbstractController
{
    #[Route('/competiteur', name: 'app_competiteur_list')]
    public function list(CompetiteurRepository $competiteurRepository, Request $request, EntityManagerInterface $em): Response
    {
        //récupère tt les compétiteurs à partir de la méthode FindAll.. de la l'instance du Repo
        $competiteurs = $competiteurRepository->findAllCompetiteurs();

        // Vérifie si la méthode HTTP utilisée est POST
        if ($request->isMethod('POST')) {
            // Vérifier si le formulaire d'ajout a été soumis
            if ($request->request->has('nomCompetiteur')) {
                $competiteur = new Competiteur();
                $idCompetiteur = $request->request->get('idCompetiteur');
                $nomCompetiteur = $request->request->get('nomCompetiteur');
                $prenomCompetiteur = $request->request->get('prenomCompetiteur');
                $niveauCompet = $request->request->get('niveauCompet');
                $numLicence = $request->request->get('numLicence');
                $notesCompetiteur = $request->request->get('notesCompetiteur');

                $competiteur->setId($idCompetiteur);
                $competiteur->setNomCompetiteur($nomCompetiteur);
                $competiteur->setPrenomCompetiteur($prenomCompetiteur);
                $competiteur->setNiveauCompetiteur($niveauCompet);
                $competiteur->setNumLicence($numLicence);
                $competiteur->setNotesCompetiteur($notesCompetiteur);

                $em->persist($competiteur);
                $em->flush();

                // Rediriger vers la même page pour afficher la liste mise à jour des compétiteurs
                return $this->redirectToRoute('app_competiteur_list');
            }
        }

        return $this->render('notes/notes.html.twig', [
            'competiteurs' => $competiteurs,
        ]);
    }
}
