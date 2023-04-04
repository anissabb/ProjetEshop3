<?php

namespace App\Controller;

use App\Repository\ProduitRepository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    #[Route('/panier', name: 'app_cart')]


    public function index(SessionInterface $session, ProduitRepository  $ProduitRepository)
    {
        $panier=$session->get('panier',[]);
        $panierwithData=[];

        foreach($panier as $id=>$quantity){
            $panierwithData[]=[
                'produit'=>$ProduitRepository->find($id),
                'quantity'=>$quantity
            ];
    }
    

        

        //total produit


     $total=0;
     foreach ($panierwithData as $item) {
        $totalItem=$item['produit']->getPrixProduit()*$item['quantity'];
       $total+=$totalItem;

     }

        return $this->render('cart/index.html.twig',[
            'items'=>$panierwithData,
            'total'=>$total
        ]);
    }




    #[Route('/panier/add/{id}',name:"cart_add")]

    public function add($id,SessionInterface $session ){
    
        $panier=$session->get('panier',[]);

        if(!empty($panier[$id])){
            $panier[$id]++;

        }
        else{
            $panier[$id]=1;
        }
        
        $session->set('panier',$panier);
        return $this->redirectToRoute("app_cart");

    }

    #[Route('/panier/remove/{id}',name:"cart_remove")]
    public function remove($id, SessionInterface $session){
        
        $panier=$session->get('panier',[]);
        if(!empty($panier[$id]>1)){
                
            $panier[$id]--;

            
        }
        else{
            unset($panier[$id]);
        }
        $session->set('panier',$panier);
        return $this->redirectToRoute("app_cart");
    }
}
