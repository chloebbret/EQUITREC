<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer, CsrfTokenManagerInterface $csrfTokenManager): Response
    {
        // Vérifie si la méthode de la requête est POST
        if ($request->isMethod('POST')) {
            $mail = 'contactequitrecproject@gmail.com';
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $email = $request->request->get('email');
            $adresse = $request->request->get('adresse');
            $message = $request->request->get('message');
            $sujet = $request->request->get('sujet');

            // Vérifiez si les champs ne sont pas vides
            if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($adresse) && !empty($message) && !empty($sujet)) {
                $body = "$sujet\n";
                $body .= "Nom : $nom\n";
                $body .= "Prénom : $prenom\n";
                $body .= "Email : $email\n";
                $body .= "Adresse : $adresse\n\n";
                $body .= "Message :\n$message";

                // Envoi de l'e-mail
                $mail = (new Email())
                    ->from($mail)
                    ->to($mail)
                    ->subject($sujet)
                    ->text($body);

                $mailer->send($mail);

                // Ajoutez un message flash
                $this->addFlash('success', 'Votre message a été envoyé avec succès.');

                // Redirigez vers la page de contact
                return $this->redirectToRoute('app_contact');
            } else {
                // Ajoutez un message flash pour les champs vides
                $this->addFlash('error', 'Veuillez remplir tous les champs du formulaire.');
            }
        }

        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
