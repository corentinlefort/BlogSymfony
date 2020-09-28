<?php

namespace App\Controller;

use App\Entity\Sujet;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Repository;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index()
    {

        return $this->render('accueil/index.html.twig', [

        ]);
    }
}
