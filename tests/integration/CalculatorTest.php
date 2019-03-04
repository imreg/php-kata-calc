<?php
declare(strict_types = 1);

namespace Tests\integration;

use Calculator\Calculator;
use Calculator\Keyboard;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    function testZero_Has_Scored()
    {
        $keyboard = new Keyboard();

        $calculator = new Calculator($keyboard);

        $this->assertEquals(0, $calculator->score());
    }

    function testOne_Has_Scored()
    {
        $keyboard = new Keyboard();
        $keyboard->add(1);

        $calculator = new Calculator($keyboard);

        $this->assertEquals(1, $calculator->score());
    }

    function testTwo_Has_Scored()
    {
        $keyboard = new Keyboard();
        $keyboard->add(1);
        $keyboard->add('+');
        $keyboard->add(1);

        $calculator = new Calculator($keyboard);

        $this->assertEquals(2, $calculator->score());
    }

    function testTwoDotFive_Has_Scored()
    {
        $keyboard = new Keyboard();
        $keyboard->add(1);
        $keyboard->add('+');
        $keyboard->add(1.5);

        $calculator = new Calculator($keyboard);

        $this->assertEquals(2.5, $calculator->score());
    }

    function testFifteenDotFive_Has_Scored()
    {
        $keyboard = new Keyboard();
        $keyboard->add(3);
        $keyboard->add('*');
        $keyboard->add(5);
        $keyboard->add('-');
        $keyboard->add(1);
        $keyboard->add('+');
        $keyboard->add(1.5);

        $calculator = new Calculator($keyboard);

        $this->assertEquals(15.5, $calculator->score());
    }

    function testZero_Has_Scored1()
    {
        $keyboard = new Keyboard();
        $keyboard->add(2);
        $keyboard->add('&');
        $keyboard->add(5);

        $calculator = new Calculator($keyboard);

        $this->assertEquals(0, $calculator->score());
    }

    function testThirtyTwo_Has_Scored1()
    {
        $keyboard = new Keyboard();
        $keyboard->add(1);
        $keyboard->add('<<');
        $keyboard->add(5);

        $calculator = new Calculator($keyboard);

        $this->assertEquals(32, $calculator->score());
    }
}
