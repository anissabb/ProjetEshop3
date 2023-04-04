<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Doctrine\ManagerRegistry as DoctrineManagerRegistry;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function Accueil(ManagerRegistry $doctrine ): Response
    {

        $em=$doctrine->getManager();
        $rep=$em->getRepository(Produit::class);
        $arrayProduits=$rep->findAll();
        $vars=['arrayProduits'=>$arrayProduits];
        
      
        

        return $this->render('accueil/index.html.twig',$vars);
    }


}
