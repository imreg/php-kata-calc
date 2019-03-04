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
    public function score()
    {
        $dataSet = implode('', $this->keyboard->submit());

        if (preg_match('/^[0-9.+\-\*\/&\|\^\~\<\>]+$/', $dataSet)) {
            return eval('return ' . $dataSet .';');
        }

        return 0;
    }
}
