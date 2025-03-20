<?php

namespace App\Controller;

use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LightConesController extends AbstractController
{
    #[Route('/light-cones', name: 'app_light_cones')]
    public function index(): Response
    {
        return $this->render('light_cones/index.html.twig', [
            'controller_name' => 'LightConesController',
        ]);
    }

    #[Route('/characters/{slug}', name: 'character_show', methods: ['GET'])]
    public function show(string $slug, CharacterRepository $characterRepo): Response
    {
        $character = $characterRepo->findOneBy(['slug' => $slug]);
        if (!$character) {
            return $this->redirectToRoute('app_characters');
        } else {
            return $this->render('characters/character/show.html.twig', [
                'character' => $character
            ]);
        }
    }
}
