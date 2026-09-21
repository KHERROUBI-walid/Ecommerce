<?php

namespace App\Entity;

use App\Repository\FormuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormuleRepository::class)]
class Formule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column]
    private ?bool $actif = null;

    /**
     * @var Collection<int, FormuleProduit>
     */
    #[ORM\OneToMany(targetEntity: FormuleProduit::class, mappedBy: 'formule', orphanRemoval: true)]
    private Collection $formulesProduit;

    public function __construct()
    {
        $this->formulesProduit = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): static
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * @return Collection<int, FormuleProduit>
     */
    public function getFormulesProduit(): Collection
    {
        return $this->formulesProduit;
    }

    public function addFormulesProduit(FormuleProduit $formulesProduit): static
    {
        if (!$this->formulesProduit->contains($formulesProduit)) {
            $this->formulesProduit->add($formulesProduit);
            $formulesProduit->setFormule($this);
        }

        return $this;
    }

    public function removeFormulesProduit(FormuleProduit $formulesProduit): static
    {
        if ($this->formulesProduit->removeElement($formulesProduit)) {
            // set the owning side to null (unless already changed)
            if ($formulesProduit->getFormule() === $this) {
                $formulesProduit->setFormule(null);
            }
        }

        return $this;
    }
}
