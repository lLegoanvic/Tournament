<?php

namespace App\Entity;

use App\Repository\RocketLeagueStatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RocketLeagueStatRepository::class)]
class RocketLeagueStat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $win = null;

    #[ORM\Column]
    private ?int $lose = null;

    #[ORM\Column]
    private ?int $goals = null;

    #[ORM\Column]
    private ?int $saves = null;

    #[ORM\Column]
    private ?int $decisivePass = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWin(): ?int
    {
        return $this->win;
    }

    public function setWin(int $win): static
    {
        $this->win = $win;

        return $this;
    }

    public function getLose(): ?int
    {
        return $this->lose;
    }

    public function setLose(int $lose): static
    {
        $this->lose = $lose;

        return $this;
    }

    public function getGoals(): ?int
    {
        return $this->goals;
    }

    public function setGoals(int $goals): static
    {
        $this->goals = $goals;

        return $this;
    }

    public function getSaves(): ?int
    {
        return $this->saves;
    }

    public function setSaves(int $saves): static
    {
        $this->saves = $saves;

        return $this;
    }

    public function getDecisivePass(): ?int
    {
        return $this->decisivePass;
    }

    public function setDecisivePass(int $decisivePass): static
    {
        $this->decisivePass = $decisivePass;

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
