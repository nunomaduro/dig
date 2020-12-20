<p align="center">
    <img src="https://raw.githubusercontent.com/nunomaduro/dig/master/art/example.png" alt="Dig code example">
</p>

<p align="center">
  <a href="https://github.com/nunomaduro/dig/actions"><img src="https://img.shields.io/github/workflow/status/nunomaduro/dig/Static%20Analysis.svg" alt="Build Status"></img</a>
  <a href="https://packagist.org/packages/nunomaduro/dig"><img src="https://poser.pugx.org/nunomaduro/dig/downloads" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/nunomaduro/dig"><img src="https://poser.pugx.org/nunomaduro/dig/v" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/nunomaduro/dig"><img src="https://poser.pugx.org/nunomaduro/dig/license" alt="License"></a>
</p>

---

Dig was created by, and is maintained by **[Nuno Maduro](https://github.com/nunomaduro)**, and is a beautiful debug tool for the command line.

## Installation & Usage

> **Requires [PHP 7.4+](https://php.net/releases/)**

Require Dig using [Composer](https://getcomposer.org):

```bash
composer require nunomaduro/dig --dev
```

## Usage

### `caller()`

The `caller()` method provide the function or method that invoked the currently executing function.

```php
dig()->caller();
```

## Contributing

Thank you for considering to contribute to Dig. All the contribution guidelines are mentioned [here](CONTRIBUTING.md).

You can have a look at the [CHANGELOG](CHANGELOG.md) for constant updates & detailed information about the changes. You can also follow the twitter account for latest announcements or just come say hi!: [@enunomaduro](https://twitter.com/enunomaduro)

## License

Dig is an open-sourced software licensed under the [MIT license](LICENSE.md).
