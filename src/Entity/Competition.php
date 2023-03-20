<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_compet = null;

    #[ORM\Column(length: 20)]
    private ?string $nom_compet = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_compet = null;

    #[ORM\Column]
    private ?int $cp_compet = null;

    #[ORM\Column(length: 50)]
    private ?string $ville_compet = null;

    #[ORM\Column]
    private ?int $debut_compet = null;

    #[ORM\Column]
    private ?int $fin_compet = null;

    #[ORM\Column]
    private ?int $nb_epreuves = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCompet(): ?int
    {
        return $this->id_compet;
    }

    public function setIdCompet(int $id_compet): self
    {
        $this->id_compet = $id_compet;

        return $this;
    }

    public function getNomCompet(): ?string
    {
        return $this->nom_compet;
    }

    public function setNomCompet(string $nom_compet): self
    {
        $this->nom_compet = $nom_compet;

        return $this;
    }

    public function getAdrCompet(): ?string
    {
        return $this->adr_compet;
    }

    public function setAdrCompet(string $adr_compet): self
    {
        $this->adr_compet = $adr_compet;

        return $this;
    }

    public function getCpCompet(): ?int
    {
        return $this->cp_compet;
    }

    public function setCpCompet(int $cp_compet): self
    {
        $this->cp_compet = $cp_compet;

        return $this;
    }

    public function getVilleCompet(): ?string
    {
        return $this->ville_compet;
    }

    public function setVilleCompet(string $ville_compet): self
    {
        $this->ville_compet = $ville_compet;

        return $this;
    }

    public function getDebutCompet(): ?int
    {
        return $this->debut_compet;
    }

    public function setDebutCompet(int $debut_compet): self
    {
        $this->debut_compet = $debut_compet;

        return $this;
    }

    public function getFinCompet(): ?int
    {
        return $this->fin_compet;
    }

    public function setFinCompet(int $fin_compet): self
    {
        $this->fin_compet = $fin_compet;

        return $this;
    }

    public function getNbEpreuves(): ?int
    {
        return $this->nb_epreuves;
    }

    public function setNbEpreuves(int $nb_epreuves): self
    {
        $this->nb_epreuves = $nb_epreuves;

        return $this;
    }
}
