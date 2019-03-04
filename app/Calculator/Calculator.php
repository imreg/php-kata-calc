<?php
declare(strict_types = 1);

namespace Calculator;

use Calculator\Interfaces\FormatterInterface;
use Calculator\Interfaces\KeyboardInterface;

final class Calculator
{
    /**
     * @var KeyboardInterface
     */
    private $keyboard;

    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * Calculator constructor.
     * @param KeyboardInterface $keyboard
     * @param FormatterInterface $formatter
     */
    public function __construct(KeyboardInterface $keyboard, FormatterInterface $formatter)
    {
        $this->keyboard = $keyboard;
        $this->formatter = $formatter;
    }

    /**
     * @return int|float
     */
    public function display()
    {
        $dataSet = $this->formatter->format($this->keyboard);

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
