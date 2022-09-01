Laravel Medium SDK
================
[![Tests](https://github.com/jonathantorres/laravel-medium-sdk/actions/workflows/tests.yml/badge.svg)](https://github.com/jonathantorres/laravel-medium-sdk/actions/workflows/tests.yml)

Laravel Service Provider for Medium's SDK for PHP. Version `6.x` of the framework is currently supported. Documentation for the SDK can be found [here](https://github.com/jonathantorres/medium-sdk-php).

#### Installation via Composer
```bash
$ composer require jonathantorres/laravel-medium-sdk
```

#### Register the Service Provider
Add the Service Provider to your application's `config/app.php` file. Must be added to the `providers` array.
```php
'providers' => [
    JonathanTorres\LaravelMediumSdk\LaravelMediumSdkServiceProvider::class,
]
```

#### Publish configuration file
This will publish the configuration file to your app's `config` directory. The location will be `config/laravel-medium-sdk.php`. Specify your API settings there.
```bash
php artisan vendor:publish
```

#### Resolve from Laravel's service container
Now just resolve the `JonathanTorres\LaravelMediumSdk\LaravelMediumSdk` class from Laravel's service container and start making requests to Medium's API using your credentials. More details on every method for the SDK can be found [here](https://github.com/jonathantorres/medium-sdk-php).
```php
// using the App facade
$medium = App::make(JonathanTorres\LaravelMediumSdk\LaravelMediumSdk::class);

// resolving from a controller method
public function index(JonathanTorres\LaravelMediumSdk\LaravelMediumSdk $medium)
{
    // use $medium here
}
```

#### Running tests
```bash
$ composer test
```

#### License
This library is licensed under the MIT license. Please see [LICENSE](LICENSE.md) for more details.

#### Changelog
Please see [CHANGELOG](CHANGELOG.md) for more details.

#### Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for more details.
