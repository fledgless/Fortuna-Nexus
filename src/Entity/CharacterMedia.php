<?php

namespace App\Entity;

use App\Repository\CharacterMediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterMediaRepository::class)]
class CharacterMedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Character $characterName = null;

    #[ORM\Column(length: 255)]
    private ?string $mediumType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $videoLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $postLink = null;

    public function __toString()
    {
        $name = $this->characterName . " - Media - " . $this->name;
        return $name;
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

    public function getCharacterName(): ?Character
    {
        return $this->characterName;
    }

    public function setCharacterName(?Character $characterName): static
    {
        $this->characterName = $characterName;

        return $this;
    }

    public function getMediumType(): ?string
    {
        return $this->mediumType;
    }

    public function setMediumType(string $mediumType): static
    {
        $this->mediumType = $mediumType;

        return $this;
    }

    public function getVideoLink(): ?string
    {
        return $this->videoLink;
    }

    public function setVideoLink(?string $videoLink): static
    {
        $this->videoLink = $videoLink;

        return $this;
    }

    public function getImageFilename(): ?string
    {
        return $this->imageFilename;
    }

    public function setImageFilename(?string $imageFilename): static
    {
        $this->imageFilename = $imageFilename;

        return $this;
    }

    public function getPostLink(): ?string
    {
        return $this->postLink;
    }

    public function setPostLink(?string $postLink): static
    {
        $this->postLink = $postLink;

        return $this;
    }
}
