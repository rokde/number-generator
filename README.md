# number generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rokde/number-generator.svg?style=flat-square)](https://packagist.org/packages/rokde/number-generator)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rokde/number-generator/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rokde/number-generator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rokde/number-generator/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rokde/number-generator/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rokde/number-generator.svg?style=flat-square)](https://packagist.org/packages/rokde/number-generator)

A number generator with placeholders. It creates various number-based formats like invoice numbers or customer numbers.

## Installation

You can install the package via composer:

```bash
composer require rokde/number-generator
```

## Usage

```php
$numberGenerator = new \Rokde\NumberGenerator();
// set placeholders
$numberGenerator->set('YYYY', 2024) // static values
    ->set('index', fn () => str_pad('2', 4, '0', STR_PAD_LEFT)) // dynamic values
    ->set('iban', new IbanValue('DE02120300000000202051', ' ')) // formatter value

// rendering an invoice number
echo $numberGenerator->render('INV-{YYYY}-{index}'); // INV-2024-0002
echo $numberGenerator->render('IBAN: {iban}'); // IBAN: DE02 1203 0000 0000 2020 51
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Robert Kummer](https://github.com/rokde)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
