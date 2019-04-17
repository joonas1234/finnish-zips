# FinnishZips

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require spacha/finnish-zips
```

## Usage

After you have installed the package and also set up the service provider and facade, you can start using it right away.
```PHP
use FinnishZips;
```

## Basic Usage

You can get the area name for given zip code easily. You can pass the code either as `integer` or numeric `string`.
``` PHP
echo FinnishZips::getArea(00100);       // => "PK-seutu"
echo FinnishZips::getArea('90520');     // => "Oulun seutu"
```

You can also get a numeric key specific for the area. It can be useful when it's used in computing.
``` PHP
echo FinnishZips::getAreaKey('90520');  // => 7
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email miikasikala96@gmail.com instead of using the issue tracker.

## Credits

- [Miika Sikala][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/spacha/finnishzips.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/spacha/finnishzips.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/spacha/finnishzips/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/spacha/finnishzips
[link-downloads]: https://packagist.org/packages/spacha/finnishzips
[link-travis]: https://travis-ci.org/spacha/finnishzips
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/spacha
[link-contributors]: ../../contributors
