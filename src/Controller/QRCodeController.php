<?php

namespace App\Controller;

class QRCodeController extends AbstractController
{


    #[Route('/qrcode', name: 'app_qrcode')]
    public function qrcode(): Response
    {




        return $this->render('qrcode/qrcode.html.twig', [
            'controller_name' => 'QRCodeController',
        ]);
    }
}