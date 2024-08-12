<?php

namespace App\Entity;

use App\Repository\TeamStatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamStatsRepository::class)]
class TeamStats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Team $id_team = null;

    #[ORM\ManyToMany(targetEntity: Stats::class, inversedBy: 'teamStats')]
    private Collection $id_stats;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function __construct()
    {
        $this->id_stats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTeam(): ?Team
    {
        return $this->id_team;
    }

    public function setIdTeam(?Team $id_team): static
    {
        $this->id_team = $id_team;

        return $this;
    }

    /**
     * @return Collection<int, Stats>
     */
    public function getIdStats(): Collection
    {
        return $this->id_stats;
    }

    public function addIdStat(Stats $idStat): static
    {
        if (!$this->id_stats->contains($idStat)) {
            $this->id_stats->add($idStat);
        }

        return $this;
    }

    public function removeIdStat(Stats $idStat): static
    {
        $this->id_stats->removeElement($idStat);

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
