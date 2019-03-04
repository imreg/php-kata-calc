<?php
declare(strict_types = 1);

namespace spec\Calculator;

use Calculator\Formatter;
use Calculator\Keyboard\BitwiseKeyboard;
use PhpSpec\ObjectBehavior;

class CalculatorSpec extends ObjectBehavior
{
    function let(BitwiseKeyboard $keyboard, Formatter $formatter)
    {
        $keyboard->keys()->willReturn('0-9.+\-\*\/&\|\^\~\<\>');
        $formatter->format($keyboard);
        $this->beConstructedWith($keyboard, $formatter);
    }

    function it_return_zero_for_empty_array(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([]);
        $formatter->format($keyboard)->willReturn(0);
        $this->display()->shouldReturn(0);
    }

    function it_return_zero_if_division_by_zero_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([1, '/', 0]);
        $formatter->format($keyboard)->willReturn('1/0');
        $this->display()->shouldReturn(0);
    }

    function it_return_zero_if_illegal_character_was_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([1, '+illegal', 1]);
        $formatter->format($keyboard)->willReturn('1+illegal1');
        $this->display()->shouldReturn(0);
    }

    function it_return_one_if_one_without_operation_was_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([1]);
        $formatter->format($keyboard)->willReturn('1');
        $this->display()->shouldReturn(1);
    }

    function it_return_two_if_one_plus_one_were_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([1, '+', 1]);
        $formatter->format($keyboard)->willReturn('1+1');
        $this->display()->shouldReturn(2);
    }

    function it_return_two_dot_five_if_one_plus_one_dot_five_were_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([1, '+', 1.5]);
        $formatter->format($keyboard)->willReturn('1+1.5');
        $this->display()->shouldReturn(2.5);
    }

    function it_return_three_if_five_minus_two_were_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([5, '-', 2]);
        $formatter->format($keyboard)->willReturn('5-2');
        $this->display()->shouldReturn(3);
    }

    function it_return_nine_if_three_times_three_were_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([3, '*', 3]);
        $formatter->format($keyboard)->willReturn('3*3');
        $this->display()->shouldReturn(9);
    }

    function it_return_five_if_ten_devided_by_two_were_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([10, '/', 2]);
        $formatter->format($keyboard)->willReturn('10/2');
        $this->display()->shouldReturn(5);
    }

    function it_return_seven_if_two_or_five_were_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([2, '|', 5]);
        $formatter->format($keyboard)->willReturn('2|5');
        $this->display()->shouldReturn(7);
    }

    function it_return_four_if_one_xor_five_were_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([1, '^', 5]);
        $formatter->format($keyboard)->willReturn('1^5');
        $this->display()->shouldReturn(4);
    }

    function it_return_zero_if_two_xor_five_were_submitted(
        BitwiseKeyboard $keyboard,
        Formatter $formatter
    )
    {
        $keyboard->submit()->willReturn([2, '&', 5]);
        $formatter->format($keyboard)->willReturn('2&5');
        $this->display()->shouldReturn(0);
    }
}
