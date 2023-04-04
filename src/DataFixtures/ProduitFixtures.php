<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

       
            $produit=new Produit();
            $produit->setNomProduit("Nettoyant visage");
            $produit->setPrixProduit(15.99);
            $produit->setQuantite(1);
            $produit->setImages('images/skincare2.jpg');
            $manager->persist($produit);
            $manager->flush();

            $produit2=new Produit();
            $produit2->setNomProduit("Crème de jour visage ");
            $produit2->setPrixProduit(10.99);
            $produit2->setQuantite(2);
            $produit2->setImages('images/skincare.jpg');
            $manager->persist($produit2);
            $manager->flush();

            $produit3=new Produit();
            $produit3->setNomProduit("Serum visage ");
            $produit3->setPrixProduit(12.99);
            $produit3->setQuantite(2);
            $produit3->setImages('images/skincare3.jpg');
            $manager->persist($produit3);
            $manager->flush();

    }
  
      
    
}
