<?php

namespace App\Entity;

use App\Entity\UsedVehicles;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\OptionsVehiclesRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: OptionsVehiclesRepository::class)]
class OptionsVehicles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: UsedVehicles::class, mappedBy: 'optionsVehicles')]
    private Collection $optionsVehicles;

    public function __construct()
    {
        $this->optionsVehicles = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, UsedVehicles>
     */
    public function getOptionsUsedVehicles(): Collection
    {
        return $this->optionsVehicles;
    }

    public function addOptionsUsedVehicle(UsedVehicles $optionsVehicles): static
    {
        if (!$this->optionsVehicles->contains($optionsVehicles)) {
            $this->optionsVehicles->add($optionsVehicles);
        }

        return $this;
    }

    public function removeOptionsUsedVehicle(UsedVehicles $optionsVehicles): static
    {
        $this->optionsVehicles->removeElement($optionsVehicles);

        return $this;
    }
}
