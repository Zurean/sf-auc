<?php

namespace App\Entity;

use App\Repository\BetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BetRepository::class)
 */
class Bet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $holder;

    /**
     * @ORM\ManyToOne(targetEntity=Auction::class, inversedBy="bets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auction;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=BetStatus::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $playTime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHolder(): ?User
    {
        return $this->holder;
    }

    public function setHolder(?User $holder): self
    {
        $this->holder = $holder;

        return $this;
    }

    public function getAuction(): ?Auction
    {
        return $this->auction;
    }

    public function setAuction(?Auction $auction): self
    {
        $this->auction = $auction;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getStatus(): ?BetStatus
    {
        return $this->status;
    }

    public function setStatus(?BetStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPlayTime(): ?\DateTimeInterface
    {
        return $this->playTime;
    }

    public function setPlayTime(?\DateTimeInterface $playTime): self
    {
        $this->playTime = $playTime;

        return $this;
    }
}
