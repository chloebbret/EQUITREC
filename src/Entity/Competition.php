<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_competition = null;

    #[ORM\Column(length: 20)]
    private ?string $nom_competition = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_competition = null;

    #[ORM\Column]
    private ?int $cp_competition = null;

    #[ORM\Column(length: 50)]
    private ?string $ville_competition = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $debut_competition = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $fin_competition = null;

    #[ORM\Column]
    private ?int $nb_epreuves = null;

    #[ORM\ManyToOne(inversedBy: 'competition')]
    private ?Juges $juges = null;

    #[ORM\OneToMany(mappedBy: 'competition', targetEntity: Competiteur::class)]
    private Collection $competiteurs;

    public function __construct()
    {
        $this->competiteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCompet(): ?int
    {
        return $this->id_competition;
    }

    public function setIdCompet(int $id_competition): self
    {
        $this->id_competition = $id_competition;

        return $this;
    }

    public function getNomCompet(): ?string
    {
        return $this->nom_competition;
    }

    public function setNomCompet(string $nom_competition): self
    {
        $this->nom_competition = $nom_competition;

        return $this;
    }

    public function getAdrCompet(): ?string
    {
        return $this->adr_competition;
    }

    public function setAdrCompet(string $adr_competition): self
    {
        $this->adr_competition = $adr_competition;

        return $this;
    }

    public function getCpCompet(): ?int
    {
        return $this->cp_competition;
    }

    public function setCpCompet(int $cp_competition): self
    {
        $this->cp_competition = $cp_competition;

        return $this;
    }

    public function getVilleCompet(): ?string
    {
        return $this->ville_competition;
    }

    public function setVilleCompet(string $ville_competition): self
    {
        $this->ville_competition = $ville_competition;

        return $this;
    }

    public function getDebutCompet(): ?\DateTime
    {
        return $this->debut_competition;
    }

    public function setDebutCompet(\DateTime $debut_competition): self
    {
        $this->debut_competition = $debut_competition;

        return $this;
    }

    public function getFinCompet(): ?\DateTime
    {
        return $this->fin_competition;
    }

    public function setFinCompet(\DateTime $fin_competition): self
    {
        $this->fin_competition = $fin_competition;

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

    public function getJuges(): ?Juges
    {
        return $this->juges;
    }

    public function setJuges(?Juges $juges): self
    {
        $this->juges = $juges;

        return $this;
    }

    /**
     * @return Collection<int, Competiteur>
     */
    public function getCompetiteurs(): Collection
    {
        return $this->competiteurs;
    }

    public function addCompetiteur(Competiteur $competiteur): self
    {
        if (!$this->competiteurs->contains($competiteur)) {
            $this->competiteurs->add($competiteur);
            $competiteur->setCompetition($this);
        }

        return $this;
    }

    public function removeCompetiteur(Competiteur $competiteur): self
    {
        if ($this->competiteurs->removeElement($competiteur)) {
            // set the owning side to null (unless already changed)
            if ($competiteur->getCompetition() === $this) {
                $competiteur->setCompetition(null);
            }
        }

        return $this;
    }
}
