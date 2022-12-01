<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;


class CategoryController extends AbstractController
{

    #[Route('/category/', name: 'category_index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render(
            'category/index.html.twig',
            ['categories' => $categories,]
        );
    }

    #[Route('/category/{id}', methods: ['GET'], name: 'program_show')]
    public function new(): Response
    {

        // traitement d'un formulaire par exemple

        // redirection vers la page 'program_show',

        // correspondant à l'url /program/4

        return $this->redirectToRoute('category_show', ['id' => 4]);
    }
    
    #[Route('/show/{categoryName}', name: 'show')]

    public function show(string $categoryName, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy(['id' => $id]);

        if (!$category) {
            throw $this->createNotFoundException(
                'No program with id : ' . $categoryName . ' found in program\'s table.'
            );
        }
        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }
}
