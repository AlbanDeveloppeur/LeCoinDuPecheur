<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LcdpController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(): Response
    {
        return $this->render('lcdp/index.html.twig', [
            'accueil' => 'LcdpController',
        ]);
    }

    #[Route('/recettes', name: 'recettes')]
    public function recettes(): Response
    {
        return $this->render('lcdp/index.html.twig', [
            'controller_name' => 'LcdpController',
        ]);
    }

    #[Route('/producteurs', name: 'producteurs')]
    public function producteurs(): Response
    {
        return $this->render('lcdp/index.html.twig', [
            'controller_name' => 'LcdpController',
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
