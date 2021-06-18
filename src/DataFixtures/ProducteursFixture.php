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
                     -> setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
                     -> setPhoto("navProductMaraicher.png")
                     -> setIllustration1("illustrationContent.jpg")
                     -> setIllustration2("illustrationContent.jpg");
        $manager->persist($producteur1);

        $producteur2 = new Producteur();
        $producteur2 -> setNom("Broque")
                     -> setPrenom("Françcois")
                     -> setMetier("Poissonier")
                     -> setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
                     -> setPhoto("navProductPoissonier.png")
                     -> setIllustration1("illustrationContent.jpg")
                     -> setIllustration2("illustrationContent.jpg");
        $manager->persist($producteur2);

        $producteur3 = new Producteur();
        $producteur3 -> setNom("Olivier")
                     -> setPrenom("Antony")
                     -> setMetier("Traiteur")
                     -> setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
                     -> setPhoto("navProductTraiteur.png")
                     -> setIllustration1("illustrationContent.jpg")
                     -> setIllustration2("illustrationContent.jpg");
        $manager->persist($producteur3);

        $manager->flush();
    }
}
