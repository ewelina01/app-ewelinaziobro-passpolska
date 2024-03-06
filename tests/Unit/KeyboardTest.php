<?php

declare(strict_types = 1);

namespace Tests\Unit;

use App\Entity\Keyboard;
use PHPUnit\Framework\TestCase;
class KeyboardTest extends TestCase
{
    /** @test */
    public function test_that_combinations_is_string(): void
    {
        $keyboard = new Keyboard();

        $keyboard->setCombinations(json_encode([
            '1' => [],
            '2' => ['a', 'b', 'c'],
            '3' => ['d', 'e', 'f'],
            '4' => ['g', 'h', 'i'],
            '5' => ['j', 'k', 'l'],
            '6' => ['m', 'n', 'o'],
            '7' => ['p', 'q', 'r', 's'],
            '8' => ['t', 'u', 'v'],
            '9' => ['w', 'x', 'y', 'z'],
            '0' => [' ']
        ]));

        $this->assertIsString($keyboard->getCombinations(), "given value is string type or not");
    }

    /** @test */
    public function test_that_word_is_string_type(): void
    {
        $keyboard = new Keyboard();

        $keyboard->setWord('Wyraz');

        $this->assertIsString($keyboard->getWord(), "Word value is string type or not");

    }

    /** @test */
    public function test_that_decoded_word_is_int(): void
    {
        $keyboard = new Keyboard();

        $keyboard->setWord('Wyraz');

        $keyboard->setCombinations(json_encode([
            '1' => [],
            '2' => ['a', 'b', 'c'],
            '3' => ['d', 'e', 'f'],
            '4' => ['g', 'h', 'i'],
            '5' => ['j', 'k', 'l'],
            '6' => ['m', 'n', 'o'],
            '7' => ['p', 'q', 'r', 's'],
            '8' => ['t', 'u', 'v'],
            '9' => ['w', 'x', 'y', 'z'],
            '0' => [' ']
        ]));

        $keyboard->setDecodedWord($keyboard->getWord(), $keyboard->getCombinations());

        $this->assertIsInt($keyboard->getDecodedWord(), "Decoded word is integer or not");
    }
}