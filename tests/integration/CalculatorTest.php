<?php
declare(strict_types = 1);

namespace Tests\integration;

use Calculator\Formatter;
use Calculator\Interfaces\FormatterInterface;
use Calculator\Interfaces\KeyboardInterface;
use Calculator\Keyboard\BitwiseKeyboard;
use Calculator\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @var KeyboardInterface
     */
    protected $keyboard;

    /**
     * @var FormatterInterface
     */
    protected $formatter;

    protected function setUp()
    {
        parent::setUp();
        $this->keyboard = new BitwiseKeyboard();
        $this->formatter = new Formatter();
    }

    function testZero_Has_Resulted()
    {
        $calculator = new Calculator($this->keyboard, $this->formatter);

        $this->assertEquals(0, $calculator->display());
    }

    function testOne_Has_Resulted()
    {
        $this->keyboard->add(1);

        $calculator = new Calculator($this->keyboard, $this->formatter);

        $this->assertEquals(1, $calculator->display());
    }

    function testTwo_Has_Resulted()
    {
        $this->keyboard->add(1);
        $this->keyboard->add('+');
        $this->keyboard->add(1);

        $calculator = new Calculator($this->keyboard, $this->formatter);

        $this->assertEquals(2, $calculator->display());
    }

    function testTwoDotFive_Has_Resulted()
    {
        $this->keyboard->add(1);
        $this->keyboard->add('+');
        $this->keyboard->add(1.5);

        $calculator = new Calculator($this->keyboard, $this->formatter);

        $this->assertEquals(2.5, $calculator->display());
    }

    function testFifteenDotFive_Has_Resulted()
    {
        $this->keyboard->add(3);
        $this->keyboard->add('*');
        $this->keyboard->add(5);
        $this->keyboard->add('-');
        $this->keyboard->add(1);
        $this->keyboard->add('+');
        $this->keyboard->add(1.5);

        $calculator = new Calculator($this->keyboard, $this->formatter);

        $this->assertEquals(15.5, $calculator->display());
    }

    function testZeroBitwise_Has_Resulted()
    {
        $this->keyboard->add(2);
        $this->keyboard->add('&');
        $this->keyboard->add(5);

        $calculator = new Calculator($this->keyboard, $this->formatter);

        $this->assertEquals(0, $calculator->display());
    }

    function testZero_Has_Resulted_When_By_Zero_Divison()
    {
        $this->keyboard->add(1);
        $this->keyboard->add('/');
        $this->keyboard->add(0);

        $calculator = new Calculator($this->keyboard, $this->formatter);

        $this->assertEquals(0, $calculator->display());
    }

    function testThirtyTwo_Has_Resulted()
    {
        $this->keyboard->add(1);
        $this->keyboard->add('<<');
        $this->keyboard->add(5);

        $calculator = new Calculator($this->keyboard, $this->formatter);

        $this->assertEquals(32, $calculator->display());
    }

    function testThreeDotFive_Has_Resulted_After_Previous_Was_Deleted()
    {
        $this->keyboard->add(1);
        $this->keyboard->add('+');
        $this->keyboard->add(1.5);
        $this->keyboard->clear();
        $this->keyboard->add(5.5);
        $this->keyboard->add('-');
        $this->keyboard->add(2);

        $calculator = new Calculator($this->keyboard, $this->formatter);

        $this->assertEquals(3.5, $calculator->display());
    }
}
