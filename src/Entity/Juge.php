<?php

namespace App\Entity;

use App\Repository\JugeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JugeRepository::class)]
class Juge
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
}
