<?php

namespace App\Entity;

use App\Repository\StatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatRepository::class)]
class Stat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filename = null;

    /**
     * @var Collection<int, CharacterKit>
     */
    #[ORM\ManyToMany(targetEntity: CharacterKit::class, mappedBy: 'substats')]
    private Collection $characterKits;

    public function __construct()
    {
        $this->characterKits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): static
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return Collection<int, CharacterKit>
     */
    public function getCharacterKits(): Collection
    {
        return $this->characterKits;
    }

    public function addCharacterKit(CharacterKit $characterKit): static
    {
        if (!$this->characterKits->contains($characterKit)) {
            $this->characterKits->add($characterKit);
            $characterKit->addSubstat($this);
        }

        return $this;
    }

    public function removeCharacterKit(CharacterKit $characterKit): static
    {
        if ($this->characterKits->removeElement($characterKit)) {
            $characterKit->removeSubstat($this);
        }

        return $this;
    }
}
