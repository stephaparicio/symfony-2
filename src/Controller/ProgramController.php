<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use App\Repository\ProgramRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;


class ProgramController extends AbstractController
{

    #[Route('/program/', name: 'program_index')]
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findAll();
        return $this->render(
            'program/index.html.twig',
            ['programs' => $programs,]
        );
    }

    #[Route('/program/{id}', methods: ['GET'], name: 'program_show')]
    public function new(): Response
    {

        // traitement d'un formulaire par exemple

        // redirection vers la page 'program_show',

        // correspondant à l'url /program/4

        return $this->redirectToRoute('program_show', ['id' => 4]);
    }
    
    #[Route('/show/{id<^[0-9]+$>}', name: 'show')]
    public function show(int $id, ProgramRepository $programRepository): Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);

        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : ' . $id . ' found in program\'s table.'
            );
        }
        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }
}
