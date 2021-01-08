<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocalSuscriberController extends AbstractController
{
    /**
     * @Route("/local/suscriber", name="local_suscriber")
     */
    public function index(): Response
    {
        return $this->render('local_suscriber/index.html.twig', [
            'controller_name' => 'LocalSuscriberController',
        ]);
    }
}
