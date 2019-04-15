<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ZoneRepository")
 */
class Zone
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
     * @ORM\OneToMany(targetEntity="App\Entity\Planche", mappedBy="zone")
     */
    private $planche;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Subarea", mappedBy="zone")
     */
    private $subareas;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rotation", mappedBy="zone")
     */
    private $rotations;

    public function __construct()
    {
        $this->planche = new ArrayCollection();
        $this->subareas = new ArrayCollection();
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
            $planche->setZone($this);
        }

        return $this;
    }

    public function removePlanche(Planche $planche): self
    {
        if ($this->planche->contains($planche)) {
            $this->planche->removeElement($planche);
            // set the owning side to null (unless already changed)
            if ($planche->getZone() === $this) {
                $planche->setZone(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Subarea[]
     */
    public function getSubareas(): Collection
    {
        return $this->subareas;
    }

    public function addSubarea(Subarea $subarea): self
    {
        if (!$this->subareas->contains($subarea)) {
            $this->subareas[] = $subarea;
            $subarea->setZone($this);
        }

        return $this;
    }

    public function removeSubarea(Subarea $subarea): self
    {
        if ($this->subareas->contains($subarea)) {
            $this->subareas->removeElement($subarea);
            // set the owning side to null (unless already changed)
            if ($subarea->getZone() === $this) {
                $subarea->setZone(null);
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
            $rotation->setZone($this);
        }

        return $this;
    }

    public function removeRotation(Rotation $rotation): self
    {
        if ($this->rotations->contains($rotation)) {
            $this->rotations->removeElement($rotation);
            // set the owning side to null (unless already changed)
            if ($rotation->getZone() === $this) {
                $rotation->setZone(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
