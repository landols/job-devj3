<?php

namespace App\Controller;

use App\Repository\GenreRepository;
use App\Repository\MovieGenreRepository;
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
        private GenreRepository $genreRepository,
        private MovieGenreRepository $movieGenreRepository,
        private SerializerInterface $serializer
    ) {}

    #[Route('/movies', methods: ['GET'])]
    public function list(Request $request): JsonResponse
    {
        $sortBy = $request->query->get("sortBy", "newest");
        $genreId = $request->query->get("genreId");

        $findCriteria = [];
        $sortField = "";
        $sortDirection = "";

        if ($sortBy === "newest") {
            $sortField = "releaseDate";
            $sortDirection = "DESC";
        }
        elseif ($sortBy === "rating") {
            $sortField = "rating";
            $sortDirection = "DESC";
        }

        if (!empty($genreId)) {
            $movies = $this->movieRepository->findByGenre(
                $this->genreRepository->find($genreId),
                $sortField,
                $sortDirection
            );
        }
        else {
            $movies = $this->movieRepository->findBy($findCriteria, [$sortField => $sortDirection]);
        }

        $data = $this->serializer->serialize($movies, "json", ["groups" => "default"]);

        return new JsonResponse($data, json: true);
    }
}
