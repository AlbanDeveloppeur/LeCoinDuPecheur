<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RecettesFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $recette1 = new Recette();
        $recette1 -> setNom("NavPlat1")
                  -> setType("Salée")
                  -> setCategorie("Plat Principal")
                  -> setDifficulte("2")
                  -> setDescription("Lorem ipsum")
                  -> setPhoto("navPlat.jpg")
                  -> setPreparation("20")
                  -> setRepos("20")
                  -> setCuisson("30");
        $manager->persist($recette1);
        
        $recette2 = new Recette();
        $recette2 -> setNom("NavPlat2")
                  -> setType("Salée")
                  -> setCategorie("Plat Principal")
                  -> setDifficulte("2")
                  -> setDescription("Lorem ipsum")
                  -> setPhoto("navPlat.jpg")
                  -> setPreparation("10")
                  -> setRepos("30")
                  -> setCuisson("20");
        $manager->persist($recette2);

        
        $recette3 = new Recette();
        $recette3 -> setNom("NavPlat3")
                  -> setType("Salée")
                  -> setCategorie("Plat Principal")
                  -> setDifficulte("2")
                  -> setDescription("Lorem ipsum")
                  -> setPhoto("navPlat.jpg")
                  -> setPreparation("50")
                  -> setRepos("60")
                  -> setCuisson("10");
        $manager->persist($recette3);

        $recette4 = new Recette();
        $recette4 -> setNom("NavPlat4")
                  -> setType("Salée")
                  -> setCategorie("Plat Principal")
                  -> setDifficulte("2")
                  -> setDescription("Lorem ipsum")
                  -> setPhoto("navPlat.jpg")
                  -> setPreparation("120")
                  -> setRepos("60")
                  -> setCuisson("30");
        $manager->persist($recette4);

        $recette5 = new Recette();
        $recette5 -> setNom("NavPlat5")
                  -> setType("Salée")
                  -> setCategorie("Plat Principal")
                  -> setDifficulte("2")
                  -> setDescription("Lorem ipsum")
                  -> setPhoto("navPlat.jpg")
                  -> setPreparation("10")
                  -> setRepos("5")
                  -> setCuisson("60");
        $manager->persist($recette5);

        $recette6 = new Recette();
        $recette6 -> setNom("NavPlat6")
                  -> setType("Salée")
                  -> setCategorie("Plat Principal")
                  -> setDifficulte("2")
                  -> setDescription("Lorem ipsum")
                  -> setPhoto("navPlat.jpg")
                  -> setPreparation("80")
                  -> setRepos("60")
                  -> setCuisson("40");
        $manager->persist($recette6);

        $manager->flush();
    }
}
