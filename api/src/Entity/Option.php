<?php

namespace App\Entity;

use App\Repository\OptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptionRepository::class)]
#[ORM\Table(name: '`option`')]
class Option
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prixSupplement = null;

    #[ORM\ManyToOne(inversedBy: 'options')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GroupeOption $groupeOption = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrixSupplement(): ?string
    {
        return $this->prixSupplement;
    }

    public function setPrixSupplement(string $prixSupplement): static
    {
        $this->prixSupplement = $prixSupplement;

        return $this;
    }

    public function getGroupeOption(): ?GroupeOption
    {
        return $this->groupeOption;
    }

    public function setGroupeOption(?GroupeOption $groupeOption): static
    {
        $this->groupeOption = $groupeOption;

        return $this;
    }
}
