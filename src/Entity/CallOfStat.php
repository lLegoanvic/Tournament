<?php

namespace App\Entity;

use App\Repository\CallOfStatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CallOfStatRepository::class)]
class CallOfStat
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
    private ?float $kda = null;

    #[ORM\Column]
    private ?int $bestKillStreak = null;

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

    public function getKda(): ?float
    {
        return $this->kda;
    }

    public function setKda(float $kda): static
    {
        $this->kda = $kda;

        return $this;
    }

    public function getBestKillStreak(): ?int
    {
        return $this->bestKillStreak;
    }

    public function setBestKillStreak(int $bestKillStreak): static
    {
        $this->bestKillStreak = $bestKillStreak;

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
