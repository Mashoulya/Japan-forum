<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaintingController extends AbstractController
{
    #[Route('/painting', name: 'app_painting')]
    public function index(): Response
    {
        return $this->render('painting/index.html.twig', [
            'controller_name' => 'PaintingController',
        ]);
    }
}
