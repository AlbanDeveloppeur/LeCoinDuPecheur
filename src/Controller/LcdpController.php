<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Entity\Producteur;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Entity\EmailNewLetters;
use App\Form\ModifierRecetteType;
use App\Form\ModifierProducteurType;
use App\Repository\RecetteRepository;
use App\Repository\ProducteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LcdpController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(RecetteRepository $recetteRepository, ProducteurRepository $producteurRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $recettes = $recetteRepository->findAll();
        $producteurs = $producteurRepository->findAll();
        $emailNewLetters = new EmailNewLetters();
        $form = $this->createFormBuilder($emailNewLetters)
            ->add('email')
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($emailNewLetters);
            $entityManager->flush();
            return $this->redirectToRoute("accueil");
        }
        
        return $this->render('lcdpIndex/index.html.twig', [
            "recettes" => $recettes,
            "producteurs" => $producteurs,
            'form' => $form->createView(),
        ]);
    }
    
    #[Route('/recettes', name: 'recettes')]
    public function recettes(RecetteRepository $recetteRepository): Response
    {
        $recettes = $recetteRepository->findAll();
        return $this->render('lcdpRecette/recettes.html.twig', [
            "recettes" => $recettes,
        ]);
    }

    #[Route('/recettes/ajouter_recette', name: "ajouter_recette")]
    #[Route('/modifier_recette/{id}', name: "modifier_recette")]
    public function modificationRecette(Recette $recette=null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($recette == null) {
            $recette = new Recette();
        }
        $form = $this->createForm(ModifierRecetteType::class, $recette);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($recette);
            $entityManager->flush();
            $this->addFlash("Success","La modification a été prise en compte.");
            return $this->redirectToRoute("recettes");
        }

        return $this->render('lcdpRecette/modifier_recette.html.twig', [
            "recette" => $recette,
            'form' => $form->createView(),
            'isModif' => $recette->getId() !==null,
        ]);
    }
    
    #[Route('/recettes/{id}', name: 'afficher_recette')]
    public function afficherRecette(Recette $recette): Response
    {
        return $this->render('lcdpRecette/afficher_recette.html.twig', [
            'recette' => $recette,
        ]);
    }

    #[Route('/supprimer_recette/{id}', name: 'supprimer_recette')]
    public function supprimerRecette(Recette $recette, Request $request, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($recette);
        $entityManager->flush();
        $this->addFlash('succes','La suppresion a été effectué');
        return $this->redirectToRoute('recettes');
    } 



    #[Route('/producteurs', name: 'producteurs')]
    public function producteurs(ProducteurRepository $producteurRepository): Response
    {
        $producteurs = $producteurRepository->findAll();    
        return $this->render('lcdpProducteur/producteurs.html.twig', [
            "producteurs" => $producteurs,  
        ]);
    }

    #[Route('/producteurs/ajouter_producteur', name: "ajouter_producteur")]
    #[Route('/modifier_producteur/{id}', name: "modifier_producteur")]
    public function modificationProducteur(producteur $producteur=null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($producteur == null) {
            $producteur = new Producteur();
        }
        $form = $this->createForm(ModifierProducteurType::class, $producteur);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($producteur);
            $entityManager->flush();
            $this->addFlash("Success","La modification a été prise en compte.");
            return $this->redirectToRoute("producteurs");
        }

        return $this->render('lcdpProducteur/modifier_producteur.html.twig', [
            "producteur" => $producteur,
            'form' => $form->createView(),
            'isModif' => $producteur->getId() !==null,
        ]);
    }

    #[Route('/producteurs/{id}', name: 'afficher_producteur')]
    public function afficherProduteur(Producteur $producteur): Response
    {
        return $this->render('lcdpProducteur/afficher_producteur.html.twig', [
            'producteur' => $producteur,
        ]);
    }

    #[Route('/supprimer_producteur/{id}', name: 'supprimer_producteur')]
    public function supprimerProducteur(Producteur $producteur,  Request $request, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($producteur);
        $entityManager->flush();
        $this->addFlash('succes','La suppresion a été effectué');
        return $this->redirectToRoute('producteurs');
    }

    #[Route('/reservation', name: "reservation")]
    public function reservationId(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();
            $this->addFlash("Success","La modification a été prise en compte.");
            return $this->redirectToRoute("comfirmation");
        }

        return $this->render('lcdpForm/reservation.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/comfirmation', name: 'comfirmation')]
    public function comfirm(): Response
    {
        return $this->render('lcdpForm/comfirm.html.twig', [
        ]);
    }
    
}
