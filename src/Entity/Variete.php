<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VarieteRepository")
 */
class Variete
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
     * @ORM\OneToMany(targetEntity="App\Entity\Rotation", mappedBy="variete")
     */
    private $rotations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Legume", inversedBy="variete")
     */
    private $legume;

    public function __construct()
    {
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
            $rotation->setVariete($this);
        }

        return $this;
    }

    public function removeRotation(Rotation $rotation): self
    {
        if ($this->rotations->contains($rotation)) {
            $this->rotations->removeElement($rotation);
            // set the owning side to null (unless already changed)
            if ($rotation->getVariete() === $this) {
                $rotation->setVariete(null);
            }
        }

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

    public function __toString()
    {
        return $this->name;
    }
}
