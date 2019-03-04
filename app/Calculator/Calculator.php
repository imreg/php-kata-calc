<?php
declare(strict_types = 1);

namespace Calculator;

use Calculator\Keyboard\KeyboardInterface;

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
            try {
                return eval('return ' . $dataSet . ';');
            }catch (\Exception $exception) {
                return 0;
            }
        }

        return 0;
    }
}
