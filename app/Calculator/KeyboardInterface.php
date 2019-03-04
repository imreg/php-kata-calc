<?php
declare(strict_types = 1);

namespace Calculator;


interface KeyboardInterface
{
    /**
     * @param $value
     */
    public function add($value);

    /**
     * @return array
     */
    public function submit(): array;

    /**
     * @return string
     */
    public function keys(): string;
}
