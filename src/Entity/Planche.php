<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlancheRepository")
 */
class Planche
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Zone", inversedBy="planche")
     */
    private $zone;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Legume", mappedBy="planche")
     */
    private $legumes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tache", mappedBy="planche")
     */
    private $taches;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subarea", inversedBy="planche")
     */
    private $subarea;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rotation", mappedBy="planche")
     */
    private $rotations;

    public function __construct()
    {
        $this->legumes = new ArrayCollection();
        $this->taches = new ArrayCollection();
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
     * @return Collection|Legume[]
     */
    public function getLegumes(): Collection
    {
        return $this->legumes;
    }

    public function addLegume(Legume $legume): self
    {
        if (!$this->legumes->contains($legume)) {
            $this->legumes[] = $legume;
            $legume->addPlanche($this);
        }

        return $this;
    }

    public function removeLegume(Legume $legume): self
    {
        if ($this->legumes->contains($legume)) {
            $this->legumes->removeElement($legume);
            $legume->removePlanche($this);
        }

        return $this;
    }

    /**
     * @return Collection|Tache[]
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTach(Tache $tach): self
    {
        if (!$this->taches->contains($tach)) {
            $this->taches[] = $tach;
            $tach->addPlanche($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): self
    {
        if ($this->taches->contains($tach)) {
            $this->taches->removeElement($tach);
            $tach->removePlanche($this);
        }

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
            $rotation->setPlanche($this);
        }

        return $this;
    }

    public function removeRotation(Rotation $rotation): self
    {
        if ($this->rotations->contains($rotation)) {
            $this->rotations->removeElement($rotation);
            // set the owning side to null (unless already changed)
            if ($rotation->getPlanche() === $this) {
                $rotation->setPlanche(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
