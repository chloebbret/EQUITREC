<?php
// src/Controller/CompetiteurController.php
namespace App\Controller;

use App\Entity\Competiteur;
use App\Entity\Competition;
use App\Repository\CompetiteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class CompetiteurController extends AbstractController
{

    private CompetiteurRepository $competiteurRepository;

    public function __construct(CompetiteurRepository $competiteurRepository)
    {
        $this->competiteurRepository = $competiteurRepository;
    }

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
                //$competition = new Competition();
                $idCompetiteur = $request->request->get('idCompetiteur');
                $nomCompetiteur = $request->request->get('nomCompetiteur');
                $prenomCompetiteur = $request->request->get('prenomCompetiteur');
                $niveauCompet = $request->request->get('niveauCompet');
                $numLicence = $request->request->get('numLicence');
                //$nomCompet = $request->request->get('nomCompet');

                $competiteur->setId($idCompetiteur);
                $competiteur->setNomCompetiteur($nomCompetiteur);
                $competiteur->setPrenomCompetiteur($prenomCompetiteur);
                $competiteur->setNiveauCompetiteur($niveauCompet);
                $competiteur->setNumLicence($numLicence);
                //$competition->setNomCompet($nomCompet);

                // Vérifier si le numéro de licence existe déjà en base de données
                $comp = $competiteurRepository->findBy([
                    'nom_competiteur' => $competiteur->getNomCompetiteur(),
                    'prenom_competiteur' => $competiteur->getPrenomCompetiteur()
                ]);

                if ($comp) {
                    return $this->render('default/error.html.twig', [
                        'title' => 'Données éronées',
                        'subtitle' => 'Les noms et prénoms entrées existent déjà !'
                    ]);
                }

                $comp = $competiteurRepository->findBy([
                    'num_licence' => $competiteur->getNumLicence()
                ]);

                if ($comp) {
                    return $this->render('default/error.html.twig', [
                        'title' => 'Données éronées',
                        'subtitle' => 'Le numéro de license est déjà existant'
                    ]);
                }

                // persister/conserver l'objet competiteur en bdd
                $em->persist($competiteur);
                // enregistrer tous les changements
                $em->flush();

                // Rediriger vers la même page pour afficher la liste mise à jour des compétiteurs
                return $this->redirectToRoute('app_competiteur_list');
            }
        }

        return $this->render('notes/notes.html.twig', [
            'competiteurs' => $competiteurs,
        ]);
    }
    #[Route('/competiteur/{id}', name: 'competiteur_delete', methods: ['POST'])]
    public function delete(Request $request, Competiteur $competiteur, EntityManagerInterface $entityManager): Response
    {
        // vérifie que le jeton CSRF est valide avant de supprimer l'objet et est utilisé pour empéche les attaques CSRF , si ça provient de l'utilisateur
        if ($this->isCsrfTokenValid('delete' . $competiteur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($competiteur);
            $entityManager->flush();

            $this->addFlash('success', 'L\'élément a été supprimé avec succès.');
        } else {
            $this->addFlash('error', 'Le jeton CSRF est invalide.');
        }
        // redirige l'utilisateur a la page de base
        return $this->redirectToRoute('app_competiteur_list');
    }

}
