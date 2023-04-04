<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisProduitsType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AvisProduitsController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function Avis(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis= new Avis();
        $form = $this->createForm(AvisProduitsType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            

            $entityManager->persist($avis);
            $entityManager->flush();
      
        }

        
        return $this->render('avis_produits/index.html.twig', [
            
                'AvisForm' => $form->createView(),
            
        ]);
    }
}
