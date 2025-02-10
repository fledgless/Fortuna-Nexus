<?php

namespace App\Entity;

use App\Repository\PathMaterialsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PathMaterialsRepository::class)]
class PathMaterials
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fourStarName = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fourStarFilename = null;

    #[ORM\Column(length: 255)]
    private ?string $threeStarName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $threeStarFilename = null;

    #[ORM\Column(length: 255)]
    private ?string $twoStarName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $twoStarFilename = null;

    #[ORM\Column]
    private ?bool $released = false;

    #[ORM\Column]
    private ?bool $announced = false;

    #[ORM\ManyToOne(inversedBy: 'pathMaterials')]
    private ?Path $path = null;

    /**
     * @var Collection<int, Character>
     */
    #[ORM\OneToMany(targetEntity: Character::class, mappedBy: 'pathMaterials')]
    private Collection $characters;

    /**
     * @var Collection<int, LightCone>
     */
    #[ORM\OneToMany(targetEntity: LightCone::class, mappedBy: 'pathMaterials')]
    private Collection $lightCones;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->lightCones = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->fourStarName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFourStarName(): ?string
    {
        return $this->fourStarName;
    }

    public function setFourStarName(string $fourStarName): static
    {
        $this->fourStarName = $fourStarName;

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

    public function getFourStarFilename(): ?string
    {
        return $this->fourStarFilename;
    }

    public function setFourStarFilename(?string $fourStarFilename): static
    {
        $this->fourStarFilename = $fourStarFilename;

        return $this;
    }

    public function getThreeStarName(): ?string
    {
        return $this->threeStarName;
    }

    public function setThreeStarName(string $threeStarName): static
    {
        $this->threeStarName = $threeStarName;

        return $this;
    }

    public function getThreeStarFilename(): ?string
    {
        return $this->threeStarFilename;
    }

    public function setThreeStarFilename(?string $threeStarFilename): static
    {
        $this->threeStarFilename = $threeStarFilename;

        return $this;
    }

    public function getTwoStarName(): ?string
    {
        return $this->twoStarName;
    }

    public function setTwoStarName(string $twoStarName): static
    {
        $this->twoStarName = $twoStarName;

        return $this;
    }

    public function getTwoStarFilename(): ?string
    {
        return $this->twoStarFilename;
    }

    public function setTwoStarFilename(?string $twoStarFilename): static
    {
        $this->twoStarFilename = $twoStarFilename;

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

    public function getPath(): ?Path
    {
        return $this->path;
    }

    public function setPath(?Path $path): static
    {
        $this->path = $path;

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
            $character->setPathMaterials($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): static
    {
        if ($this->characters->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getPathMaterials() === $this) {
                $character->setPathMaterials(null);
            }
        }

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
            $lightCone->setPathMaterials($this);
        }

        return $this;
    }

    public function removeLightCone(LightCone $lightCone): static
    {
        if ($this->lightCones->removeElement($lightCone)) {
            // set the owning side to null (unless already changed)
            if ($lightCone->getPathMaterials() === $this) {
                $lightCone->setPathMaterials(null);
            }
        }

        return $this;
    }
}
