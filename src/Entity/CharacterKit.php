<?php

namespace App\Entity;

use App\Repository\CharacterKitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterKitRepository::class)]
class CharacterKit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'characterKit', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $characterName = null;

    #[ORM\Column(nullable: true)]
    private ?float $baseHp = null;

    #[ORM\Column(nullable: true)]
    private ?float $baseAtk = null;

    #[ORM\Column(nullable: true)]
    private ?float $baseDef = null;

    #[ORM\Column(nullable: true)]
    private ?float $baseSpd = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTraceOneName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mainTraceOneDesc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTraceOneFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTraceTwoName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mainTraceTwoDesc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTraceTwoFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTraceThreeName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mainTraceThreeDesc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mainTraceThreeFilename = null;

    /**
     * @var Collection<int, Stat>
     */
    #[ORM\ManyToMany(targetEntity: Stat::class, inversedBy: 'characterKits')]
    private Collection $substats;

    #[ORM\Column(nullable: true)]
    private ?float $statOneValue = null;

    #[ORM\Column(nullable: true)]
    private ?float $statTwoValue = null;

    #[ORM\Column(nullable: true)]
    private ?float $statThreeValue = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $levelOneTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionTwoTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionThreeTraceOne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionThreeTraceTwo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionFourTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionFiveTraceOne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionFiveTraceTwo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ascensionSixTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $levelSeventyFiveTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $levelEightyTrace = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $techniqueName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $techniqueDesc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $techniqueFilename = null;

    #[ORM\Column]
    private ?bool $leakedContent = null;

    #[ORM\Column(nullable: true)]
    private ?int $betaVersion = null;

    /**
     * @var Collection<int, CharacterSkill>
     */
    #[ORM\OneToMany(targetEntity: CharacterSkill::class, mappedBy: 'characterKit')]
    private Collection $skills;

    /**
     * @var Collection<int, CharacterEidolon>
     */
    #[ORM\OneToMany(targetEntity: CharacterEidolon::class, mappedBy: 'characterKit')]
    private Collection $eidolons;

    #[ORM\OneToOne(mappedBy: 'memomaster', cascade: ['persist', 'remove'])]
    private ?Memosprite $memosprite = null;

    public function __construct()
    {
        $this->substats = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->eidolons = new ArrayCollection();
    }

    public function __toString()
    {
        $name = $this->characterName . " - Kit";
        return $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?Character
    {
        return $this->characterName;
    }

    public function setCharacterName(Character $characterName): static
    {
        $this->characterName = $characterName;

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

    public function getBaseSpd(): ?float
    {
        return $this->baseSpd;
    }

    public function setBaseSpd(float $baseSpd): static
    {
        $this->baseSpd = $baseSpd;

        return $this;
    }

    public function getMainTraceOneName(): ?string
    {
        return $this->mainTraceOneName;
    }

    public function setMainTraceOneName(?string $mainTraceOneName): static
    {
        $this->mainTraceOneName = $mainTraceOneName;

        return $this;
    }

    public function getMainTraceOneDesc(): ?string
    {
        return $this->mainTraceOneDesc;
    }

    public function setMainTraceOneDesc(?string $mainTraceOneDesc): static
    {
        $this->mainTraceOneDesc = $mainTraceOneDesc;

        return $this;
    }

    public function getMainTraceOneFilename(): ?string
    {
        return $this->mainTraceOneFilename;
    }

    public function setMainTraceOneFilename(?string $mainTraceOneFilename): static
    {
        $this->mainTraceOneFilename = $mainTraceOneFilename;

        return $this;
    }

    public function getMainTraceTwoName(): ?string
    {
        return $this->mainTraceTwoName;
    }

    public function setMainTraceTwoName(?string $mainTraceTwoName): static
    {
        $this->mainTraceTwoName = $mainTraceTwoName;

        return $this;
    }

    public function getMainTraceTwoDesc(): ?string
    {
        return $this->mainTraceTwoDesc;
    }

    public function setMainTraceTwoDesc(?string $mainTraceTwoDesc): static
    {
        $this->mainTraceTwoDesc = $mainTraceTwoDesc;

        return $this;
    }

    public function getMainTraceTwoFilename(): ?string
    {
        return $this->mainTraceTwoFilename;
    }

    public function setMainTraceTwoFilename(?string $mainTraceTwoFilename): static
    {
        $this->mainTraceTwoFilename = $mainTraceTwoFilename;

        return $this;
    }

    public function getMainTraceThreeName(): ?string
    {
        return $this->mainTraceThreeName;
    }

    public function setMainTraceThreeName(?string $mainTraceThreeName): static
    {
        $this->mainTraceThreeName = $mainTraceThreeName;

        return $this;
    }

    public function getMainTraceThreeDesc(): ?string
    {
        return $this->mainTraceThreeDesc;
    }

    public function setMainTraceThreeDesc(?string $mainTraceThreeDesc): static
    {
        $this->mainTraceThreeDesc = $mainTraceThreeDesc;

        return $this;
    }

    public function getMainTraceThreeFilename(): ?string
    {
        return $this->mainTraceThreeFilename;
    }

    public function setMainTraceThreeFilename(?string $mainTraceThreeFilename): static
    {
        $this->mainTraceThreeFilename = $mainTraceThreeFilename;

        return $this;
    }

    /**
     * @return Collection<int, Stat>
     */
    public function getSubstats(): Collection
    {
        return $this->substats;
    }

    public function addSubstat(Stat $substat): static
    {
        if (!$this->substats->contains($substat)) {
            $this->substats->add($substat);
        }

        return $this;
    }

    public function removeSubstat(Stat $substat): static
    {
        $this->substats->removeElement($substat);

        return $this;
    }

    public function getStatOneValue(): ?float
    {
        return $this->statOneValue;
    }

    public function setStatOneValue(?float $statOneValue): static
    {
        $this->statOneValue = $statOneValue;

        return $this;
    }

    public function getStatTwoValue(): ?float
    {
        return $this->statTwoValue;
    }

    public function setStatTwoValue(?float $statTwoValue): static
    {
        $this->statTwoValue = $statTwoValue;

        return $this;
    }

    public function getStatThreeValue(): ?float
    {
        return $this->statThreeValue;
    }

    public function setStatThreeValue(?float $statThreeValue): static
    {
        $this->statThreeValue = $statThreeValue;

        return $this;
    }

    public function getLevelOneTrace(): ?string
    {
        return $this->levelOneTrace;
    }

    public function setLevelOneTrace(?string $levelOneTrace): static
    {
        $this->levelOneTrace = $levelOneTrace;

        return $this;
    }

    public function getAscensionTwoTrace(): ?string
    {
        return $this->ascensionTwoTrace;
    }

    public function setAscensionTwoTrace(?string $ascensionTwoTrace): static
    {
        $this->ascensionTwoTrace = $ascensionTwoTrace;

        return $this;
    }

    public function getAscensionThreeTraceOne(): ?string
    {
        return $this->ascensionThreeTraceOne;
    }

    public function setAscensionThreeTraceOne(?string $ascensionThreeTraceOne): static
    {
        $this->ascensionThreeTraceOne = $ascensionThreeTraceOne;

        return $this;
    }

    public function getAscensionThreeTraceTwo(): ?string
    {
        return $this->ascensionThreeTraceTwo;
    }

    public function setAscensionThreeTraceTwo(?string $ascensionThreeTraceTwo): static
    {
        $this->ascensionThreeTraceTwo = $ascensionThreeTraceTwo;

        return $this;
    }

    public function getAscensionFourTrace(): ?string
    {
        return $this->ascensionFourTrace;
    }

    public function setAscensionFourTrace(?string $ascensionFourTrace): static
    {
        $this->ascensionFourTrace = $ascensionFourTrace;

        return $this;
    }

    public function getAscensionFiveTraceOne(): ?string
    {
        return $this->ascensionFiveTraceOne;
    }

    public function setAscensionFiveTraceOne(?string $ascensionFiveTraceOne): static
    {
        $this->ascensionFiveTraceOne = $ascensionFiveTraceOne;

        return $this;
    }

    public function getAscensionFiveTraceTwo(): ?string
    {
        return $this->ascensionFiveTraceTwo;
    }

    public function setAscensionFiveTraceTwo(?string $ascensionFiveTraceTwo): static
    {
        $this->ascensionFiveTraceTwo = $ascensionFiveTraceTwo;

        return $this;
    }

    public function getAscensionSixTrace(): ?string
    {
        return $this->ascensionSixTrace;
    }

    public function setAscensionSixTrace(?string $ascensionSixTrace): static
    {
        $this->ascensionSixTrace = $ascensionSixTrace;

        return $this;
    }

    public function getLevelSeventyFiveTrace(): ?string
    {
        return $this->levelSeventyFiveTrace;
    }

    public function setLevelSeventyFiveTrace(?string $levelSeventyFiveTrace): static
    {
        $this->levelSeventyFiveTrace = $levelSeventyFiveTrace;

        return $this;
    }

    public function getLevelEightyTrace(): ?string
    {
        return $this->levelEightyTrace;
    }

    public function setLevelEightyTrace(?string $levelEightyTrace): static
    {
        $this->levelEightyTrace = $levelEightyTrace;

        return $this;
    }

    public function getTechniqueName(): ?string
    {
        return $this->techniqueName;
    }

    public function setTechniqueName(?string $techniqueName): static
    {
        $this->techniqueName = $techniqueName;

        return $this;
    }

    public function getTechniqueDesc(): ?string
    {
        return $this->techniqueDesc;
    }

    public function setTechniqueDesc(?string $techniqueDesc): static
    {
        $this->techniqueDesc = $techniqueDesc;

        return $this;
    }

    public function getTechniqueFilename(): ?string
    {
        return $this->techniqueFilename;
    }

    public function setTechniqueFilename(?string $techniqueFilename): static
    {
        $this->techniqueFilename = $techniqueFilename;

        return $this;
    }

    public function isLeakedContent(): ?bool
    {
        return $this->leakedContent;
    }

    public function setLeakedContent(bool $leakedContent): static
    {
        $this->leakedContent = $leakedContent;

        return $this;
    }

    public function getBetaVersion(): ?int
    {
        return $this->betaVersion;
    }

    public function setBetaVersion(?int $betaVersion): static
    {
        $this->betaVersion = $betaVersion;

        return $this;
    }

    /**
     * @return Collection<int, CharacterSkill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(CharacterSkill $skill): static
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
            $skill->setCharacterKit($this);
        }

        return $this;
    }

    public function removeSkill(CharacterSkill $skill): static
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getCharacterKit() === $this) {
                $skill->setCharacterKit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CharacterEidolon>
     */
    public function getEidolons(): Collection
    {
        return $this->eidolons;
    }

    public function addEidolon(CharacterEidolon $eidolon): static
    {
        if (!$this->eidolons->contains($eidolon)) {
            $this->eidolons->add($eidolon);
            $eidolon->setCharacterKit($this);
        }

        return $this;
    }

    public function removeEidolon(CharacterEidolon $eidolon): static
    {
        if ($this->eidolons->removeElement($eidolon)) {
            // set the owning side to null (unless already changed)
            if ($eidolon->getCharacterKit() === $this) {
                $eidolon->setCharacterKit(null);
            }
        }

        return $this;
    }

    public function getMemosprite(): ?Memosprite
    {
        return $this->memosprite;
    }

    public function setMemosprite(Memosprite $memosprite): static
    {
        // set the owning side of the relation if necessary
        if ($memosprite->getMemomaster() !== $this) {
            $memosprite->setMemomaster($this);
        }

        $this->memosprite = $memosprite;

        return $this;
    }
}
