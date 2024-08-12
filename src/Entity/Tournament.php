<?php

namespace App\Entity;

use App\Repository\TournamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TournamentRepository::class)]
class Tournament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $game = null;

    #[ORM\Column(length: 255)]
    private ?string $rules = null;

    #[ORM\Column]
    private ?int $rounds = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $end_at = null;

    #[ORM\OneToMany(targetEntity: Inscription::class, mappedBy: 'id_tournament')]
    private Collection $inscriptions;

    #[ORM\OneToMany(targetEntity: MatchEntity::class, mappedBy: 'id_tournament')]
    private Collection $matchs;

    #[ORM\OneToMany(targetEntity: Bracket::class, mappedBy: 'id_tournament')]
    private Collection $brackets;

    #[ORM\OneToMany(targetEntity: Ranking::class, mappedBy: 'id_tournament')]
    private Collection $rankings;

    #[ORM\ManyToOne(inversedBy: 'tournaments')]
    private ?User $user = null;

    public function __construct()
    {
        $this->id_Organisator = new ArrayCollection();
        $this->inscriptions = new ArrayCollection();
        $this->matchs = new ArrayCollection();
        $this->brackets = new ArrayCollection();
        $this->rankings = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getGame(): ?string
    {
        return $this->game;
    }

    public function setGame(string $game): static
    {
        $this->game = $game;

        return $this;
    }

    public function getRules(): ?string
    {
        return $this->rules;
    }

    public function setRules(string $rules): static
    {
        $this->rules = $rules;

        return $this;
    }



    public function getRounds(): ?int
    {
        return $this->rounds;
    }

    public function setRounds(int $rounds): static
    {
        $this->rounds = $rounds;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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

    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->end_at;
    }

    public function setEndAt(\DateTimeImmutable $end_at): static
    {
        $this->end_at = $end_at;

        return $this;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): static
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions->add($inscription);
            $inscription->setIdTournament($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): static
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getIdTournament() === $this) {
                $inscription->setIdTournament(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MatchEntity>
     */
    public function getMatchs(): Collection
    {
        return $this->matchs;
    }

    public function addMatch(MatchEntity $match): static
    {
        if (!$this->matchs->contains($match)) {
            $this->matchs->add($match);
            $match->setIdTournament($this);
        }

        return $this;
    }

    public function removeMatch(MatchEntity $match): static
    {
        if ($this->matchs->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getIdTournament() === $this) {
                $match->setIdTournament(null);
            }
        }

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
            $bracket->setIdTournament($this);
        }

        return $this;
    }

    public function removeBracket(Bracket $bracket): static
    {
        if ($this->brackets->removeElement($bracket)) {
            // set the owning side to null (unless already changed)
            if ($bracket->getIdTournament() === $this) {
                $bracket->setIdTournament(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ranking>
     */
    public function getRankings(): Collection
    {
        return $this->rankings;
    }

    public function addRanking(Ranking $ranking): static
    {
        if (!$this->rankings->contains($ranking)) {
            $this->rankings->add($ranking);
            $ranking->setIdTournament($this);
        }

        return $this;
    }

    public function removeRanking(Ranking $ranking): static
    {
        if ($this->rankings->removeElement($ranking)) {
            // set the owning side to null (unless already changed)
            if ($ranking->getIdTournament() === $this) {
                $ranking->setIdTournament(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
