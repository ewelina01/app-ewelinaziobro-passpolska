<?php

namespace App\Entity;

use App\Repository\CircleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CircleRepository::class)]
class Circle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $radius = null;

    #[ORM\Column]
    private ?float $surface = null;

    #[ORM\Column]
    private ?float $perimeter = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRadius(): ?int
    {
        return $this->radius;
    }

    public function setRadius(int $radius): static
    {
        $this->radius = $radius;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;

    }

    public function setSurface($radius): static
    {
        $this->surface = number_format(pi() * pow($radius,2), 3, '.', '');

        return $this;
    }

    public function getPerimeter(): ?float
    {
        return $this->perimeter;
    }

    public function setPerimeter($radius): static
    {
        $this->perimeter = number_format(2 * pi() * $radius, 3, '.', '');

        return $this;
    }
}
