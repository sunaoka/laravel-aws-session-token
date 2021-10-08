# Add AWS_SESSION_TOKEN for Laravel 6, 7 and 8

[![Latest](https://poser.pugx.org/sunaoka/laravel-aws-session-token/v)](https://packagist.org/packages/sunaoka/laravel-aws-session-token)
[![License](https://poser.pugx.org/sunaoka/laravel-aws-session-token/license)](https://packagist.org/packages/sunaoka/laravel-aws-session-token)
[![PHP](https://img.shields.io/packagist/php-v/sunaoka/laravel-aws-session-token)](composer.json)
[![Laravel](https://img.shields.io/badge/laravel-6.x%20%7C%207.x%20%7C%208.x-red)](https://laravel.com/)
[![Test](https://github.com/sunaoka/laravel-aws-session-token/actions/workflows/test.yml/badge.svg)](https://github.com/sunaoka/laravel-aws-session-token/actions/workflows/test.yml)
[![codecov](https://codecov.io/gh/sunaoka/laravel-aws-session-token/branch/develop/graph/badge.svg)](https://codecov.io/gh/sunaoka/laravel-aws-session-token)

----

Add AWS_SESSION_TOKEN to Laravel's AWS configuration.

For example, you can use `AWS_SESSION_TOKEN` (without setting `AWS_ACCESS_KEY_ID` or `AWS_SECRET_ACCESS_KEY`) to run your Laravel application in AWS Lambda using [bref](https://bref.sh/).

## Installation

```bash
composer require sunaoka/laravel-aws-session-token
```

```bash
php artisan vendor:publish --tag=aws-session-token-config
```
