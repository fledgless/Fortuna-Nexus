<?php

namespace App\Controller;

use App\Repository\EchoOfWarDropRepository;
use App\Repository\EnemyDropsRepository;
use App\Repository\PathMaterialsRepository;
use App\Repository\StagnantShadowDropRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MaterialsController extends AbstractController
{
    #[Route('/materials', name: 'app_materials')]
    public function index(EnemyDropsRepository $enemyDropsRepo, StagnantShadowDropRepository $stagnantShadowDropRepo, PathMaterialsRepository $pathMaterialsRepo, EchoOfWarDropRepository $echoOfWarDropRepo): Response
    {
        return $this->render('materials/index.html.twig', [
            'enemyDrops' => $enemyDropsRepo->findAll(),
            'stagnantShadowDrops' => $stagnantShadowDropRepo->findAll(),
            'pathMaterials' => $pathMaterialsRepo->findAll(),
            'echoOfWarDrops' => $echoOfWarDropRepo->findAll()
        ]);
    }
}
