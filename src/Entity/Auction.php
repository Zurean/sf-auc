<?php

namespace App\Entity;

use App\Repository\AuctionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuctionRepository::class)
 */
class Auction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="auctions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\OneToMany(targetEntity=Bet::class, mappedBy="auction", orphanRemoval=true)
     */
    private $bets;

    /**
     * @ORM\Column(type="integer")
     */
    private $startPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $minPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceCollapseStep;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceCollapseInterval;

    /**
     * @ORM\Column(type="integer")
     */
    private $minOutbid;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createTime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endTime;

    public function __construct()
    {
        $this->bets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection|Bet[]
     */
    public function getBets(): Collection
    {
        return $this->bets;
    }

    public function addBet(Bet $bet): self
    {
        if (!$this->bets->contains($bet)) {
            $this->bets[] = $bet;
            $bet->setAuction($this);
        }

        return $this;
    }

    public function removeBet(Bet $bet): self
    {
        if ($this->bets->removeElement($bet)) {
            // set the owning side to null (unless already changed)
            if ($bet->getAuction() === $this) {
                $bet->setAuction(null);
            }
        }

        return $this;
    }

    public function getStartPrice(): ?int
    {
        return $this->startPrice;
    }

    public function setStartPrice(int $startPrice): self
    {
        $this->startPrice = $startPrice;

        return $this;
    }

    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }

    public function setMinPrice(int $minPrice): self
    {
        $this->minPrice = $minPrice;

        return $this;
    }

    public function getPriceCollapseStep(): ?int
    {
        return $this->priceCollapseStep;
    }

    public function setPriceCollapseStep(int $priceCollapseStep): self
    {
        $this->priceCollapseStep = $priceCollapseStep;

        return $this;
    }

    public function getPriceCollapseInterval(): ?int
    {
        return $this->priceCollapseInterval;
    }

    public function setPriceCollapseInterval(int $priceCollapseInterval): self
    {
        $this->priceCollapseInterval = $priceCollapseInterval;

        return $this;
    }

    public function getMinOutbid(): ?int
    {
        return $this->minOutbid;
    }

    public function setMinOutbid(int $minOutbid): self
    {
        $this->minOutbid = $minOutbid;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getCreateTime(): ?\DateTimeInterface
    {
        return $this->createTime;
    }

    public function setCreateTime(\DateTimeInterface $createTime): self
    {
        $this->createTime = $createTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(?\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }
}
