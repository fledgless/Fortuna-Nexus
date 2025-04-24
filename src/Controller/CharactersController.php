<?php

namespace App\Controller;

use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CharactersController extends AbstractController
{
    #[Route('/characters', name: 'app_characters')]
    public function index(CharacterRepository $characterRepo): Response
    {
        return $this->render('characters/index.html.twig', [
            'characters' => $characterRepo->findAll(),
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

