<?php

namespace App\Entity;

use App\Repository\BracketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BracketRepository::class)]
class Bracket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'brackets')]
    private ?Tournament $id_tournament = null;

    #[ORM\OneToMany(targetEntity: MatchEntity::class, mappedBy: 'bracket')]
    private Collection $id_match;


    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToOne(inversedBy: 'brackets')]
    private ?Round $round = null;

    public function __construct()
    {
        $this->id_match = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTournament(): ?Tournament
    {
        return $this->id_tournament;
    }

    public function setIdTournament(?Tournament $id_tournament): static
    {
        $this->id_tournament = $id_tournament;

        return $this;
    }

    /**
     * @return Collection<int, MatchEntity>
     */
    public function getIdMatch(): Collection
    {
        return $this->id_match;
    }

    public function addIdMatch(MatchEntity $idMatch): static
    {
        if (!$this->id_match->contains($idMatch)) {
            $this->id_match->add($idMatch);
            $idMatch->setBracket($this);
        }

        return $this;
    }

    public function removeIdMatch(MatchEntity $idMatch): static
    {
        if ($this->id_match->removeElement($idMatch)) {
            // set the owning side to null (unless already changed)
            if ($idMatch->getBracket() === $this) {
                $idMatch->setBracket(null);
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

    public function getUpdatedAd(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAd(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getRound(): ?Round
    {
        return $this->round;
    }

    public function setRound(?Round $round): static
    {
        $this->round = $round;

        return $this;
    }
}
