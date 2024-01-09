<?php

namespace Rokde\LaravelNumberGenerator\Formatters;

use Stringable;

readonly class NumberRangeValue implements Stringable
{
    public function __construct(private int $value, private int $offset = 0)
    {
    }

    public function __toString()
    {
        return (string) ($this->offset + $this->value);
    }
}
