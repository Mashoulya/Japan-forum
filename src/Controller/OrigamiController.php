<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrigamiController extends AbstractController
{
    #[Route('/origami', name: 'app_origami')]
    public function index(): Response
    {
        return $this->render('origami/index.html.twig', [
            'controller_name' => 'OrigamiController',
        ]);
    }
}
