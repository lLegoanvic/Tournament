<?php

namespace App\Entity;

use App\Repository\RoundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoundRepository::class)]
class Round
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $code_Round = null;

    #[ORM\OneToMany(targetEntity: Bracket::class, mappedBy: 'round')]
    private Collection $brackets;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function __construct()
    {
        $this->brackets = new ArrayCollection();
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

    public function getCodeRound(): ?int
    {
        return $this->code_Round;
    }

    public function setCodeRound(int $code_Round): static
    {
        $this->code_Round = $code_Round;

        return $this;
    }

    /**
     * @return Collection<int, Bracket>
     */
    public function getBrackets(): Collection
    {
        return $this->brackets;
    }

    public function addBracket(Bracket $bracket): static
    {
        if (!$this->brackets->contains($bracket)) {
            $this->brackets->add($bracket);
            $bracket->setRound($this);
        }

        return $this;
    }

    public function removeBracket(Bracket $bracket): static
    {
        if ($this->brackets->removeElement($bracket)) {
            // set the owning side to null (unless already changed)
            if ($bracket->getRound() === $this) {
                $bracket->setRound(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
