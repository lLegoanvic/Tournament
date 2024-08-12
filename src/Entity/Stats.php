<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatsRepository::class)]
class Stats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Player $id_player = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToMany(targetEntity: TeamStats::class, mappedBy: 'id_stats')]
    private Collection $teamStats;

    public function __construct()
    {
        $this->teamStats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPlayer(): ?Player
    {
        return $this->id_player;
    }

    public function setIdPlayer(?Player $id_player): static
    {
        $this->id_player = $id_player;

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
     * @return Collection<int, TeamStats>
     */
    public function getTeamStats(): Collection
    {
        return $this->teamStats;
    }

    public function addTeamStat(TeamStats $teamStat): static
    {
        if (!$this->teamStats->contains($teamStat)) {
            $this->teamStats->add($teamStat);
            $teamStat->addIdStat($this);
        }

        return $this;
    }

    public function removeTeamStat(TeamStats $teamStat): static
    {
        if ($this->teamStats->removeElement($teamStat)) {
            $teamStat->removeIdStat($this);
        }

        return $this;
    }
}
