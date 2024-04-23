<?php

namespace App\Controller;

use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CategoriesController extends AbstractController
{
    public function __construct(
        private GenreRepository $genreRepository,
        private SerializerInterface $serializer
    ) {}

    #[Route('/genres', methods: ['GET'])]
    public function list(): JsonResponse
    {
        $movies = $this->genreRepository->findBy([], ["name" => "ASC"]);
        $data = $this->serializer->serialize($movies, "json", ["groups" => "default"]);

        return new JsonResponse($data, json: true);
    }
}
