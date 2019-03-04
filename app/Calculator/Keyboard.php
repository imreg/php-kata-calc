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
     * @param $value
     */
    public function add($value)
    {
        $this->dataSet[] = $value;
    }

    /**
     * @return array
     */
    public function submit(): array
    {
        return $this->dataSet;
    }
}
