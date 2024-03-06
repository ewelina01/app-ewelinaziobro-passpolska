<?php

namespace App\Entity;

use App\Repository\RectangleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RectangleRepository::class)]
class Rectangle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $a = null;

    #[ORM\Column]
    private ?int $b = null;

    #[ORM\Column]
    private ?int $surface = null;

    #[ORM\Column]
    private ?int $perimeter = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getA(): ?int
    {
        return $this->a;
    }

    public function setA(int $a): static
    {
        $this->a = $a;

        return $this;
    }

    public function getB(): ?int
    {
        return $this->b;
    }

    public function setB(int $b): static
    {
        $this->b = $b;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;

    }

    public function setSurface($a, $b): static
    {
        $this->surface = $a * $b;

        return $this;
    }

    public function getPerimeter(): ?int
    {
        return $this->perimeter;
    }

    public function setPerimeter($a, $b): static
    {
        $this->perimeter = 2 * $a + 2 * $b;

        return $this;
    }
}
