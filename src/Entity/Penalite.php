<?php

namespace App\Entity;

use App\Repository\PenaliteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PenaliteRepository::class)]
class Penalite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_penalite = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_penalite = null;

    #[ORM\Column(length: 50)]
    private ?string $descripton = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPenalite(): ?int
    {
        return $this->id_penalite;
    }

    public function setIdPenalite(int $id_penalite): self
    {
        $this->id_penalite = $id_penalite;

        return $this;
    }

    public function getNomPenalite(): ?string
    {
        return $this->nom_penalite;
    }

    public function setNomPenalite(string $nom_penalite): self
    {
        $this->nom_penalite = $nom_penalite;

        return $this;
    }

    public function getDescripton(): ?string
    {
        return $this->descripton;
    }

    public function setDescripton(string $descripton): self
    {
        $this->descripton = $descripton;

        return $this;
    }
}
