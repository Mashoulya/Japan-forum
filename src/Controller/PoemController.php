<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PoemController extends AbstractController
{
    #[Route('/poem', name: 'app_poem')]
    public function index(): Response
    {
        return $this->render('poem/index.html.twig', [
            'controller_name' => 'PoemController',
        ]);
    }
}
