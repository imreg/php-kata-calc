<?php
declare(strict_types = 1);

namespace Calculator;

use Calculator\Interfaces\FormatterInterface;
use Calculator\Interfaces\KeyboardInterface;

class Formatter implements FormatterInterface
{
    /**
     * @inheritDoc
     */
    public function format(KeyboardInterface $keyboard): string
    {
        return implode('', $keyboard->submit());
    }
}
