<?php

namespace App\Entity;

use App\Repository\OpeningSheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningSheduleRepository::class)]
class OpeningShedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $days = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $hoursAmOpen = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $hoursAmClose = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $hoursPmOpen = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $hoursPmClose = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(string $days): static
    {
        $this->days = $days;

        return $this;
    }

    public function getHoursAmOpen(): ?\DateTimeInterface
    {
        return $this->hoursAmOpen;
    }

    public function setHoursAmOpen(?\DateTimeInterface $hoursAmOpen): static
    {
        $this->hoursAmOpen = $hoursAmOpen;

        return $this;
    }

    public function getHoursAmClose(): ?\DateTimeInterface
    {
        return $this->hoursAmClose;
    }

    public function setHoursAmClose(?\DateTimeInterface $hoursAmClose): static
    {
        $this->hoursAmClose = $hoursAmClose;

        return $this;
    }

    public function getHoursPmOpen(): ?\DateTimeInterface
    {
        return $this->hoursPmOpen;
    }

    public function setHoursPmOpen(?\DateTimeInterface $hoursPmOpen): static
    {
        $this->hoursPmOpen = $hoursPmOpen;

        return $this;
    }

    public function getHoursPmClose(): ?\DateTimeInterface
    {
        return $this->hoursPmClose;
    }

    public function setHoursPmClose(?\DateTimeInterface $hoursPmClose): static
    {
        $this->hoursPmClose = $hoursPmClose;

        return $this;
    }
}
