<?php

declare(strict_types = 1);

namespace Tests\Unit;

use App\Entity\Circle;
use PHPUnit\Framework\TestCase;
class CircleTest extends TestCase
{
    /** @test */
    public function test_that_circle_radius_is_int(): void
    {
        $circle = new Circle();

        $circle->setRadius(5);

        $this->assertIsInt($circle->getRadius(), "given value is Integer or not");
    }

    /** @test */
    public function test_that_circle_perimeter_is_float(): void
    {
        $circle = new Circle();

        $radius = 1;

        $circle->setPerimeter($radius);

        $this->assertIsFloat($circle->getPerimeter(), "perimeter value is Float or not");
        $this->assertEquals($circle->getPerimeter(), number_format(2 * pi() * $radius,3,'.',''));

    }

    /** @test */
    public function test_that_circle_surface_is_float(): void
    {
        $circle = new Circle();

        $radius = 12;

        $circle->setSurface($radius);

        $this->assertIsFloat($circle->getSurface(), "surface value is Float or not");
    }
}