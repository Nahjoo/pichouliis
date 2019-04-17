<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RotationRepository")
 */
class Rotation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Zone", inversedBy="rotations")
     */
    private $zone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subarea", inversedBy="rotations")
     */
    private $subarea;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Planche", inversedBy="rotations")
     */
    private $planche;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Legume", inversedBy="rotations")
     */
    private $legume;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Variete", inversedBy="rotations")
     */
    private $variete;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tache", inversedBy="rotations")
     */
    private $tache;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $choice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    public function __construct()
    {
        $this->date = new \Datetime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getSubarea(): ?Subarea
    {
        return $this->subarea;
    }

    public function setSubarea(?Subarea $subarea): self
    {
        $this->subarea = $subarea;

        return $this;
    }

    public function getPlanche(): ?Planche
    {
        return $this->planche;
    }

    public function setPlanche(?Planche $planche): self
    {
        $this->planche = $planche;

        return $this;
    }

    public function getLegume(): ?Legume
    {
        return $this->legume;
    }

    public function setLegume(?Legume $legume): self
    {
        $this->legume = $legume;

        return $this;
    }

    public function getVariete(): ?Variete
    {
        return $this->variete;
    }

    public function setVariete(?Variete $variete): self
    {
        $this->variete = $variete;

        return $this;
    }

    public function getTache(): ?Tache
    {
        return $this->tache;
    }

    public function setTache(?Tache $tache): self
    {
        $this->tache = $tache;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getChoice(): ?string
    {
        return $this->choice;
    }

    public function setChoice(?string $choice): self
    {
        $this->choice = $choice;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
