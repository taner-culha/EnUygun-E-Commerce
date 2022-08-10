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

class HomeController extends AbstractController
{
   /* private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }*/
    #[Route('/', name: 'home_page')]
    public function showAll(ProductRepository $productRepository): Response
    {
       /* $session = $this->requestStack->getSession();
        $id=$session->get('user_role');
        var_dump($id);exit;*/
        $products = $productRepository;
        $products = $products->findAll();
        return $this->render('home/index.html.twig', [
            'product' => $products,
           // 'id' => $id,
        ]);
    } 
}