<?php

namespace App\Entity;

use App\Repository\GroupeOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeOptionRepository::class)]
class GroupeOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?bool $obligatoire = null;

    #[ORM\Column]
    private ?bool $choixMultiple = null;

    #[ORM\Column]
    private ?int $minSelection = null;

    #[ORM\Column]
    private ?int $maxSelection = null;

    /**
     * @var Collection<int, Option>
     */
    #[ORM\OneToMany(targetEntity: Option::class, mappedBy: 'groupeOption', orphanRemoval: true)]
    private Collection $options;

    /**
     * @var Collection<int, Produit>
     */
    #[ORM\ManyToMany(targetEntity: Produit::class, mappedBy: 'groupesOptions')]
    private Collection $produits;

    public function __construct()
    {
        $this->options = new ArrayCollection();
        $this->produits = new ArrayCollection();
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

    public function isObligatoire(): ?bool
    {
        return $this->obligatoire;
    }

    public function setObligatoire(bool $obligatoire): static
    {
        $this->obligatoire = $obligatoire;

        return $this;
    }

    public function isChoixMultiple(): ?bool
    {
        return $this->choixMultiple;
    }

    public function setChoixMultiple(bool $choixMultiple): static
    {
        $this->choixMultiple = $choixMultiple;

        return $this;
    }

    public function getMinSelection(): ?int
    {
        return $this->minSelection;
    }

    public function setMinSelection(int $minSelection): static
    {
        $this->minSelection = $minSelection;

        return $this;
    }

    public function getMaxSelection(): ?int
    {
        return $this->maxSelection;
    }

    public function setMaxSelection(int $maxSelection): static
    {
        $this->maxSelection = $maxSelection;

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): static
    {
        if (!$this->options->contains($option)) {
            $this->options->add($option);
            $option->setGroupeOption($this);
        }

        return $this;
    }

    public function removeOption(Option $option): static
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getGroupeOption() === $this) {
                $option->setGroupeOption(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->addGroupesOption($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeGroupesOption($this);
        }

        return $this;
    }
}
