<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 2, scale: 1)]
    private ?string $notes = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $commentaire = null;

    #[ORM\OneToMany(mappedBy: 'avis', targetEntity: Produit::class)]
    private Collection $avisProduit;

    public function __construct()
    {
        $this->avisProduit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getAvisProduit(): Collection
    {
        return $this->avisProduit;
    }

    public function addAvisProduit(Produit $avisProduit): self
    {
        if (!$this->avisProduit->contains($avisProduit)) {
            $this->avisProduit->add($avisProduit);
            $avisProduit->setAvis($this);
        }

        return $this;
    }

    public function removeAvisProduit(Produit $avisProduit): self
    {
        if ($this->avisProduit->removeElement($avisProduit)) {
            // set the owning side to null (unless already changed)
            if ($avisProduit->getAvis() === $this) {
                $avisProduit->setAvis(null);
            }
        }

        return $this;
    }
}
