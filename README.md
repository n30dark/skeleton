# tfclog

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is a Database Logging package to be used with TFC International Systems.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require tfc/tfclog
```

## Usage

``` php
$logger = new tfc\tfclog\PDOLogger();
echo $logger->logSuccess('Success logged!', 'user');

$logger = new tfc\tfclog\DynamoLogger();
echo $logger->logSuccess('Success logged!', 'user');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email sergio.paulino@thefirstclub.com instead of using the issue tracker.

## Credits

- [Sergio Paulino][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/tfc/tfclog.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/tfc/tfclog/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/tfc/tfclog.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/tfc/tfclog.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tfc/tfclog.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tfc/tfclog
[link-travis]: https://travis-ci.org/tfc/tfclog
[link-scrutinizer]: https://scrutinizer-ci.com/g/tfc/tfclog/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/tfc/tfclog
[link-downloads]: https://packagist.org/packages/tfc/tfclog
[link-author]: https://github.com/n30dark
[link-contributors]: ../../contributors
