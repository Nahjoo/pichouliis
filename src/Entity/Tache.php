<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TacheRepository")
 */
class Tache
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Legume", mappedBy="tache")
     */
    private $legumes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Planche", inversedBy="taches")
     */
    private $planche;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rotation", mappedBy="tache")
     */
    private $rotations;

    public function __construct()
    {
        $this->legumes = new ArrayCollection();
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
            $legume->addTache($this);
        }

        return $this;
    }

    public function removeLegume(Legume $legume): self
    {
        if ($this->legumes->contains($legume)) {
            $this->legumes->removeElement($legume);
            $legume->removeTache($this);
        }

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
        }

        return $this;
    }

    public function removePlanche(Planche $planche): self
    {
        if ($this->planche->contains($planche)) {
            $this->planche->removeElement($planche);
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
            $rotation->setTache($this);
        }

        return $this;
    }

    public function removeRotation(Rotation $rotation): self
    {
        if ($this->rotations->contains($rotation)) {
            $this->rotations->removeElement($rotation);
            // set the owning side to null (unless already changed)
            if ($rotation->getTache() === $this) {
                $rotation->setTache(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
