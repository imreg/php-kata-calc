<?php
declare(strict_types = 1);

namespace spec\Calculator;

use Calculator\Keyboard;
use PhpSpec\ObjectBehavior;

class CalculatorSpec extends ObjectBehavior
{
    function let(Keyboard $keyboard)
    {
        $keyboard->keys()->willReturn('0-9.+\-\*\/&\|\^\~\<\>');
        $this->beConstructedWith($keyboard);
    }

    function it_return_zero_for_empty_array(Keyboard $keyboard)
    {
        $keyboard->submit()->willReturn([]);
        $this->result()->shouldReturn(0);
    }

    function it_return_zero_if_illegal_character_was_submitted(
        Keyboard $keyboard
    )
    {
        $keyboard->submit()->willReturn([1, '+illegal', 1]);
        $this->result()->shouldReturn(0);
    }

    function it_return_one_if_one_without_operation_was_submitted(
        Keyboard $keyboard
    )
    {
        $keyboard->submit()->willReturn([1]);
        $this->result()->shouldReturn(1);
    }

    function it_return_two_if_one_plus_one_were_submitted(Keyboard $keyboard)
    {
        $keyboard->submit()->willReturn([1, '+', 1]);
        $this->result()->shouldReturn(2);
    }

    function it_return_two_dot_five_if_one_plus_one_dot_five_were_submitted(
        Keyboard $keyboard
    )
    {
        $keyboard->submit()->willReturn([1, '+', 1.5]);
        $this->result()->shouldReturn(2.5);
    }

    function it_return_three_if_five_minus_two_were_submitted(Keyboard $keyboard)
    {
        $keyboard->submit()->willReturn([5, '-', 2]);
        $this->result()->shouldReturn(3);
    }

    function it_return_nine_if_three_times_three_were_submitted(Keyboard $keyboard)
    {
        $keyboard->submit()->willReturn([3, '*', 3]);
        $this->result()->shouldReturn(9);
    }

    function it_return_five_if_ten_devided_by_two_were_submitted(Keyboard $keyboard)
    {
        $keyboard->submit()->willReturn([10, '/', 2]);
        $this->result()->shouldReturn(5);
    }

    function it_return_seven_if_two_or_five_were_submitted(Keyboard $keyboard)
    {
        $keyboard->submit()->willReturn([2, '|', 5]);
        $this->result()->shouldReturn(7);
    }

    function it_return_four_if_one_xor_five_were_submitted(Keyboard $keyboard)
    {
        $keyboard->submit()->willReturn([1, '^', 5]);
        $this->result()->shouldReturn(4);
    }

    function it_return_zero_if_two_xor_five_were_submitted(Keyboard $keyboard)
    {
        $keyboard->submit()->willReturn([2, '&', 5]);
        $this->result()->shouldReturn(0);
    }
}
