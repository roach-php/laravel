# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2022-04-19

### Added

- Added support for `roach-php/core:^1.0`
- Added `default_spider_namespace` configuration option. This option is used by both the
  `roach:spider` and `roach:run` commands

### Fixed

- Fixed bug where `artisan roach:run` command would sometimes not correctly parse namespaces (fixes [#11](https://github.com/roach-php/laravel/issues/11))

### Removed

- Drop support for Laravel 8

## [0.3.1] - 2022-02-01

### Fixed

- Fixed default container bindings not being registered correctly if package config has not been published (fixes #5)

## [0.3.0] - 2022-01-30

### Added

- Added support for Laravel 9

## [0.2.1] - 2022-01-04

### Fixed

- Update incorrect namespace in spider stub (#4). Credits @RyanPriceDotCa

## [0.2.0] - 2021-12-28

### Changed

- Bump `roach-php/core` dependency to `^0.2.0` which includes a middleware to execute
  Javascript on a page.

## [0.1.0] - 2021-12-27

### Added

- Initial release

[1.0.0]: https://github.com/roach-php/laravel/compare/0.3.1...1.0.0
[0.3.1]: https://github.com/roach-php/laravel/compare/0.3.0...0.3.1
[0.3.0]: https://github.com/roach-php/laravel/compare/0.2.1...0.3.0
[0.2.1]: https://github.com/roach-php/laravel/compare/0.2.0...0.2.1
[0.2.0]: https://github.com/roach-php/laravel/compare/0.1.0...0.2.0
