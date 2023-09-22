<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
#[Vich\Uploadable]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, type : 'string')]
    private ?string $imageName = null;

    #[Vich\UploadableField(mapping: 'pictureOfServices', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)] 
    private ?\DateTimeImmutable $updateAt = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'services')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeOfServices $typeofservices = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setimageFile(?File $imageFile): static
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updateAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getimageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * Get the value of imageName
     */
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * Set the value of imageName
     */
    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }


    /**
     * Get the value of createAt
     */
    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    /**
     * Set the value of createAt
     */
    public function setCreateAt(?\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get the value of updateAt
     */
    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    /**
     * Set the value of updateAt
     */
    public function setUpdateAt(?\DateTimeImmutable $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTypeofservices(): ?TypeOfServices
    {
        return $this->typeofservices;
    }

    public function setTypeofservices(?TypeOfServices $typeofservices): static
    {
        $this->typeofservices = $typeofservices;

        return $this;
    }
}
