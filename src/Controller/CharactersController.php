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
}
