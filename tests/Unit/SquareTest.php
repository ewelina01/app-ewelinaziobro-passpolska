<?php

declare(strict_types = 1);

namespace Tests\Unit;

use App\Entity\Square;
use PHPUnit\Framework\TestCase;
class SquareTest extends TestCase
{
    /** @test */
    public function test_that_square_side_a_is_int(): void
    {
        $square = new Square();

        $square->setA(18);

        $this->assertIsInt($square->getA(), "given value is Integer or not");
    }

    /** @test */
    public function test_that_square_perimeter_is_int(): void
    {
        $square = new Square();

        $square->setPerimeter(2);

        $this->assertIsInt($square->getPerimeter(), "perimeter value is Int or not");

    }

    /** @test */
    public function test_that_square_surface_is_int(): void
    {
        $square = new Square();

        $square->setSurface(7);

        $this->assertIsInt($square->getSurface(), "surface value is Int or not");
    }
}