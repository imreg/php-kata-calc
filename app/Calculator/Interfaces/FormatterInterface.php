<?php
declare(strict_types = 1);

namespace Calculator\Interfaces;


interface FormatterInterface
{
    /**
     * @param KeyboardInterface $keyboard
     * @return string
     */
    public function format(KeyboardInterface $keyboard): string;
}