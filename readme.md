# Mobireach SMS Gateway

[![Latest Version on Packagist][ico-packagist-version]][link-packagist]
[![Latest Version on Github][ico-github-version]][link-github]

## Installation

Via Composer

``` bash
$ composer require arifsajal/mobireach-sms-gateway
```
Wait for few minutes. Composer will automatically install the package for your project.

## Usage

Open `config/app.php` And Add Below Line In `Providers` Section

```php
Arifsajal\MobireachSmsGateway\Providers\MobireachServiceProvider::class
```
And for Facade Support, Add Below Line In `aliases` Section
 
```php
"Mobireach" => Arifsajal\MobireachSmsGateway\Facades\Mobireach::class
```
Than run below command

```bash
$ php artisan vendor:publish --provider="Arifsajal\MobireachSmsGateway\Providers\MobireachServiceProvider"
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Ariful Islam][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-packagist-version]: https://img.shields.io/badge/Packagist-1.0-brightgreen.svg
[ico-github-version]: https://img.shields.io/badge/Github-1.0-brightgreen.svg

[link-packagist]: https://packagist.org/packages/arifsajal/mobireach-sms-gateway
[link-github]: https://github.com/arifsajal70/mobireach-sms-gateway
[link-author]: https://github.com/arifsajal70
[link-contributors]: ../../contributors