<?php

namespace App\Entity;

use App\Repository\BrandVehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrandVehicleRepository::class)]
class BrandVehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $brand = null;

    #[ORM\OneToMany(mappedBy: 'brandVehicle', targetEntity: UsedVehicles::class)]
    private Collection $brandVehicle;

    public function __construct()
    {
        $this->brandVehicle = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->brand;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection<int, UsedVehicles>
     */
    public function getBrandVehicle(): Collection
    {
        return $this->brandVehicle;
    }

    public function addBrandVehicle(UsedVehicles $brandVehicle): static
    {
        if (!$this->brandVehicle->contains($brandVehicle)) {
            $this->brandVehicle->add($brandVehicle);
            $brandVehicle->setBrandVehicle($this);
        }

        return $this;
    }

    public function removeBrandVehicle(UsedVehicles $brandVehicle): static
    {
        if ($this->brandVehicle->removeElement($brandVehicle)) {
            // set the owning side to null (unless already changed)
            if ($brandVehicle->getBrandVehicle() === $this) {
                $brandVehicle->setBrandVehicle(null);
            }
        }

        return $this;
    }
}
