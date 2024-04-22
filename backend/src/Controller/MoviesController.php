<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class MoviesController extends AbstractController
{
    public function __construct(
        private MovieRepository $movieRepository,
        private NormalizerInterface $normalizer
    ) {}

    #[Route('/movies', methods: ['GET'])]
    public function list(): JsonResponse
    {
        $movies = $this->movieRepository->findAll();
        $data = $this->normalizer->normalize($movies, null, ["groups" => "default"]);

        return new JsonResponse($data);
    }
}
