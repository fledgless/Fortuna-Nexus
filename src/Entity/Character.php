<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?bool $released = false;

    #[ORM\Column]
    private ?bool $announced = false;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Version $releaseVersion = null;

    #[ORM\OneToOne(mappedBy: 'characterName', cascade: ['persist', 'remove'])]
    private ?CharacterKit $characterKit = null;

    /**
     * @var Collection<int, CharacterMedia>
     */
    #[ORM\OneToMany(targetEntity: CharacterMedia::class, mappedBy: 'characterName')]
    private Collection $media;

    #[ORM\OneToOne(mappedBy: 'characterName', cascade: ['persist', 'remove'])]
    private ?CharacterStories $stories = null;

    /**
     * @var Collection<int, CharacterVoiceline>
     */
    #[ORM\OneToMany(targetEntity: CharacterVoiceline::class, mappedBy: 'characterName')]
    private Collection $voicelines;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?EnemyDrops $enemyDrops = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?StagnantShadowDrop $stagnantShadowDrop = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?PathMaterials $pathMaterials = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    private ?EchoOfWarDrop $echoOfWarDrop = null;

    public function __construct()
    {
        $this->media = new ArrayCollection();
        $this->voicelines = new ArrayCollection();
    }

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

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

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

    public function getCharacterKit(): ?CharacterKit
    {
        return $this->characterKit;
    }

    public function setCharacterKit(CharacterKit $characterKit): static
    {
        // set the owning side of the relation if necessary
        if ($characterKit->getCharacterName() !== $this) {
            $characterKit->setCharacterName($this);
        }

        $this->characterKit = $characterKit;

        return $this;
    }

    /**
     * @return Collection<int, CharacterMedia>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(CharacterMedia $medium): static
    {
        if (!$this->media->contains($medium)) {
            $this->media->add($medium);
            $medium->setCharacterName($this);
        }

        return $this;
    }

    public function removeMedium(CharacterMedia $medium): static
    {
        if ($this->media->removeElement($medium)) {
            // set the owning side to null (unless already changed)
            if ($medium->getCharacterName() === $this) {
                $medium->setCharacterName(null);
            }
        }

        return $this;
    }

    public function getStories(): ?CharacterStories
    {
        return $this->stories;
    }

    public function setStories(CharacterStories $stories): static
    {
        // set the owning side of the relation if necessary
        if ($stories->getCharacterName() !== $this) {
            $stories->setCharacterName($this);
        }

        $this->stories = $stories;

        return $this;
    }

    /**
     * @return Collection<int, CharacterVoiceline>
     */
    public function getVoicelines(): Collection
    {
        return $this->voicelines;
    }

    public function addVoiceline(CharacterVoiceline $voiceline): static
    {
        if (!$this->voicelines->contains($voiceline)) {
            $this->voicelines->add($voiceline);
            $voiceline->setCharacterName($this);
        }

        return $this;
    }

    public function removeVoiceline(CharacterVoiceline $voiceline): static
    {
        if ($this->voicelines->removeElement($voiceline)) {
            // set the owning side to null (unless already changed)
            if ($voiceline->getCharacterName() === $this) {
                $voiceline->setCharacterName(null);
            }
        }

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

    public function getStagnantShadowDrop(): ?StagnantShadowDrop
    {
        return $this->stagnantShadowDrop;
    }

    public function setStagnantShadowDrop(?StagnantShadowDrop $stagnantShadowDrop): static
    {
        $this->stagnantShadowDrop = $stagnantShadowDrop;

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

    public function getEchoOfWarDrop(): ?EchoOfWarDrop
    {
        return $this->echoOfWarDrop;
    }

    public function setEchoOfWarDrop(?EchoOfWarDrop $echoOfWarDrop): static
    {
        $this->echoOfWarDrop = $echoOfWarDrop;

        return $this;
    }
}
