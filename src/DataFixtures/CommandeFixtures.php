<?php

namespace App\DataFixtures;

use App\Entity\Commande;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CommandeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $commande_paiement=new Commande();
        $commande_paiement->setModeLivraison("Bpost");
        $commande_paiement->setModePaiement("Paypal");
        $commande_paiement->setDateCommande(new DateTime);

        for ($i=0; $i <=3 ; $i++) { 
            $commande_paiement->setNumeroCommande($i);
        }
        $manager->persist($commande_paiement);
        $manager->flush();
    }
}
