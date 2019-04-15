<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LegumeRepository")
 */
class Legume
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Planche", inversedBy="legumes")
     */
    private $planche;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tache", inversedBy="legumes")
     */
    private $tache;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rotation", mappedBy="legume")
     */
    private $rotations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Variete", mappedBy="legume")
     */
    private $variete;

    public function __construct()
    {
        $this->planche = new ArrayCollection();
        $this->tache = new ArrayCollection();
        $this->rotations = new ArrayCollection();
        $this->variete = new ArrayCollection();
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
     * @return Collection|Tache[]
     */
    public function getTache(): Collection
    {
        return $this->tache;
    }

    public function addTache(Tache $tache): self
    {
        if (!$this->tache->contains($tache)) {
            $this->tache[] = $tache;
        }

        return $this;
    }

    public function removeTache(Tache $tache): self
    {
        if ($this->tache->contains($tache)) {
            $this->tache->removeElement($tache);
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
            $rotation->setLegume($this);
        }

        return $this;
    }

    public function removeRotation(Rotation $rotation): self
    {
        if ($this->rotations->contains($rotation)) {
            $this->rotations->removeElement($rotation);
            // set the owning side to null (unless already changed)
            if ($rotation->getLegume() === $this) {
                $rotation->setLegume(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Variete[]
     */
    public function getVariete(): Collection
    {
        return $this->variete;
    }

    public function addVariete(Variete $variete): self
    {
        if (!$this->variete->contains($variete)) {
            $this->variete[] = $variete;
            $variete->setLegume($this);
        }

        return $this;
    }

    public function removeVariete(Variete $variete): self
    {
        if ($this->variete->contains($variete)) {
            $this->variete->removeElement($variete);
            // set the owning side to null (unless already changed)
            if ($variete->getLegume() === $this) {
                $variete->setLegume(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
