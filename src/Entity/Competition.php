<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Nullable;


#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer", name: "id_competition")]
    private ?int $id_competition = null;

    #[ORM\Column(length: 20)]
    private ?string $nom_competition = null;

    #[ORM\Column(type: 'float')]
    private ?string $lat_competition = null;

    #[ORM\Column(type: 'float')]
    private ?string $lon_competition = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $debut_competition = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $fin_competition = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $nb_epreuves;

//    #[ORM\ManyToOne(targetEntity: Juges::class, inversedBy: "competition")]
//    #[ORM\JoinColumn(name: "id_juge", referencedColumnName: "id_juge", nullable: false)]
//    private $juges;

    #[ORM\OneToMany(mappedBy: 'competition', targetEntity: Competiteur::class)]
    #[ORM\JoinColumn(name: 'id_competition', referencedColumnName: 'id_competition')]
    private Collection $competiteurs;

    public function __construct()
    {
        $this->competiteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id_competition;
    }

    public function setId(int $id_competition): self
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

    public function getLatCompet(): ?float
    {
        return $this->lat_competition;
    }

    public function setLatCompet(float $lat_competition): self
    {
        $this->lat_competition = $lat_competition;

        return $this;
    }

    public function getLonCompet(): ?float
    {
        return $this->lon_competition;
    }

    public function setLonCompet(float $lon_competition): self
    {
        $this->lon_competition = $lon_competition;

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
