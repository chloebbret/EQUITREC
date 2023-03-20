<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_user = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_user = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_user = null;

    #[ORM\Column(length: 20)]
    private ?string $mail_user = null;

    #[ORM\Column]
    private ?int $tel_user = null;

    #[ORM\Column(length: 20)]
    private ?string $login_user = null;

    #[ORM\Column(length: 15)]
    private ?string $pass_user = null;

    #[ORM\Column]
    private ?int $role_user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getNomUser(): ?string
    {
        return $this->nom_user;
    }

    public function setNomUser(string $nom_user): self
    {
        $this->nom_user = $nom_user;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->prenom_user;
    }

    public function setPrenomUser(string $prenom_user): self
    {
        $this->prenom_user = $prenom_user;

        return $this;
    }

    public function getMailUser(): ?string
    {
        return $this->mail_user;
    }

    public function setMailUser(string $mail_user): self
    {
        $this->mail_user = $mail_user;

        return $this;
    }

    public function getTelUser(): ?int
    {
        return $this->tel_user;
    }

    public function setTelUser(int $tel_user): self
    {
        $this->tel_user = $tel_user;

        return $this;
    }

    public function getLoginUser(): ?string
    {
        return $this->login_user;
    }

    public function setLoginUser(string $login_user): self
    {
        $this->login_user = $login_user;

        return $this;
    }

    public function getPassUser(): ?string
    {
        return $this->pass_user;
    }

    public function setPassUser(string $pass_user): self
    {
        $this->pass_user = $pass_user;

        return $this;
    }

    public function getRoleUser(): ?int
    {
        return $this->role_user;
    }

    public function setRoleUser(int $role_user): self
    {
        $this->role_user = $role_user;

        return $this;
    }
}
