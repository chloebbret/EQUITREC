<?php

namespace App\Entity;

use App\Repository\ObstacleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObstacleRepository::class)]
class Obstacle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_obstacle = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_obstacle = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $materiaux_obstacles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdObstacle(): ?int
    {
        return $this->id_obstacle;
    }

    public function setIdObstacle(int $id_obstacle): self
    {
        $this->id_obstacle = $id_obstacle;

        return $this;
    }

    public function getNomObstacle(): ?string
    {
        return $this->nom_obstacle;
    }

    public function setNomObstacle(string $nom_obstacle): self
    {
        $this->nom_obstacle = $nom_obstacle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMateriauxObstacles(): ?string
    {
        return $this->materiaux_obstacles;
    }

    public function setMateriauxObstacles(string $materiaux_obstacles): self
    {
        $this->materiaux_obstacles = $materiaux_obstacles;

        return $this;
    }
}
