<?php

namespace App\Entity;

use App\Repository\MovieActorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieActorRepository::class)]
#[ORM\Table('movies_actors')]
class MovieActor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'movieActors')]
    private ?Movie $movie = null;

    #[ORM\ManyToOne]
    private ?Actor $actor = null;

    #[ORM\Column]
    private ?bool $star = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): static
    {
        $this->movie = $movie;

        return $this;
    }

    public function getActor(): ?Actor
    {
        return $this->actor;
    }

    public function setActor(?Actor $actor): static
    {
        $this->actor = $actor;

        return $this;
    }

    public function isStar(): ?bool
    {
        return $this->star;
    }

    public function setStar(bool $star): static
    {
        $this->star = $star;

        return $this;
    }
}
