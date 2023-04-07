<?php

namespace App\Entity;

use App\Repository\LogJugesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogJugesRepository::class)]
#[ORM\Table(name: "logJuges")]
class LogJuges
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id_connexion = null;

    #[ORM\Column]
    private ?int $id_user = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "id_user", referencedColumnName: "id_user", nullable: false)]
    private $user;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_connexion = null;

    public function getId(): ?int
    {
        return $this->id_connexion;
    }

    public function getUser(): ?Juges
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(?int $id_user): void
    {
        $this->id_user = $id_user;
    }



    public function getDateConnexion(): ?\DateTimeInterface
    {
        return $this->date_connexion;
    }

    public function setDateConnexion(\DateTimeInterface $date_connexion): self
    {
        $this->date_connexion = $date_connexion;
        return $this;
    }
}
