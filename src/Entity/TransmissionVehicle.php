<?php

namespace App\Entity;

use App\Repository\TransmissionVehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransmissionVehicleRepository::class)]
class TransmissionVehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $types = null;

    #[ORM\OneToMany(mappedBy: 'transmissionVehicle', targetEntity: UsedVehicles::class)]
    private Collection $transmissionVehicle;

    public function __construct()
    {
        $this->transmissionVehicle = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->types;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypes(): ?string
    {
        return $this->types;
    }

    public function setTypes(?string $types): static
    {
        $this->types = $types;

        return $this;
    }

    /**
     * @return Collection<int, UsedVehicles>
     */
    public function getTransmissionVehicle(): Collection
    {
        return $this->transmissionVehicle;
    }

    public function addTransmissionVehicle(UsedVehicles $transmissionVehicle): static
    {
        if (!$this->transmissionVehicle->contains($transmissionVehicle)) {
            $this->transmissionVehicle->add($transmissionVehicle);
            $transmissionVehicle->setTransmissionVehicle($this);
        }

        return $this;
    }

    public function removeTransmissionVehicle(UsedVehicles $transmissionVehicle): static
    {
        if ($this->transmissionVehicle->removeElement($transmissionVehicle)) {
            // set the owning side to null (unless already changed)
            if ($transmissionVehicle->getTransmissionVehicle() === $this) {
                $transmissionVehicle->setTransmissionVehicle(null);
            }
        }

        return $this;
    }
}
