<?php
declare(strict_types = 1);

namespace Calculator;

class Keyboard implements KeyboardInterface
{
    /**
     * @var array
     */
    private $dataSet = [];

    /**
     * @inheritDoc
     */
    public function add($value)
    {
        $this->dataSet[] = $value;
    }

    /**
     * @inheritDoc
     */
    public function submit(): array
    {
        return $this->dataSet;
    }

    /**
     * @inheritDoc
     */
    public function keys(): string
    {
        return '0-9.+\-\*\/&\|\^\~\<\>';
    }
}
