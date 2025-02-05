<?php

namespace App\Entity;

use App\Repository\MemospriteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemospriteRepository::class)]
class Memosprite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filename = null;

    #[ORM\OneToOne(inversedBy: 'memosprite', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?CharacterKit $memomaster = null;

    /**
     * @var Collection<int, MemospriteSkill>
     */
    #[ORM\OneToMany(targetEntity: MemospriteSkill::class, mappedBy: 'memosprite')]
    private Collection $skills;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
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

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): static
    {
        $this->filename = $filename;

        return $this;
    }

    public function getMemomaster(): ?CharacterKit
    {
        return $this->memomaster;
    }

    public function setMemomaster(CharacterKit $memomaster): static
    {
        $this->memomaster = $memomaster;

        return $this;
    }

    /**
     * @return Collection<int, MemospriteSkill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(MemospriteSkill $skill): static
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
            $skill->setMemosprite($this);
        }

        return $this;
    }

    public function removeSkill(MemospriteSkill $skill): static
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getMemosprite() === $this) {
                $skill->setMemosprite(null);
            }
        }

        return $this;
    }
}
