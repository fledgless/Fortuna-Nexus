<?php

namespace App\Entity;

use App\Repository\RecommendedRelicSetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecommendedRelicSetRepository::class)]
class RecommendedRelicSet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'recommendedRelicSets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CharacterBuild $characterName = null;

    /**
     * @var Collection<int, RelicSet>
     */
    #[ORM\ManyToMany(targetEntity: RelicSet::class, inversedBy: 'recommendedCharacters')]
    private Collection $relicSets;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column]
    private ?int $priority = null;

    public function __construct()
    {
        $this->relicSets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?CharacterBuild
    {
        return $this->characterName;
    }

    public function setCharacterName(?CharacterBuild $characterName): static
    {
        $this->characterName = $characterName;

        return $this;
    }

    /**
     * @return Collection<int, RelicSet>
     */
    public function getRelicSets(): Collection
    {
        return $this->relicSets;
    }

    public function addRelicSet(RelicSet $relicSet): static
    {
        if (!$this->relicSets->contains($relicSet)) {
            $this->relicSets->add($relicSet);
        }

        return $this;
    }

    public function removeRelicSet(RelicSet $relicSet): static
    {
        $this->relicSets->removeElement($relicSet);

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): static
    {
        $this->priority = $priority;

        return $this;
    }
}
