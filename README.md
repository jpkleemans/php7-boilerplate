# PHP7 Boilerplate

[![Gitter][gitter-image]][gitter-url]
[![Packagist][packagist-image]][packagist-url]
[![Licence][license-image]][license-url]

[![SensioLabsInsight][insight-image]][insight-url]

PHP7 Boilerplate is a tiny (40 LLOC), yet powerful foundation for building modern web applications.
It does not impose a specific development philosophy or (micro)framework, so you're free to structure the code the way you want.

## Features

* Dependency Injection using [PHP-DI](https://github.com/PHP-DI/PHP-DI).
* [PSR-7](https://github.com/php-fig/http-message) middleware using [Relay](https://github.com/relayphp/Relay.Relay) and [zend-diactoros](https://github.com/zendframework/zend-diactoros).
* Tests using [PHPUnit](https://github.com/sebastianbergmann/phpunit).
* Web server with [nginx](http://nginx.org/) and [PHP-FPM](http://php-fpm.org/) using [Docker](https://github.com/docker/docker).

## Quick start

Create a new project with Composer:

```bash
composer create-project relevo/php7-boilerplate <project-path>
```

Go to the `<project-path>` and start the web server with Docker Compose:

```bash
docker-compose up
```

That's it! Your application will be available at `localhost` if you're using Linux, or at the IP address of the Docker Machine if you're on Mac OS X or Windows.

[gitter-image]: https://img.shields.io/gitter/room/relevo/php7-boilerplate.svg?style=flat-square
[gitter-url]: https://gitter.im/relevo/php7-boilerplate
[packagist-image]: https://img.shields.io/packagist/v/relevo/php7-boilerplate.svg?style=flat-square
[packagist-url]: https://packagist.org/packages/relevo/php7-boilerplate
[license-image]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[license-url]: https://github.com/relevo/php7-boilerplate/blob/master/LICENSE.md
[insight-image]: https://insight.sensiolabs.com/projects/35d0d0f3-0f25-48bf-911c-655083f79cec/big.png
[insight-url]: https://insight.sensiolabs.com/projects/35d0d0f3-0f25-48bf-911c-655083f79cec
