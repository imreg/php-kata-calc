<?php
declare(strict_types = 1);

namespace Calculator\Keyboard;

class BitwiseKeyboard extends AbstractKeyboard
{
    /**
     * @inheritDoc
     */
    public function keys(): string
    {
        return '0-9.+\-\*\/&\|\^\~\<\>';
    }
}
