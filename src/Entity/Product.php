<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    operations: [
        new Get(uriTemplate: '/products/{id}', normalizationContext: ['groups' => 'product:item']),
        new GetCollection(uriTemplate: '/products', normalizationContext: ['groups' => 'product:list']),
        new Post(uriTemplate: '/products', normalizationContext: ['groups' => 'product:itemPost']),
        new Delete(uriTemplate: '/products/{id}', normalizationContext: ['groups' => 'product:itemDelete']),
        new Patch(uriTemplate: '/products/{id}', normalizationContext: ['groups' => 'product:priceUpdate'])
    ],
    order: ['id' => 'DESC'],
    paginationEnabled: false,
)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['product:list', 'product:item', 'product:priceUpdate', 'product:itemDelete'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product:list', 'product:item', 'product:itemPost'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product:list', 'product:item', 'product:itemPost'])]
    private ?string $type = null;

    #[ORM\Column]
    #[Groups(['product:list', 'product:item', 'product:priceUpdate', 'product:itemPost'])]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product:list', 'product:item', 'product:itemPost'])]
    private ?string $unit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): static
    {
        $this->unit = $unit;

        return $this;
    }
}
