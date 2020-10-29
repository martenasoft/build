<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TstController extends AbstractController
{
    /**
     * @Route("/tst", name="tst")
     */
    public function index(): Response
    {
        return $this->render('tst/index.html.twig', [
            'controller_name' => 'TstController',
        ]);
    }
}
