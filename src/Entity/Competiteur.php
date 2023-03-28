<?php

namespace App\Entity;

use App\Repository\CompetiteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetiteurRepository::class)]
class Competiteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_competiteur = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_competiteur = null;

    #[ORM\Column]
    private ?int $niveau_competiteur = null;

    #[ORM\Column]
    private ?int $num_licence = null;

    #[ORM\Column]
    private ?float $notes_competiteur = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCompetiteur(): ?int
    {
        return $this->id_competiteur;
    }

    public function setIdCompetiteur(int $id_competiteur): self
    {
        $this->id_competiteur = $id_competiteur;

        return $this;
    }

    public function getNomCompetiteur(): ?string
    {
        return $this->nom_competiteur;
    }

    public function setNomCompetiteur(string $nom_competiteur): self
    {
        $this->nom_competiteur = $nom_competiteur;

        return $this;
    }

    public function getPrenomCompetiteur(): ?string
    {
        return $this->prenom_competiteur;
    }

    public function setPrenomCompetiteur(string $prenom_competiteur): self
    {
        $this->prenom_competiteur = $prenom_competiteur;

        return $this;
    }

    public function getNiveauCompetiteur(): ?int
    {
        return $this->niveau_competiteur;
    }

    public function setNiveauCompetiteur(int $niveau_competiteur): self
    {
        $this->niveau_competiteur = $niveau_competiteur;

        return $this;
    }

    public function getNumLicence(): ?int
    {
        return $this->num_licence;
    }

    public function setNumLicence(int $num_licence): self
    {
        $this->num_licence = $num_licence;

        return $this;
    }

    public function getNotesCompetiteur(): ?float
    {
        return $this->notes_competiteur;
    }

    public function setNotesCompetiteur(?float $notes_competiteur): void
    {
        $this->notes_competiteur = $notes_competiteur;
    }
}
