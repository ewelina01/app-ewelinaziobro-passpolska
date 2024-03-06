<?php

namespace App\Entity;

use App\Repository\SquareRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SquareRepository::class)]
class Square
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $a = null;

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

    public function getSurface(): ?int
    {
        return $this->surface;

    }

    public function setSurface($a): static
    {
        $this->surface = pow($a, 2);

        return $this;
    }

    public function getPerimeter(): ?int
    {
        return $this->perimeter;
    }

    public function setPerimeter($a): static
    {
        $this->perimeter = 4 * $a;

        return $this;
    }
}
