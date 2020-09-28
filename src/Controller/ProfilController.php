<?php

namespace App\Controller;

use App\Entity\Message;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index()
    {
        $loggedUser = $this->getUser();
        if ($loggedUser != null) {
            $repository = $this->getDoctrine()->getRepository(Message::class);
            $messages = $repository->findBy(
                ['pseudoUser'=>$loggedUser->getUsername()]
            );
            $nbMessages = sizeof($messages);
            return $this->render('profil/index.html.twig', [
                'nbMsg'=>$nbMessages,
                'dateInscription'=>$loggedUser->getDateCre()
            ]);
        }
        else {
            return $this->render('profil/index.html.twig', [

            ]);
        }

    }
}
