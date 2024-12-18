<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BrandsController extends AbstractController
{
    #[Route('/{slug}', name: 'app_brands')]
    public function index($slug, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBySlug($slug);


        return $this->render('brands/index.html.twig', [
            'brand' => $brand,
        ]);
    }
}
