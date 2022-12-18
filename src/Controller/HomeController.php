<?php

namespace App\Controller;

use App\Service\Product_CMS;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Product_CMS $productCMS): Response
    {
        return $this->render('home/index.html.twig', [
            'products' => $productCMS->getProducts()
        ]);
    }
}
