<?php

namespace Rokde\LaravelNumberGenerator\Formatters;

use Stringable;

class StringValue implements Stringable
{
    public function __construct(
        readonly private string|int $value,
        private string $prefix = '',
        private string $suffix = '',
    ) {
    }

    public function prefix(string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function suffix(string $suffix): self
    {
        $this->suffix = $suffix;

        return $this;
    }

    public function __toString()
    {
        return $this->prefix.((string) $this->value).$this->suffix;
    }
}
