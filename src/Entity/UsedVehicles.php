<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Entity\OptionsVehicles;
use App\Entity\PictureVehicles;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsedVehiclesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: UsedVehiclesRepository::class)]
#[Vich\Uploadable]
class UsedVehicles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $mileage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateOfCirculation = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\OneToMany(mappedBy: 'usedVehicles', targetEntity: PictureVehicles::class, cascade: ['persist'])]
    private Collection $pictureVehicles;

    #[ORM\ManyToOne(inversedBy: 'brandVehicle')]
    private ?BrandVehicle $brandVehicle = null;

    #[ORM\ManyToOne(inversedBy: 'fuelTypeVehicle')]
    private ?FuelTypeVehicle $fuelTypeVehicle = null;


    #[ORM\ManyToOne(inversedBy: 'transmissionVehicle')]
    private ?TransmissionVehicle $transmissionVehicle = null;

    #[ORM\ManyToMany(targetEntity: OptionsVehicles::class, inversedBy: 'optionsVehicles')]
    #[ORM\JoinTable(name: 'options_vehicles_used_vehicles')]
    private Collection $optionsVehicles;

    public function __construct()
    {
        $this->pictureVehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getDateOfCirculation(): ?\DateTimeInterface
    {
        return $this->dateOfCirculation;
    }

    public function setDateOfCirculation(\DateTimeInterface $dateOfCirculation): static
    {
        $this->dateOfCirculation = $dateOfCirculation;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, PictureVehicles>
     */
    public function getPictureVehicles(): Collection
    {
        return $this->pictureVehicles;
    }

    public function addPictureVehicle(PictureVehicles $pictureVehicle): static
    {
        if (!$this->pictureVehicles->contains($pictureVehicle)) {
            $this->pictureVehicles->add($pictureVehicle);
            $pictureVehicle->setUsedVehicles($this);
        }

        return $this;
    }

    public function removePictureVehicle(PictureVehicles $pictureVehicle): static
    {
        if ($this->pictureVehicles->removeElement($pictureVehicle)) {
            // set the owning side to null (unless already changed)
            if ($pictureVehicle->getUsedVehicles() === $this) {
                $pictureVehicle->setUsedVehicles(null);
            }
        }

        return $this;
    }

    public function getBrandVehicle(): ?BrandVehicle
    {
        return $this->brandVehicle;
    }

    public function setBrandVehicle(?BrandVehicle $brandVehicle): static
    {
        $this->brandVehicle = $brandVehicle;

        return $this;
    }

    public function getFuelTypeVehicle(): ?FuelTypeVehicle
    {
        return $this->fuelTypeVehicle;
    }

    public function setFuelTypeVehicle(?FuelTypeVehicle $fuelTypeVehicle): static
    {
        $this->fuelTypeVehicle = $fuelTypeVehicle;

        return $this;
    }


    public function getTransmissionVehicle(): ?TransmissionVehicle
    {
        return $this->transmissionVehicle;
    }

    public function setTransmissionVehicle(?TransmissionVehicle $transmissionVehicle): static
    {
        $this->transmissionVehicle = $transmissionVehicle;

        return $this;
    }

    /**
     * Get the value of optionsVehicles
     */
    public function getOptionsVehicles(): Collection
    {
        return $this->optionsVehicles;
    }

    /**
     * Set the value of optionsVehicles
     */
    public function setOptionsVehicles(Collection $optionsVehicles): self
    {
        $this->optionsVehicles = $optionsVehicles;

        return $this;
    }
}
