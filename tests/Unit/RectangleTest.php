<?php

declare(strict_types = 1);

namespace Tests\Unit;

use App\Entity\Rectangle;
use PHPUnit\Framework\TestCase;

class RectangleTest extends TestCase
{
    /** @test */
    public function test_that_rectangle_side_a_is_int(): void
    {
        $rectangle = new Rectangle();

        $rectangle->setA(15);

        $this->assertIsInt($rectangle->getA(), "a value is Integer or not");
    }

    /** @test */
    public function test_that_rectangle_side_b_is_int(): void
    {
        $rectangle = new Rectangle();

        $rectangle->setB(30);

        $this->assertIsInt($rectangle->getB(), "a value is Integer or not");
    }

    /** @test */
    public function test_that_rectangle_perimeter_is_int(): void
    {
        $rectangle = new Rectangle();

        $rectangle->setPerimeter(15,25);

        $this->assertIsInt($rectangle->getPerimeter(), "perimeter value is Int or not");

    }

    /** @test */
    public function test_that_rectangle_surface_is_int(): void
    {
        $rectangle = new Rectangle();

        $rectangle->setSurface(30,60);

        $this->assertIsInt($rectangle->getSurface(), "surface value is Int or not");
    }
}