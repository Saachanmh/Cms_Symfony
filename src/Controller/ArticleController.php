<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

     #[Route("/articles", name:"article")]

    public function index(): Response
    {
        // Logique pour récupérer les articles
        return $this->render('article/index.html.twig', [
            'articles' => [], // Passez les articles récupérés ici
        ]);
    }
}
