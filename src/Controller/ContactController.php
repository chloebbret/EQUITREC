<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $email = $request->request->get('email');
        $adresse = $request->request->get('adresse');
        $message = $request->request->get('message');
        $sujet = $request->request->get('sujet');

        $body = $sujet;
        $body .= "Nom : $nom\n";
        $body .= "Prénom : $prenom\n";
        $body .= "Email : $email\n";
        $body .= "Adresse : $adresse\n\n";
        $body .= "Message :\n$message";

        // Envoi de l'e-mail
        $email = (new Email())
            ->from('k.vongkingkeo@lyon.ort.asso.fr')
            ->to($email)
            ->subject("Nouveau message")
            ->text($body);

        $mailer->send($email);

        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
