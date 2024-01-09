<?php

namespace Rokde\LaravelNumberGenerator\Formatters;

use Stringable;

readonly class IbanValue implements Stringable
{
    public function __construct(private string $value, private string $colonString = ' ')
    {
    }

    public function __toString()
    {
        return implode($this->colonString, str_split($this->value, 4));
    }
}
