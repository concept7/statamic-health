# Monitor the health of a Statamic application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/concept7/statamic-health.svg?style=flat-square)](https://packagist.org/packages/concept7/statamic-health)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/concept7/statamic-health/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/concept7/statamic-health/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/concept7/statamic-health/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/concept7/statamic-health/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/concept7/statamic-health.svg?style=flat-square)](https://packagist.org/packages/concept7/statamic-health)

A Laravel package that adds Statamic-specific health checks on top of [spatie/laravel-health](https://github.com/spatie/laravel-health).

## Installation

```bash
composer require concept7/statamic-health
```

## Checks

The following checks are registered automatically:

- **Git Lock** — Detects the presence of `.git/index.lock`, which indicates a stuck or failed Git process that would block Statamic's Git integration.
- **Duplicate IDs** — Scans Statamic's Stache for entries sharing the same ID, which can cause unpredictable behaviour.

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
