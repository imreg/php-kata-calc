<?php
declare(strict_types = 1);

namespace Calculator\Interfaces;

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
     * @return void
     */
    public function clear();

    /**
     * @return string
     */
    public function keys(): string;
}
