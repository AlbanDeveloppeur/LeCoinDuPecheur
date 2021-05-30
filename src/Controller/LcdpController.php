<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Entity\Producteur;
use App\Repository\RecetteRepository;
use App\Repository\ProducteurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LcdpController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(RecetteRepository $recetteRepository, ProducteurRepository $producteurRepository): Response
    {
        $recettes = $recetteRepository->findAll();
        $producteurs = $producteurRepository->findAll();
        return $this->render('lcdp/index.html.twig', [
            'recettes' => $recettes,
            'producteurs' => $producteurs,
        ]);
    }

    #[Route('/recettes/{id}', name: 'afficher_recette')]
    public function recettesId(Recette $recette): Response
    {
        return $this->render('lcdp/afficher_recette.html.twig', [
            'recette' => $recette,
        ]);
    }

    #[Route('/producteurs/{id}', name: 'afficher_producteur')]
    public function producteursId(Producteur $producteur): Response
    {
        return $this->render('lcdp/afficher_producteur.html.twig', [
            'producteur' => $producteur,
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('lcdp/index.html.twig', [
            'accueil' => 'LcdpController',
        ]);
    }

    #[Route('/importer_recette', name: 'importer_recette')]
    public function importer_recette(): Response
    {
        return $this->render('lcdp/index.html.twig', [
            'controller_name' => 'LcdpController',
        ]);
    }

    #[Route('/modifier_recette', name: 'modifier_recette')]
    public function modifier_recette(): Response
    {
        return $this->render('lcdp/index.html.twig', [
            'controller_name' => 'LcdpController',
        ]);
    }

    #[Route('/importer_producteur', name: 'importer_producteur')]
    public function importer_producteur(): Response
    {
        return $this->render('lcdp/index.html.twig', [
            'controller_name' => 'LcdpController',
        ]);
    }

    #[Route('/modifier_producteur', name: 'modifier_producteur')]
    public function modifier_producteur(): Response
    {
        return $this->render('lcdp/index.html.twig', [
            'controller_name' => 'LcdpController',
        ]);
    }   
}
