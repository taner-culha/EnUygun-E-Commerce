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


class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart_page')]
    public function showAll(ProductRepository $productRepository): Response
    {
        $products = $productRepository;
        $products = $products->findBy(['id'=>1]);
        return $this->render('cart/index.html.twig', [
            'product' => $products,
        ]);
    } 

    #[Route('/cart/add', name: 'cart_add')]
    public function productAddSession(ProductRepository $productRepository , Request $request): Response
    {   
        $session = $this->get('session');

        if ($session->get('cart')) {
            $cart =  $session->get('cart');
        } else {
            $cart = [];
        }

        array_push($cart, $request->get('productId'));
        $session->set('cart', $cart);      
        return $this->redirect('/carts');
    } 

    #[Route('/carts', name: 'carts_page')]
    public function a(ProductRepository $productRepository , Request $request): Response
    {         
        $products=[];
        $session = $this->get('session'); 
        $i=0;
        foreach (array_count_values($session->get('cart'))  as $key => $value) {
            $product =$productRepository->findBy(['id'=>$key]);            
            array_push($products, $product[0]);           
            $products[$i]->quantity=$key;
            $i++;
        }
        $totalPrice=0.0;
        foreach($products as $product){
            $totalPrice = $totalPrice+$product->getProductPrice() * $product->quantity;
        } 
        return $this->render('cart/index.html.twig', [
            'product' => $products,
            'totalPrice'=>$totalPrice
        ]);     
    } 
}