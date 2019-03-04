<?php
declare(strict_types = 1);

namespace spec\Calculator;

use PhpSpec\ObjectBehavior;

class KeyboardSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith();
    }

    function it_return_array_with_one_item_if_add_one_to_the_dataset()
    {
        $this->add(1);
        $this->submit()->shouldReturn([1]);
    }

    function it_return_array_with_three_items_if_add_basic_calculation_to_the_dataset()
    {
        $this->add(1);
        $this->add('+');
        $this->add(1);
        $this->submit()->shouldReturn([1,'+',1]);
    }
}
