<img src="smpl-logo.png" alt="SMPL" align="left">

# Composer Local Package Repository

A composer plugin to provide a local package repository, allowing you to avoid defining custom repositories in the package `composer.json`, or the global config.

![Packagist Version](https://img.shields.io/packagist/v/smplphp/composer-local-package-repository)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/smplphp/composer-local-package-repository)
![GitHub](https://img.shields.io/github/license/smplphp/composer-local-package-repository)
![Psalm Level](https://shepherd.dev/github/smplphp/composer-local-package-repository/level.svg)

Main:

[![codecov](https://codecov.io/gh/smplphp/composer-local-package-repository/branch/main/graph/badge.svg?token=FHJ41NQMTA)](https://codecov.io/gh/smplphp/composer-local-package-repository)
[![CircleCI](https://circleci.com/gh/smplphp/composer-local-package-repository/tree/main.svg?style=shield)](https://circleci.com/gh/smplphp/composer-local-package-repository/tree/main)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fsmplphp%2Fcomposer-local-package-repository%2Fmain)](https://dashboard.stryker-mutator.io/reports/github.com/smplphp/composer-local-package-repository/main)

Develop:

[![codecov](https://codecov.io/gh/smplphp/composer-local-package-repository/branch/develop/graph/badge.svg?token=FHJ41NQMTA)](https://codecov.io/gh/smplphp/composer-local-package-repository)
[![CircleCI](https://circleci.com/gh/smplphp/composer-local-package-repository/tree/develop.svg?style=shield)](https://circleci.com/gh/smplphp/composer-local-package-repository/tree/develop)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fsmplphp%2Fcomposer-local-package-repository%2Fdevelop)](https://dashboard.stryker-mutator.io/reports/github.com/smplphp/composer-local-package-repository/develop)

## Install

Install via composer.

```bash
composer require smplphp/composer-local-package-repository
```

## Usage

TBW

## Testing

The full test suite of PHPUnit, Infection, PHPStan and Psalm can be run using the following command.

```bash
make test
```

### PHPUnit

To run PHPUnit alone, you can run the following.

```bash
make phpunit
```

Or if you want code-coverage

```bash
make phpunit-coverage
```

### Infection

To run Infection alone, you can run the following.

```bash
make infection
```

Or if you want a report

```bash
make infection-report
```

### PHPStan

To run PHPStan alone, you can run the following.

```bash
make phpstan
```

### Psalm

To run Psalm alone, you can run the following.

```bash
make psalm
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](https://github.com/smplphp/composer-local-package-repository/blob/main/LICENSE.md) for more information.