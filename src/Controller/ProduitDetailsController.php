<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitDetailsController extends AbstractController
{
    #[Route('/produit/details', name: 'app_produit_details')]
    public function index(): Response
    {



        return $this->render('produit_details/index.html.twig', [
            
        ]);
    }

    #[Route('/produit/details/{id}',name:'app_produit_id')]

    public function ProduitDetailsId(Produit $id,Request $request):Response{
        
        return $this->render('produit_details/index.html.twig',[
                'produit'=>$id,
        ]);
    }
    
}
