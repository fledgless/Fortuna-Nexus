<?php

namespace App\Entity;

use App\Repository\CharacterBuildRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterBuildRepository::class)]
class CharacterBuild
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $characterName = null;

    /**
     * @var Collection<int, Teammate>
     */
    #[ORM\OneToMany(targetEntity: Teammate::class, mappedBy: 'characterName')]
    private Collection $teammates;

    /**
     * @var Collection<int, RecommendedRelicSet>
     */
    #[ORM\OneToMany(targetEntity: RecommendedRelicSet::class, mappedBy: 'characterName')]
    private Collection $recommendedRelicSets;

    /**
     * @var Collection<int, RecommendedOrnamentSet>
     */
    #[ORM\OneToMany(targetEntity: RecommendedOrnamentSet::class, mappedBy: 'characterName')]
    private Collection $recommendedOrnamentSets;

    public function __construct()
    {
        $this->teammates = new ArrayCollection();
        $this->recommendedRelicSets = new ArrayCollection();
        $this->recommendedOrnamentSets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?Character
    {
        return $this->characterName;
    }

    public function setCharacterName(Character $characterName): static
    {
        $this->characterName = $characterName;

        return $this;
    }

    /**
     * @return Collection<int, Teammate>
     */
    public function getTeammates(): Collection
    {
        return $this->teammates;
    }

    public function addTeammate(Teammate $teammate): static
    {
        if (!$this->teammates->contains($teammate)) {
            $this->teammates->add($teammate);
            $teammate->setCharacterName($this);
        }

        return $this;
    }

    public function removeTeammate(Teammate $teammate): static
    {
        if ($this->teammates->removeElement($teammate)) {
            // set the owning side to null (unless already changed)
            if ($teammate->getCharacterName() === $this) {
                $teammate->setCharacterName(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RecommendedRelicSet>
     */
    public function getRecommendedRelicSets(): Collection
    {
        return $this->recommendedRelicSets;
    }

    public function addRecommendedRelicSet(RecommendedRelicSet $recommendedRelicSet): static
    {
        if (!$this->recommendedRelicSets->contains($recommendedRelicSet)) {
            $this->recommendedRelicSets->add($recommendedRelicSet);
            $recommendedRelicSet->setCharacterName($this);
        }

        return $this;
    }

    public function removeRecommendedRelicSet(RecommendedRelicSet $recommendedRelicSet): static
    {
        if ($this->recommendedRelicSets->removeElement($recommendedRelicSet)) {
            // set the owning side to null (unless already changed)
            if ($recommendedRelicSet->getCharacterName() === $this) {
                $recommendedRelicSet->setCharacterName(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RecommendedOrnamentSet>
     */
    public function getRecommendedOrnamentSets(): Collection
    {
        return $this->recommendedOrnamentSets;
    }

    public function addRecommendedOrnamentSet(RecommendedOrnamentSet $recommendedOrnamentSet): static
    {
        if (!$this->recommendedOrnamentSets->contains($recommendedOrnamentSet)) {
            $this->recommendedOrnamentSets->add($recommendedOrnamentSet);
            $recommendedOrnamentSet->setCharacterName($this);
        }

        return $this;
    }

    public function removeRecommendedOrnamentSet(RecommendedOrnamentSet $recommendedOrnamentSet): static
    {
        if ($this->recommendedOrnamentSets->removeElement($recommendedOrnamentSet)) {
            // set the owning side to null (unless already changed)
            if ($recommendedOrnamentSet->getCharacterName() === $this) {
                $recommendedOrnamentSet->setCharacterName(null);
            }
        }

        return $this;
    }
}
