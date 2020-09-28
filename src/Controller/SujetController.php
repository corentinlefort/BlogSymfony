<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Message;
use App\Entity\Sujet;
use App\Form\SujetFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class SujetController extends AbstractController
{


    /**
     * @Route("/sujet/view/{id}", name="voirSujet")
     */
    public function view($id, EntityManagerInterface $em = null, Request $request = null) {
        $loggedUser = $this->getUser();
        if ($loggedUser != null) {
            $repository = $this->getDoctrine()->getRepository(Sujet::class);
            $sujet = $repository->find($id);
            $repository = $this->getDoctrine()->getRepository(Message::class);
            $messagesSujet = $repository->findBy(
                ['fkSujet'=>$id]
            );

            $form = $this->createFormBuilder()

                ->add('Corps', TextareaType::class, array( 'attr' => array('cols' => '100', 'rows' => '6')))
                ->getForm();
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();


                $corps = $data["Corps"];
                $fk_user = $loggedUser->getId();
                $date_now = new \DateTime(date('Y-m-d H:i:s'), new \DateTimeZone("Europe/Paris"));


                $message = new Message();
                $message->setFkUser($fk_user);
                $message->setDateCre($date_now);
                $message->setCorps($corps);
                $message->setFkSujet($id);
                $message->setPseudoUser($loggedUser->getUsername());
                $em->persist($message);
                $em->flush();

                $sujet->setDateMaj($date_now);
                $em->persist($sujet);
                $em->flush();
                return $this->redirect('/sujet/view/'.$id);
            }

            return $this->render('sujet/index.html.twig', [
                'sujet'=> $sujet,
                'messages'=> $messagesSujet,
                'reponseForm'=> $form->createView()
            ]);
        }
        else {
            $repository = $this->getDoctrine()->getRepository(Sujet::class);
            $sujet = $repository->findOneBy(
                ['id'=>$id]
            );
            $repository = $this->getDoctrine()->getRepository(Message::class);
            $messagesSujet = $repository->findBy(
                ['fkSujet'=>$id]
            );
            return $this->render('sujet/index.html.twig', [
                'sujet'=> $sujet,
                'messages'=> $messagesSujet
            ]);
        }

    }

    /**
     * @Route("/sujet/create", name="creerSujet")
     * @param EntityManagerInterface $em
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function create(EntityManagerInterface $em, Request $request) {
        $loggedUser = $this->getUser();
        if ($loggedUser != null) {


            $repository = $this->getDoctrine()->getRepository(Categorie::class);
            $categories = $repository->findAll();
            $form = $this->createFormBuilder()
                ->add('Titre')
                ->add('Categorie', ChoiceType::class,['choices'=> $categories,
                    'choice_value'=>'id',
                    'choice_label'=>'nom'
                ])
                ->add('Corps')
            ->getForm();
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();

                $titre = $data["Titre"];
                $categorie = $data["Categorie"]->getId();
                $corps = $data["Corps"];
                $fk_user = $loggedUser->getId();
                $date_now = new \DateTime(date('Y-m-d H:i:s'), new \DateTimeZone("Europe/Paris"));


                $sujet = new Sujet();
                $message = new Message();

                $sujet->setTitre($titre);
                $sujet->setFkCategorie($categorie);
                $sujet->setDateCre($date_now);
                $sujet->setDateMaj($date_now);
                $sujet->setFkUser($fk_user);

                $message->setFkUser($fk_user);
                $message->setCorps($corps);
                $message->setPseudoUser($loggedUser->getUsername());
                $message->setDateCre($date_now);

                $em->persist($sujet);
                $em->flush();

                $message->setFkSujet($sujet->getId());

                $em->persist($message);
                $em->flush();
                return $this->redirect('/sujet/view/'.$sujet->getId());
            }
            return $this->render('sujet/create.html.twig', [
                'sujetForm'=> $form->createView()
            ]);
        }
        else {
            return $this->render('sujet/create.html.twig', [

            ]);
        }

    } //créer un nouveau sujet, puis redirect dessus

}
