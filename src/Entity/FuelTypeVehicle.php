<?php

namespace App\Entity;

use App\Repository\FuelTypeVehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FuelTypeVehicleRepository::class)]
class FuelTypeVehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $fuelType = null;

    #[ORM\OneToMany(mappedBy: 'fuelTypeVehicle', targetEntity: UsedVehicles::class)]
    private Collection $fuelTypeVehicle;

    public function __construct()
    {
        $this->fuelTypeVehicle = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->fuelType;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFuelType(): ?string
    {
        return $this->fuelType;
    }

    public function setFuelType(string $fuelType): static
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    /**
     * @return Collection<int, UsedVehicles>
     */
    public function getFuelTypeVehicle(): Collection
    {
        return $this->fuelTypeVehicle;
    }

    public function addFuelTypeVehicle(UsedVehicles $fuelTypeVehicle): static
    {
        if (!$this->fuelTypeVehicle->contains($fuelTypeVehicle)) {
            $this->fuelTypeVehicle->add($fuelTypeVehicle);
            $fuelTypeVehicle->setFuelTypeVehicle($this);
        }

        return $this;
    }

    public function removeFuelTypeVehicle(UsedVehicles $fuelTypeVehicle): static
    {
        if ($this->fuelTypeVehicle->removeElement($fuelTypeVehicle)) {
            // set the owning side to null (unless already changed)
            if ($fuelTypeVehicle->getFuelTypeVehicle() === $this) {
                $fuelTypeVehicle->setFuelTypeVehicle(null);
            }
        }

        return $this;
    }
}
