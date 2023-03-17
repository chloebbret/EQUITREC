<?php

namespace App\Entity;

use App\Repository\EpreuveRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpreuveRepository::class)]
class Epreuve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_epreuve = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_epreuve = null;

    #[ORM\Column]
    private ?int $niveau = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEpreuve(): ?int
    {
        return $this->id_epreuve;
    }

    public function setIdEpreuve(int $id_epreuve): self
    {
        $this->id_epreuve = $id_epreuve;

        return $this;
    }

    public function getNomEpreuve(): ?string
    {
        return $this->nom_epreuve;
    }

    public function setNomEpreuve(string $nom_epreuve): self
    {
        $this->nom_epreuve = $nom_epreuve;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
}
