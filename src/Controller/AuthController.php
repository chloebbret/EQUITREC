<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    #[Route('/connexion', name: 'connexion')]
    public function Connexion() : Response {
        return $this->render('auth/login.html.twig');
    }

    #[Route('/login', name: 'login')]
    public function Login(Request $request) : Response {

        if ($request->getMethod() !== 'POST') {
            return $this->render('default/error.html.twig', [
                'title' => '404 Not Found',
                'subtitle' => 'La page correspondante n\'as pas été trouvée !'
            ]);
        }

        /*
         * données du formulaire présent dans un tableau
         * exemple : ["login" => "MonIdentifiant", "password" => "MonMotDePasse"]
         */

        parse_str($request->getContent(), $data);

        /*
         * Vérification des données
         */

        if (!isset($data['login']) || !isset($data['password'])) {
            return $this->render('default/error.html.twig', [
                'title' => 'Mauvaise Requête',
                'subtitle' => 'Des données de connexion sont manquantes !'
            ]);
        }

        $login = $data['login'];
        $password = $data['password'];

        $user = $this->userRepository->findOneBy([
            'login_user' => $login,
            'pass_user' => $password
        ]);

        return $this->render('auth/login.html.twig', [
            'success' => isset($user)
        ]);

    }
}