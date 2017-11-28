<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
	protected function getPackageProviders($app)
	{
		return ['Matthewbdaly\LaravelPostcodes\Providers\PostcodesProvider'];
	}

	protected function getPackageAliases($app)
	{
		return [
			'Postcode' => 'Matthewbdaly\LaravelPostcodes\Facade'
		];
	}
}
