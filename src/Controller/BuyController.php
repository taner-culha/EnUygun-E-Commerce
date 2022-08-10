<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;

class BuyController extends AbstractController
{
    #[Route('/buy', name: 'buy_page')]
    public function buy(ProductRepository $productRepository , Request $request): Response
    {      
        return new Response("Total=  " .$request->get('totalPrice'). "₺". " The payment has been made." );                   
    }  
}