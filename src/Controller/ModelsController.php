<?php

namespace App\Controller;

use App\Repository\ModelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ModelsController extends AbstractController
{
    #[Route('/{model}/{slug}', name: 'app_models')]
    public function index($slug, ModelsRepository $modelsRepository): Response
    {
        $model = $modelsRepository->findOneBySlug($slug);

        return $this->render('models/index.html.twig', [
            'model' => $model,
        ]);
    }
}
