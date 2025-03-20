<?php

namespace App\Entity;

use App\Repository\OrnamentSetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrnamentSetRepository::class)]
class OrnamentSet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $setName = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $setFilename = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $setBonus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $planarSphereName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $planarSphereFilename = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $planarSphereDesc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $planarSphereLore = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkRopeName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkRopeFilename = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $linkRopeDesc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $linkRopeLore = null;

    #[ORM\Column]
    private ?bool $announced = null;

    #[ORM\Column]
    private ?bool $released = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSetName(): ?string
    {
        return $this->setName;
    }

    public function setSetName(string $setName): static
    {
        $this->setName = $setName;

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

    public function getSetFilename(): ?string
    {
        return $this->setFilename;
    }

    public function setSetFilename(?string $setFilename): static
    {
        $this->setFilename = $setFilename;

        return $this;
    }

    public function getSetBonus(): ?string
    {
        return $this->setBonus;
    }

    public function setSetBonus(?string $setBonus): static
    {
        $this->setBonus = $setBonus;

        return $this;
    }

    public function getPlanarSphereName(): ?string
    {
        return $this->planarSphereName;
    }

    public function setPlanarSphereName(?string $planarSphereName): static
    {
        $this->planarSphereName = $planarSphereName;

        return $this;
    }

    public function getPlanarSphereFilename(): ?string
    {
        return $this->planarSphereFilename;
    }

    public function setPlanarSphereFilename(?string $planarSphereFilename): static
    {
        $this->planarSphereFilename = $planarSphereFilename;

        return $this;
    }

    public function getPlanarSphereDesc(): ?string
    {
        return $this->planarSphereDesc;
    }

    public function setPlanarSphereDesc(?string $planarSphereDesc): static
    {
        $this->planarSphereDesc = $planarSphereDesc;

        return $this;
    }

    public function getPlanarSphereLore(): ?string
    {
        return $this->planarSphereLore;
    }

    public function setPlanarSphereLore(?string $planarSphereLore): static
    {
        $this->planarSphereLore = $planarSphereLore;

        return $this;
    }

    public function getLinkRopeName(): ?string
    {
        return $this->linkRopeName;
    }

    public function setLinkRopeName(?string $linkRopeName): static
    {
        $this->linkRopeName = $linkRopeName;

        return $this;
    }

    public function getLinkRopeFilename(): ?string
    {
        return $this->linkRopeFilename;
    }

    public function setLinkRopeFilename(?string $linkRopeFilename): static
    {
        $this->linkRopeFilename = $linkRopeFilename;

        return $this;
    }

    public function getLinkRopeDesc(): ?string
    {
        return $this->linkRopeDesc;
    }

    public function setLinkRopeDesc(?string $linkRopeDesc): static
    {
        $this->linkRopeDesc = $linkRopeDesc;

        return $this;
    }

    public function getLinkRopeLore(): ?string
    {
        return $this->linkRopeLore;
    }

    public function setLinkRopeLore(?string $linkRopeLore): static
    {
        $this->linkRopeLore = $linkRopeLore;

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

    public function setReleased(?bool $released): static
    {
        $this->released = $released;

        return $this;
    }
}
