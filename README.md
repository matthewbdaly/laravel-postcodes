# laravel-postcodes
Laravel Postcode lookup integration
[![Build Status](https://travis-ci.org/matthewbdaly/laravel-postcodes.svg?branch=master)](https://travis-ci.org/matthewbdaly/laravel-postcodes)
[![Coverage Status](https://coveralls.io/repos/github/matthewbdaly/laravel-postcodes/badge.svg?branch=master)](https://coveralls.io/github/matthewbdaly/laravel-postcodes?branch=master)

UK postcode lookup service provider for Laravel and Lumen. Uses [Postcode Client](https://github.com/matthewbdaly/postcode-client) to enable lookups using Ideal Postcodes.

Note that this service provider caches lookups indefinitely, since they don't change too often, but you may want to clear the cache from time to time. To do this, flush the `postcodes` tag.

Installation for Laravel
------------------------

This package is only intended for Laravel 5.5 and up. Install it with the following command:

```bash
$ composer require matthewbdaly/laravel-postcodes
```

Then publish the config file:

```bash
$ php artisan vendor:publish
```

And add your API key to the `.env` file:

```bash
IDEAL_POSTCODES_API_KEY=foo
```
