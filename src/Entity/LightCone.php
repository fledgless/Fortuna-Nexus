<?php

namespace App\Entity;

use App\Repository\LightConeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LightConeRepository::class)]
class LightCone
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

    #[ORM\ManyToOne(inversedBy: 'lightCones')]
    private ?Path $path = null;

    #[ORM\Column(nullable: true)]
    private ?float $baseHp = null;

    #[ORM\Column(nullable: true)]
    private ?float $baseAtk = null;

    #[ORM\Column(nullable: true)]
    private ?float $baseDef = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $story = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superimpositionOne = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superimpositionTwo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superimpositionThree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superimpositionFour = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superimpositionFive = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skillName = null;

    #[ORM\Column]
    private ?bool $announced = false;

    #[ORM\Column]
    private ?bool $released = false;

    #[ORM\Column(nullable: true)]
    private ?array $obtainable = null;

    #[ORM\ManyToOne(inversedBy: 'lightCones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Version $releaseVersion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $iconFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $splashFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fullArtFilename = null;

    #[ORM\ManyToOne(inversedBy: 'lightCones')]
    private ?EnemyDrops $enemyDrops = null;

    #[ORM\ManyToOne(inversedBy: 'lightCones')]
    private ?PathMaterials $pathMaterials = null;

    public function __toString()
    {
        return $this->name;
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

    public function getBaseHp(): ?float
    {
        return $this->baseHp;
    }

    public function setBaseHp(?float $baseHp): static
    {
        $this->baseHp = $baseHp;

        return $this;
    }

    public function getBaseAtk(): ?float
    {
        return $this->baseAtk;
    }

    public function setBaseAtk(?float $baseAtk): static
    {
        $this->baseAtk = $baseAtk;

        return $this;
    }

    public function getBaseDef(): ?float
    {
        return $this->baseDef;
    }

    public function setBaseDef(?float $baseDef): static
    {
        $this->baseDef = $baseDef;

        return $this;
    }

    public function getStory(): ?string
    {
        return $this->story;
    }

    public function setStory(?string $story): static
    {
        $this->story = $story;

        return $this;
    }

    public function getSuperimpositionOne(): ?string
    {
        return $this->superimpositionOne;
    }

    public function setSuperimpositionOne(?string $superimpositionOne): static
    {
        $this->superimpositionOne = $superimpositionOne;

        return $this;
    }

    public function getSuperimpositionTwo(): ?string
    {
        return $this->superimpositionTwo;
    }

    public function setSuperimpositionTwo(?string $superimpositionTwo): static
    {
        $this->superimpositionTwo = $superimpositionTwo;

        return $this;
    }

    public function getSuperimpositionThree(): ?string
    {
        return $this->superimpositionThree;
    }

    public function setSuperimpositionThree(?string $superimpositionThree): static
    {
        $this->superimpositionThree = $superimpositionThree;

        return $this;
    }

    public function getSuperimpositionFour(): ?string
    {
        return $this->superimpositionFour;
    }

    public function setSuperimpositionFour(?string $superimpositionFour): static
    {
        $this->superimpositionFour = $superimpositionFour;

        return $this;
    }

    public function getSuperimpositionFive(): ?string
    {
        return $this->superimpositionFive;
    }

    public function setSuperimpositionFive(?string $superimpositionFive): static
    {
        $this->superimpositionFive = $superimpositionFive;

        return $this;
    }

    public function getSkillName(): ?string
    {
        return $this->skillName;
    }

    public function setSkillName(?string $skillName): static
    {
        $this->skillName = $skillName;

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

    public function isReleased(): ?bool
    {
        return $this->released;
    }

    public function setReleased(bool $released): static
    {
        $this->released = $released;

        return $this;
    }

    public function getObtainable(): ?array
    {
        return $this->obtainable;
    }

    public function setObtainable(?array $obtainable): static
    {
        $this->obtainable = $obtainable;

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

    public function getFullArtFilename(): ?string
    {
        return $this->fullArtFilename;
    }

    public function setFullArtFilename(?string $fullArtFilename): static
    {
        $this->fullArtFilename = $fullArtFilename;

        return $this;
    }

    public function getEnemyDrops(): ?EnemyDrops
    {
        return $this->enemyDrops;
    }

    public function setEnemyDrops(?EnemyDrops $enemyDrops): static
    {
        $this->enemyDrops = $enemyDrops;

        return $this;
    }

    public function getPathMaterials(): ?PathMaterials
    {
        return $this->pathMaterials;
    }

    public function setPathMaterials(?PathMaterials $pathMaterials): static
    {
        $this->pathMaterials = $pathMaterials;

        return $this;
    }
}
