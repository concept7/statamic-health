# Monitor the health of a Statamic application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/concept7/statamic-health.svg?style=flat-square)](https://packagist.org/packages/concept7/statamic-health)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/concept7/statamic-health/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/concept7/statamic-health/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/concept7/statamic-health/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/concept7/statamic-health/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/concept7/statamic-health.svg?style=flat-square)](https://packagist.org/packages/concept7/statamic-health)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

Todo:

## Installation

You can install the package via composer:

```bash
composer require concept7/statamic-health
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="statamic-health-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="statamic-health-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="statamic-health-views"
```

## Usage

Health checks:
No duplicate IDs detected.
No unconfigured indexes.

```php
$health = new Concept7\Health();
echo $health->echoPhrase('Hello, Concept7!');
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

- [Jan Henk Hazelaar](https://github.com/concept7)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
