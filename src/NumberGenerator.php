<?php

namespace Rokde\LaravelNumberGenerator;

use Stringable;

class NumberGenerator
{
    private string $pattern = '~\{(?<placeholder>[^\}]*)\}~';

    private array $replacements = [];

    public function render(string $template): string
    {
        return preg_replace_callback(
            $this->pattern,
            function ($match) {
                $placeholder = $match['placeholder'];

                if (! array_key_exists($placeholder, $this->replacements)) {
                    return '';
                }

                $replacement = $this->replacements[$placeholder];
                if (is_callable($replacement)) {
                    $replacement = call_user_func($replacement);
                }

                return (string) $replacement;
            },
            $template,
        );
    }

    public function set(string $key, string|int|float|callable|Stringable $value): self
    {
        $this->replacements[$key] = $value;

        return $this;
    }
}
