<?php
declare(strict_types = 1);

namespace Calculator;

final class Calculator
{
    /**
     * @var KeyboardInterface
     */
    private $keyboard;

    /**
     * Calculator constructor.
     * @param KeyboardInterface $keyboard
     */
    public function __construct(KeyboardInterface $keyboard)
    {
        $this->keyboard = $keyboard;
    }

    /**
     * @return int|float
     */
    public function result()
    {
        $dataSet = implode('', $this->keyboard->submit());

        if (preg_match('/^[' . $this->keyboard->keys() . ']+$/', $dataSet)) {
            return eval('return ' . $dataSet . ';');
        }

        return 0;
    }
}
