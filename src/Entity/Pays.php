<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $DateFormation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $DateFin = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbrHabitant = null;

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

    public function getDateFormation(): ?\DateTime
    {
        return $this->DateFormation;
    }

    public function setDateFormation(?\DateTime $DateFormation): static
    {
        $this->DateFormation = $DateFormation;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->DateFin;
    }

    public function setDateFin(?\DateTime $DateFin): static
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getNbrHabitant(): ?int
    {
        return $this->nbrHabitant;
    }

    public function setNbrHabitant(?int $nbrHabitant): static
    {
        $this->nbrHabitant = $nbrHabitant;

        return $this;
    }
}
