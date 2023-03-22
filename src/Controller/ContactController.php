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
        $mail = 'k.vongkingkeo@lyon.ort.asso.fr';
        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $email = $request->request->get('email');
        $adresse = $request->request->get('adresse');
        $message = $request->request->get('message');
        $sujet = $request->request->get('sujet');

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

        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
