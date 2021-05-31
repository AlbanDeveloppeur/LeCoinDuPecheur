<?php

namespace App\DataFixtures;

use App\Entity\Producteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProducteursFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $producteur1 = new Producteur();
        $producteur1 -> setNom("Marchal")
                     -> setPrenom("Denis")
                     -> setMetier("Marécher")
                     -> setDescription("Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum")
                     -> setPhoto("navProductMaraicher.png")
                     -> setIllustration1("illustrationContent.jpg")
                     -> setIllustration2("illustrationContent.jpg");
        $manager->persist($producteur1);

        $producteur2 = new Producteur();
        $producteur2 -> setNom("Broque")
                     -> setPrenom("Françcois")
                     -> setMetier("Poissonier")
                     -> setDescription("Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum")
                     -> setPhoto("navProductPoissonier.png")
                     -> setIllustration1("illustrationContent.jpg")
                     -> setIllustration2("illustrationContent.jpg");
        $manager->persist($producteur2);

        $producteur3 = new Producteur();
        $producteur3 -> setNom("Olivier")
                     -> setPrenom("Antony")
                     -> setMetier("Traiteur")
                     -> setDescription("Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum")
                     -> setPhoto("navProductTraiteur.png")
                     -> setIllustration1("illustrationContent.jpg")
                     -> setIllustration2("illustrationContent.jpg");
        $manager->persist($producteur3);

        $manager->flush();
    }
}
