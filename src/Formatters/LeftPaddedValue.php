<?php

namespace Rokde\LaravelNumberGenerator\Formatters;

use Stringable;

readonly class LeftPaddedValue implements Stringable
{
    public function __construct(private string|int $value, private int $length, private string $padString = '0')
    {
    }

    public function __toString()
    {
        return str_pad($this->value, $this->length, $this->padString, STR_PAD_LEFT);
    }
}
