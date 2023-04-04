<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisProduitsType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function donnerAvis(Request $request, EntityManager $entityManager): Response
    {
        $avis= new Avis();
        $form = $this->createForm(AvisProduitsType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            

            $entityManager->persist($avis);
            $entityManager->flush();
      
        }

        
        return $this->render('avis/index.html.twig', [
            [
                'avisForm' => $form->createView(),
            ]
        ]);
    }
}
