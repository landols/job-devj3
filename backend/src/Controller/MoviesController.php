<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class MoviesController extends AbstractController
{
    public function __construct(
        private MovieRepository $movieRepository,
        private SerializerInterface $serializer
    ) {}

    #[Route('/movies', methods: ['GET'])]
    public function list(Request $request): JsonResponse
    {
        $sortBy = $request->query->get("sortBy", "newest");

        if ($sortBy === "newest") {
            $sortCriteria = ["releaseDate" => "DESC"];
        }
        elseif ($sortBy === "rating") {
            $sortCriteria = ["rating" => "DESC"];
        }

        $movies = $this->movieRepository->findBy([], $sortCriteria);
        $data = $this->serializer->serialize($movies, "json", ["groups" => "default"]);

        return new JsonResponse($data, json: true);
    }
}
