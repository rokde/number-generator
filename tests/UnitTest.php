<?php

use Rokde\LaravelNumberGenerator\Formatters\LeftPaddedValue;
use Rokde\LaravelNumberGenerator\NumberGenerator;

it('passes through any string', function () {
    $generator = new NumberGenerator();
    expect($generator->render('any string'))->toBe('any string');
});

it('renders string template and replaces all placeholders with empty string when no replacement configured',
    function () {
        $template = 'INV-{YYYY}-{index}';

        $generator = new NumberGenerator();
        expect($generator->render($template))->toBe('INV--');
    });

it('replaces placeholders with static values', function () {
    $template = 'INV-{YYYY}-{index}';

    $generator = new NumberGenerator();
    $generator->set('YYYY', 2024)
        ->set('index', 1);

    expect($generator->render($template))->toBe('INV-2024-1');
});

it('uses case-sensitive placeholders', function () {
    $template = 'INV-{INDEX}-{index}';

    $generator = new NumberGenerator();
    $generator->set('INDEX', 'A')
        ->set('index', 1);

    expect($generator->render($template))->toBe('INV-A-1');
});

it('replaces placeholders with callable values', function () {
    $template = 'INV-{YYYY}-{index}';

    $generator = new NumberGenerator();
    $generator->set('YYYY', fn () => date('Y'))
        ->set('index', fn () => str_pad('2', 4, '0', STR_PAD_LEFT));

    $year = date('Y');
    expect($generator->render($template))->toBe("INV-{$year}-0002");
});

it('replaces placeholders with formatted values', function () {
    $template = 'INV-{YYYY}-{index}';

    $generator = new NumberGenerator();
    $generator->set('YYYY', fn () => date('Y'))
        ->set('index', new LeftPaddedValue(2, 4));

    $year = date('Y');
    expect($generator->render($template))->toBe("INV-{$year}-0002");
});
