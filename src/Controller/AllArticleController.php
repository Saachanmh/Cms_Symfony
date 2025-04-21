<?php
// src/Controller/AllArticleController.php
namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllArticleController extends AbstractController
{
    #[Route("/articles", name:"articles")]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $articles = $entityManager->getRepository(Article::class)->findAll();

        dump($articles); // Affichera les données dans le profiler Symfony (barre de debug)

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }}
