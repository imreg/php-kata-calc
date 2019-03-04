<?php

namespace spec\Calculator;

use Calculator\Formatter;
use Calculator\Keyboard\BitwiseKeyboard;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormatterSpec extends ObjectBehavior
{
    function it_return_one_plus_pne_in_string_if_one_and_plus_and_one_are_in_array(
        BitwiseKeyboard $keyboard
    )
    {
        $keyboard->submit()->willReturn([1, '+', 1]);
        $this->format($keyboard)->shouldReturn('1+1');
    }
}
