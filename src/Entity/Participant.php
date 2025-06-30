<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipantRepository::class)]
class Participant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $DateNaiss = null;

    #[ORM\Column(length: 255)]
    private ?string $Nationnalite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDateNaiss(): ?\DateTime
    {
        return $this->DateNaiss;
    }

    public function setDateNaiss(?\DateTime $DateNaiss): static
    {
        $this->DateNaiss = $DateNaiss;

        return $this;
    }

    public function getNationnalite(): ?string
    {
        return $this->Nationnalite;
    }

    public function setNationnalite(string $Nationnalite): static
    {
        $this->Nationnalite = $Nationnalite;

        return $this;
    }
}
