<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Player::class, inversedBy: 'name')]
    private Collection $id_player;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\OneToMany(targetEntity: MatchEntity::class, mappedBy: 'id_team')]
    private Collection $matchs;

    #[ORM\OneToMany(targetEntity: Ranking::class, mappedBy: 'id_team')]
    private Collection $rankings;

    public function __construct()
    {
        $this->id_player = new ArrayCollection();
        $this->matchs = new ArrayCollection();
        $this->rankings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getIdPlayer(): Collection
    {
        return $this->id_player;
    }

    public function addIdPlayer(Player $idPlayer): static
    {
        if (!$this->id_player->contains($idPlayer)) {
            $this->id_player->add($idPlayer);
        }

        return $this;
    }

    public function removeIdPlayer(Player $idPlayer): static
    {
        $this->id_player->removeElement($idPlayer);

        return $this;
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
            $match->setIdTeam($this);
        }

        return $this;
    }

    public function removeMatch(MatchEntity $match): static
    {
        if ($this->matchs->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getIdTeam() === $this) {
                $match->setIdTeam(null);
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
            $ranking->setIdTeam($this);
        }

        return $this;
    }

    public function removeRanking(Ranking $ranking): static
    {
        if ($this->rankings->removeElement($ranking)) {
            // set the owning side to null (unless already changed)
            if ($ranking->getIdTeam() === $this) {
                $ranking->setIdTeam(null);
            }
        }

        return $this;
    }
}
