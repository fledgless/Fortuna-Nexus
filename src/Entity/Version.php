<?php

namespace App\Entity;

use App\Repository\VersionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VersionRepository::class)]
class Version
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $patch = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filename = null;

    /**
     * @var Collection<int, Character>
     */
    #[ORM\OneToMany(targetEntity: Character::class, mappedBy: 'releaseVersion')]
    private Collection $characters;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endDate = null;

    /**
     * @var Collection<int, LightCone>
     */
    #[ORM\OneToMany(targetEntity: LightCone::class, mappedBy: 'releaseVersion')]
    private Collection $lightCones;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->lightCones = new ArrayCollection();
    }

    public function __toString()
    {
        $name = strval($this->patch) . " - " . $this->name;
        return $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatch(): ?float
    {
        return $this->patch;
    }

    public function setPatch(float $patch): static
    {
        $this->patch = $patch;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

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
     * @return Collection<int, Character>
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): static
    {
        if (!$this->characters->contains($character)) {
            $this->characters->add($character);
            $character->setReleaseVersion($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getReleaseVersion() === $this) {
                $character->setReleaseVersion(null);
            }
        }

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return Collection<int, LightCone>
     */
    public function getLightCones(): Collection
    {
        return $this->lightCones;
    }

    public function addLightCone(LightCone $lightCone): static
    {
        if (!$this->lightCones->contains($lightCone)) {
            $this->lightCones->add($lightCone);
            $lightCone->setReleaseVersion($this);
        }

        return $this;
    }

    public function removeLightCone(LightCone $lightCone): static
    {
        if ($this->lightCones->removeElement($lightCone)) {
            // set the owning side to null (unless already changed)
            if ($lightCone->getReleaseVersion() === $this) {
                $lightCone->setReleaseVersion(null);
            }
        }

        return $this;
    }
}
