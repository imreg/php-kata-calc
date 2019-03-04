<?php
declare(strict_types = 1);

namespace Calculator\Keyboard;

abstract class AbstractKeyboard implements KeyboardInterface
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
    public function clear()
    {
        $this->dataSet = [];
    }

    /**
     * @inheritDoc
     */
    abstract public function keys(): string;
}
