<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\CommandeUserFormType;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandePaiementController extends AbstractController
{
    #[Route('commande/paiement', name: 'app_commande_paiement')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $em=$doctrine->getManager();
        $rep=$em->getRepository(Commande::class);
        $arrayCommandePaiement=$rep->findAll();
        $vars=['arrayCommandePaiement'=>$arrayCommandePaiement];
        


        return $this->render('commande_Paiement/index.html.twig',$vars);
    }
}
