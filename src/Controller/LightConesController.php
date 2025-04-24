<?php

namespace App\Controller;

use App\Repository\LightConeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LightConesController extends AbstractController
{
    #[Route('/light-cones', name: 'app_light_cones')]
    public function index(LightConeRepository $lightConeRepo): Response
    {
        return $this->render('light_cones/index.html.twig', [
            'light_cones' => $lightConeRepo->findAll(),
        ]);
    }

    #[Route('/light-cones/{slug}', name: 'light_cone_show', methods: ['GET'])]
    public function show(string $slug, LightConeRepository $lightConeRepo): Response
    {
        $lightCone = $lightConeRepo->findOneBy(['slug' => $slug]);
        if (!$lightCone) {
            return $this->redirectToRoute('app_light_cones');
        } else {
            return $this->render('light_cones/light_cone/show.html.twig', [
                'light_cone' => $lightCone
            ]);
        }
    }
}
