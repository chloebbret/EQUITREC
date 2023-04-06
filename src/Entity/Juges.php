<?php

namespace App\Entity;

use App\Repository\JugeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JugeRepository::class)]
class Juges
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_juge = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_juge = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_juge = null;

    #[ORM\Column]
    private ?int $tel_juge = null;

    #[ORM\Column(length: 50)]
    private ?string $mail_juge = null;

    #[ORM\Column(length: 20)]
    private ?string $login_juge = null;

    #[ORM\Column(length: 15)]
    private ?string $pass_juge = null;

    #[ORM\OneToMany(targetEntity: Competition::class, mappedBy: "juges")]
    private Collection $competition;

    #[ORM\OneToMany(targetEntity: LogJuges::class, mappedBy: "logJuges")]
    private Collection $log;


    public function __construct()
    {
        $this->competition = new ArrayCollection();
        $this->log = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdJuge(): ?int
    {
        return $this->id_juge;
    }

    public function setIdJuge(int $id_juge): self
    {
        $this->id_juge = $id_juge;

        return $this;
    }

    public function getNomJuge(): ?string
    {
        return $this->nom_juge;
    }

    public function setNomJuge(string $nom_juge): self
    {
        $this->nom_juge = $nom_juge;

        return $this;
    }

    public function getPrenomJuge(): ?string
    {
        return $this->prenom_juge;
    }

    public function setPrenomJuge(string $prenom_juge): self
    {
        $this->prenom_juge = $prenom_juge;

        return $this;
    }

    public function getTelJuge(): ?int
    {
        return $this->tel_juge;
    }

    public function setTelJuge(int $tel_juge): self
    {
        $this->tel_juge = $tel_juge;

        return $this;
    }

    public function getMailJuge(): ?string
    {
        return $this->mail_juge;
    }

    public function setMailJuge(string $mail_juge): self
    {
        $this->mail_juge = $mail_juge;

        return $this;
    }

    public function getLoginJuge(): ?string
    {
        return $this->login_juge;
    }

    public function setLoginJuge(string $login_juge): self
    {
        $this->login_juge = $login_juge;

        return $this;
    }

    public function getPassJuge(): ?string
    {
        return $this->pass_juge;
    }

    public function setPassJuge(string $pass_juge): self
    {
        $this->pass_juge = $pass_juge;

        return $this;
    }

    /**
     * @return Collection<int, Competition>
     */
    public function getCompetition(): Collection
    {
        return $this->competition;
    }


    /**
     * @return Collection|LogJuges[]
     */
    public function getLog(): Collection
    {
        return $this->log;
    }

    public function addCompetition(Competition $competition): self
    {
        if (!$this->competition->contains($competition)) {
            $this->competition->add($competition);
            $competition->setJuges($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->competition->removeElement($competition)) {
            // set the owning side to null (unless already changed)
            if ($competition->getJuges() === $this) {
                $competition->setJuges(null);
            }
        }

        return $this;
    }
}
