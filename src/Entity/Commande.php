<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numeroCommande = null;

    #[ORM\Column(length: 255)]
    private ?string $modePaiement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCommande = null;

    #[ORM\Column(length: 255)]
    private ?string $modeLivraison = null;

    #[ORM\ManyToMany(targetEntity: DetailCommande::class, inversedBy: 'commandes')]
    private Collection $details;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'commandes')]
    private Collection $usercommande;

    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->usercommande = new ArrayCollection();
    }


  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCommande(): ?int
    {
        return $this->numeroCommande;
    }

    public function setNumeroCommande(int $numeroCommande): self
    {
        $this->numeroCommande = $numeroCommande;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->modePaiement;
    }

    public function setModePaiement(string $modePaiement): self
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getModeLivraison(): ?string
    {
        return $this->modeLivraison;
    }

    public function setModeLivraison(string $modeLivraison): self
    {
        $this->modeLivraison = $modeLivraison;

        return $this;
    }

    /**
     * @return Collection<int, DetailCommande>
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(DetailCommande $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details->add($detail);
        }

        return $this;
    }

    public function removeDetail(DetailCommande $detail): self
    {
        $this->details->removeElement($detail);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsercommande(): Collection
    {
        return $this->usercommande;
    }

    public function addUsercommande(User $usercommande): self
    {
        if (!$this->usercommande->contains($usercommande)) {
            $this->usercommande->add($usercommande);
        }

        return $this;
    }

    public function removeUsercommande(User $usercommande): self
    {
        $this->usercommande->removeElement($usercommande);

        return $this;
    }
}
