<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $nickname = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToMany(targetEntity: Team::class, mappedBy: 'id_player')]
    private Collection $teams;

    #[ORM\OneToMany(targetEntity: Inscription::class, mappedBy: 'id_player')]
    private Collection $inscriptions;

    #[ORM\OneToMany(targetEntity: MatchEntity::class, mappedBy: 'id_player')]
    private Collection $matchs;

    #[ORM\OneToMany(targetEntity: Ranking::class, mappedBy: 'id_player')]
    private Collection $rankings;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
        $this->inscriptions = new ArrayCollection();
        $this->matchs = new ArrayCollection();
        $this->rankings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): static
    {
        $this->nickname = $nickname;

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

    /**
     * @return Collection<int, Team>
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeams(Team $teams): static
    {
        if (!$this->teams->contains($teams)) {
            $this->teams->add($teams);
            $teams->addIdPlayer($this);
        }

        return $this;
    }

    public function removeTeams(Team $teams): static
    {
        if ($this->teams->removeElement($teams)) {
            $teams->removeIdPlayer($this);
        }

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
            $inscription->setIdPlayer($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): static
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getIdPlayer() === $this) {
                $inscription->setIdPlayer(null);
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
            $match->setIdPlayer($this);
        }

        return $this;
    }

    public function removeMatch(MatchEntity $match): static
    {
        if ($this->matchs->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getIdPlayer() === $this) {
                $match->setIdPlayer(null);
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
            $ranking->setIdPlayer($this);
        }

        return $this;
    }

    public function removeRanking(Ranking $ranking): static
    {
        if ($this->rankings->removeElement($ranking)) {
            // set the owning side to null (unless already changed)
            if ($ranking->getIdPlayer() === $this) {
                $ranking->setIdPlayer(null);
            }
        }

        return $this;
    }
}
