<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
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
    private ?int $stock = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column]
    private ?bool $actif = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $vendeur = null;

    /**
     * @var Collection<int, Categorie>
     */
    #[ORM\ManyToMany(targetEntity: Categorie::class, mappedBy: 'produits')]
    private Collection $categories;

    /**
     * @var Collection<int, LignePanier>
     */
    #[ORM\OneToMany(targetEntity: LignePanier::class, mappedBy: 'produit')]
    private Collection $lignesPanier;

    /**
     * @var Collection<int, LigneCommande>
     */
    #[ORM\OneToMany(targetEntity: LigneCommande::class, mappedBy: 'produit')]
    private Collection $lignesCommande;

    /**
     * @var Collection<int, MouvementStock>
     */
    #[ORM\OneToMany(targetEntity: MouvementStock::class, mappedBy: 'produit')]
    private Collection $mouvementsStock;

    /**
     * @var Collection<int, GroupeOption>
     */
    #[ORM\ManyToMany(targetEntity: GroupeOption::class, inversedBy: 'produits')]
    private Collection $groupesOptions;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->lignesPanier = new ArrayCollection();
        $this->lignesCommande = new ArrayCollection();
        $this->mouvementsStock = new ArrayCollection();
        $this->groupesOptions = new ArrayCollection();
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

    public function setDescription(?string $description): static
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

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

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

    public function getVendeur(): ?User
    {
        return $this->vendeur;
    }

    public function setVendeur(?User $vendeur): static
    {
        $this->vendeur = $vendeur;

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addProduit($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): static
    {
        if ($this->categories->removeElement($category)) {
            $category->removeProduit($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, LignePanier>
     */
    public function getLignesPanier(): Collection
    {
        return $this->lignesPanier;
    }

    public function addLignesPanier(LignePanier $lignesPanier): static
    {
        if (!$this->lignesPanier->contains($lignesPanier)) {
            $this->lignesPanier->add($lignesPanier);
            $lignesPanier->setProduit($this);
        }

        return $this;
    }

    public function removeLignesPanier(LignePanier $lignesPanier): static
    {
        if ($this->lignesPanier->removeElement($lignesPanier)) {
            // set the owning side to null (unless already changed)
            if ($lignesPanier->getProduit() === $this) {
                $lignesPanier->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LigneCommande>
     */
    public function getLignesCommande(): Collection
    {
        return $this->lignesCommande;
    }

    public function addLignesCommande(LigneCommande $lignesCommande): static
    {
        if (!$this->lignesCommande->contains($lignesCommande)) {
            $this->lignesCommande->add($lignesCommande);
            $lignesCommande->setProduit($this);
        }

        return $this;
    }

    public function removeLignesCommande(LigneCommande $lignesCommande): static
    {
        if ($this->lignesCommande->removeElement($lignesCommande)) {
            // set the owning side to null (unless already changed)
            if ($lignesCommande->getProduit() === $this) {
                $lignesCommande->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MouvementStock>
     */
    public function getMouvementsStock(): Collection
    {
        return $this->mouvementsStock;
    }

    public function addMouvementsStock(MouvementStock $mouvementsStock): static
    {
        if (!$this->mouvementsStock->contains($mouvementsStock)) {
            $this->mouvementsStock->add($mouvementsStock);
            $mouvementsStock->setProduit($this);
        }

        return $this;
    }

    public function removeMouvementsStock(MouvementStock $mouvementsStock): static
    {
        if ($this->mouvementsStock->removeElement($mouvementsStock)) {
            // set the owning side to null (unless already changed)
            if ($mouvementsStock->getProduit() === $this) {
                $mouvementsStock->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GroupeOption>
     */
    public function getGroupesOptions(): Collection
    {
        return $this->groupesOptions;
    }

    public function addGroupesOption(GroupeOption $groupesOption): static
    {
        if (!$this->groupesOptions->contains($groupesOption)) {
            $this->groupesOptions->add($groupesOption);
        }

        return $this;
    }

    public function removeGroupesOption(GroupeOption $groupesOption): static
    {
        $this->groupesOptions->removeElement($groupesOption);

        return $this;
    }
}
