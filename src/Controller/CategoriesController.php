<?php

namespace App\Controller;

use App\Entity\Sujet;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(Categorie::class);
        $categories = $repository->findAll();

        return $this->render('categories/index.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/categories/{id}", name="categorie")
     */
    public function sujetsPourCategorie($id)
    {
        $repository = $this->getDoctrine()->getRepository(Sujet::class);
        $sujets = $repository->findBy(
            ['fkCategorie'=>$id]
        );

        return $this->render('categories/sujets.html.twig', [
            'sujets' => $sujets
        ]);
    }
}
