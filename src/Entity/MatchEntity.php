<?php

namespace App\Entity;

use App\Repository\MatchEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchEntityRepository::class)]
class MatchEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'matchs')]
    private ?Tournament $id_tournament = null;

    #[ORM\ManyToOne(inversedBy: 'matchs')]
    private ?Player $id_player = null;

    #[ORM\ManyToOne(inversedBy: 'matchs')]
    private ?Team $id_team = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $start_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $result = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToOne(inversedBy: 'id_match')]
    private ?Bracket $bracket = null;

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

    public function getIdPlayer(): ?Player
    {
        return $this->id_player;
    }

    public function setIdPlayer(?Player $id_player): static
    {
        $this->id_player = $id_player;

        return $this;
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

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->start_at;
    }

    public function setStartAt(\DateTimeImmutable $start_at): static
    {
        $this->start_at = $start_at;

        return $this;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(?string $result): static
    {
        $this->result = $result;

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

    public function getBracket(): ?Bracket
    {
        return $this->bracket;
    }

    public function setBracket(?Bracket $bracket): static
    {
        $this->bracket = $bracket;

        return $this;
    }
}
