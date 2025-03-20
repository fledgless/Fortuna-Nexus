<?php

namespace App\Entity;

use App\Repository\RelicSetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelicSetRepository::class)]
class RelicSet
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
    private ?string $twoPieceDesc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $fourPieceDesc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $headName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $headFilename = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $headDesc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $headLore = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $handName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $handFilename = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $handDesc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $handLore = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bodyName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bodyFilename = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bodyDesc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bodyLore = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $feetName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $feetFilename = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $feetDesc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $feetLore = null;

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

    public function getTwoPieceDesc(): ?string
    {
        return $this->twoPieceDesc;
    }

    public function setTwoPieceDesc(?string $twoPieceDesc): static
    {
        $this->twoPieceDesc = $twoPieceDesc;

        return $this;
    }

    public function getFourPieceDesc(): ?string
    {
        return $this->fourPieceDesc;
    }

    public function setFourPieceDesc(?string $fourPieceDesc): static
    {
        $this->fourPieceDesc = $fourPieceDesc;

        return $this;
    }

    public function getHeadName(): ?string
    {
        return $this->headName;
    }

    public function setHeadName(?string $headName): static
    {
        $this->headName = $headName;

        return $this;
    }

    public function getHeadFilename(): ?string
    {
        return $this->headFilename;
    }

    public function setHeadFilename(?string $headFilename): static
    {
        $this->headFilename = $headFilename;

        return $this;
    }

    public function getHeadDesc(): ?string
    {
        return $this->headDesc;
    }

    public function setHeadDesc(?string $headDesc): static
    {
        $this->headDesc = $headDesc;

        return $this;
    }

    public function getHeadLore(): ?string
    {
        return $this->headLore;
    }

    public function setHeadLore(?string $headLore): static
    {
        $this->headLore = $headLore;

        return $this;
    }

    public function getHandName(): ?string
    {
        return $this->handName;
    }

    public function setHandName(?string $handName): static
    {
        $this->handName = $handName;

        return $this;
    }

    public function getHandFilename(): ?string
    {
        return $this->handFilename;
    }

    public function setHandFilename(?string $handFilename): static
    {
        $this->handFilename = $handFilename;

        return $this;
    }

    public function getHandDesc(): ?string
    {
        return $this->handDesc;
    }

    public function setHandDesc(?string $handDesc): static
    {
        $this->handDesc = $handDesc;

        return $this;
    }

    public function getHandLore(): ?string
    {
        return $this->handLore;
    }

    public function setHandLore(?string $handLore): static
    {
        $this->handLore = $handLore;

        return $this;
    }

    public function getBodyName(): ?string
    {
        return $this->bodyName;
    }

    public function setBodyName(?string $bodyName): static
    {
        $this->bodyName = $bodyName;

        return $this;
    }

    public function getBodyFilename(): ?string
    {
        return $this->bodyFilename;
    }

    public function setBodyFilename(?string $bodyFilename): static
    {
        $this->bodyFilename = $bodyFilename;

        return $this;
    }

    public function getBodyDesc(): ?string
    {
        return $this->bodyDesc;
    }

    public function setBodyDesc(?string $bodyDesc): static
    {
        $this->bodyDesc = $bodyDesc;

        return $this;
    }

    public function getBodyLore(): ?string
    {
        return $this->bodyLore;
    }

    public function setBodyLore(?string $bodyLore): static
    {
        $this->bodyLore = $bodyLore;

        return $this;
    }

    public function getFeetName(): ?string
    {
        return $this->feetName;
    }

    public function setFeetName(?string $feetName): static
    {
        $this->feetName = $feetName;

        return $this;
    }

    public function getFeetFilename(): ?string
    {
        return $this->feetFilename;
    }

    public function setFeetFilename(?string $feetFilename): static
    {
        $this->feetFilename = $feetFilename;

        return $this;
    }

    public function getFeetDesc(): ?string
    {
        return $this->feetDesc;
    }

    public function setFeetDesc(?string $feetDesc): static
    {
        $this->feetDesc = $feetDesc;

        return $this;
    }

    public function getFeetLore(): ?string
    {
        return $this->feetLore;
    }

    public function setFeetLore(?string $feetLore): static
    {
        $this->feetLore = $feetLore;

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
}
