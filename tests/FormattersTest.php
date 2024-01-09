<?php

use Rokde\LaravelNumberGenerator\Formatters\IbanValue;
use Rokde\LaravelNumberGenerator\Formatters\LeftPaddedValue;
use Rokde\LaravelNumberGenerator\Formatters\NumberRangeValue;
use Rokde\LaravelNumberGenerator\Formatters\StringValue;

it('formats with LeftPaddedValue', function () {
    expect((string) new LeftPaddedValue(2, 4))
        ->toBe('0002');
});

it('formats with IbanValue', function () {
    expect((string) new IbanValue('DE02120300000000202051', ' '))
        ->toBe('DE02 1203 0000 0000 2020 51');
});

it('formats with NumberRangeValue', function () {
    expect((string) new NumberRangeValue(1, 10000))
        ->toBe('10001');
});

it('formats with StringValue', function () {
    expect((string) (new StringValue('world'))->prefix('Hello ')->suffix('!'))
        ->toBe('Hello world!');
});
