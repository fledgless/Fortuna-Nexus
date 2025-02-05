<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $rarity = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Path $path = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $iconFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $splashFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $miniatureFilename = null;

    #[ORM\Column]
    private ?bool $released = null;

    #[ORM\Column]
    private ?bool $announced = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $releaseDare = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Version $releaseVersion = null;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getRarity(): ?string
    {
        return $this->rarity;
    }

    public function setRarity(string $rarity): static
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getPath(): ?Path
    {
        return $this->path;
    }

    public function setPath(?Path $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getIconFilename(): ?string
    {
        return $this->iconFilename;
    }

    public function setIconFilename(?string $iconFilename): static
    {
        $this->iconFilename = $iconFilename;

        return $this;
    }

    public function getSplashFilename(): ?string
    {
        return $this->splashFilename;
    }

    public function setSplashFilename(?string $splashFilename): static
    {
        $this->splashFilename = $splashFilename;

        return $this;
    }

    public function getMiniatureFilename(): ?string
    {
        return $this->miniatureFilename;
    }

    public function setMiniatureFilename(?string $miniatureFilename): static
    {
        $this->miniatureFilename = $miniatureFilename;

        return $this;
    }

    public function isReleased(): ?bool
    {
        return $this->released;
    }

    public function setReleased(bool $released): static
    {
        $this->released = $released;

        return $this;
    }

    public function isAnnounced(): ?bool
    {
        return $this->announced;
    }

    public function setAnnounced(bool $announced): static
    {
        $this->announced = $announced;

        return $this;
    }

    public function getReleaseDare(): ?\DateTimeInterface
    {
        return $this->releaseDare;
    }

    public function setReleaseDare(?\DateTimeInterface $releaseDare): static
    {
        $this->releaseDare = $releaseDare;

        return $this;
    }

    public function getReleaseVersion(): ?Version
    {
        return $this->releaseVersion;
    }

    public function setReleaseVersion(?Version $releaseVersion): static
    {
        $this->releaseVersion = $releaseVersion;

        return $this;
    }
}
