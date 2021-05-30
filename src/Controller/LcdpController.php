<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Entity\Producteur;
use App\Form\ModifierRecetteType;
use App\Repository\RecetteRepository;
use App\Repository\ProducteurRepository;
use Doctrine\Migrations\Tools\Console\ConsoleLogger;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Null_;
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
            'isModif' => $recette->getId() !==NULL,
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
    public function supprimerRecette(Recette $recette,  Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid("SUP".$recette->getId(),$request->get('_token'))) {
            $entityManager->remove($recette);
            $entityManager->flush();
            $this->addFlash('succes','La suppresion a été effectué');
            return $this->redirectToRoute('recettes');
        }
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
