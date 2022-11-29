<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;


class ProgramController extends AbstractController
{

    #[Route('/program/', name: 'program_index')]
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [

            'website' => 'Wild Series',
        ]);
    }
    
    #[Route('/program/{id}', methods: ['GET'], name: 'program_show')]
    public function new(): Response
    {

    // traitement d'un formulaire par exemple

    // redirection vers la page 'program_show',

    // correspondant à l'url /program/4

    return $this->redirectToRoute('program_show', ['id' => 4]);
}
}
