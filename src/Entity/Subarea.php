<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubareaRepository")
 */
class Subarea
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Zone", inversedBy="subareas")
     */
    private $zone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Planche", mappedBy="subarea")
     */
    private $planche;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rotation", mappedBy="subarea")
     */
    private $rotations;

    public function __construct()
    {
        $this->planche = new ArrayCollection();
        $this->rotations = new ArrayCollection();
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

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * @return Collection|Planche[]
     */
    public function getPlanche(): Collection
    {
        return $this->planche;
    }

    public function addPlanche(Planche $planche): self
    {
        if (!$this->planche->contains($planche)) {
            $this->planche[] = $planche;
            $planche->setSubarea($this);
        }

        return $this;
    }

    public function removePlanche(Planche $planche): self
    {
        if ($this->planche->contains($planche)) {
            $this->planche->removeElement($planche);
            // set the owning side to null (unless already changed)
            if ($planche->getSubarea() === $this) {
                $planche->setSubarea(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rotation[]
     */
    public function getRotations(): Collection
    {
        return $this->rotations;
    }

    public function addRotation(Rotation $rotation): self
    {
        if (!$this->rotations->contains($rotation)) {
            $this->rotations[] = $rotation;
            $rotation->setSubarea($this);
        }

        return $this;
    }

    public function removeRotation(Rotation $rotation): self
    {
        if ($this->rotations->contains($rotation)) {
            $this->rotations->removeElement($rotation);
            // set the owning side to null (unless already changed)
            if ($rotation->getSubarea() === $this) {
                $rotation->setSubarea(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
