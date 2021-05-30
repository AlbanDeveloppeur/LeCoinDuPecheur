<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Entity\Producteur;
use App\Form\ModifierRecetteType;
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
    public function accueil(RecetteRepository $recetteRepository, ProducteurRepository $producteurRepository): Response
    {
        $recettes = $recetteRepository->findAll();
        $producteurs = $producteurRepository->findAll();
        return $this->render('lcdpIndex/index.html.twig', [
            "recettes" => $recettes,
            "producteurs" => $producteurs,
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

    #[Route('/recettes/{id}', name: 'afficher_recette')]
    public function recettesId(Recette $recette): Response
    {
        return $this->render('lcdpRecette/afficher_recette.html.twig', [
            'recette' => $recette,
        ]);
    }

    #[Route('/recettes/importer_recette', name: 'importer_recette')]
    #[Route('/modifier_recette/{id}', name: 'modifier_recette')]
    public function modif_recette(Recette $recette=null, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        if(!$recette) {
            $recette = new Recette();
        }
        $form = $this->createForm(ModifierRecetteType::class, $recette);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $modif = $recette->getId() !==null;
            $entityManagerInterface->persist($recette);
            $entityManagerInterface->flush();
            
            $this->addFlash("Success", ($modif)?"La modification a été prise en compte.":"L'ajout de la recette a été prise en compte.");
            return $this->redirectToRoute("recettes");
        }
        return $this->render('lcdpRecette/modifier_recette.html.twig', [
            'recette' => $recette,
            'form' => $form->createView(),
            'isModif' => $recette->getId() !==null,
        ]);
    }

    #[Route('/producteurs/{id}', name: 'afficher_producteur')]
    public function producteursId(Producteur $producteur): Response
    {
        return $this->render('lcdpProducteur/afficher_producteur.html.twig', [
            'producteur' => $producteur,
        ]);
    }

    
    // #[Route('/importer_producteur', name: 'importer_producteur')]
    // #[Route('/modifier_producteur', name: 'modifier_producteur')]
    // public function modifier_producteur(): Response
    // {
    //     return $this->render('lcdp/index.html.twig', [
    //         'controller_name' => 'LcdpController',
    //     ]);
    // } 
}
