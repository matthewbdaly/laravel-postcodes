<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;
use Mockery as m;
use Postcode;

class ServiceProviderTest extends TestCase
{
    public function testSetup()
    {
        $this->app['config']->set('postcode.api_key', 'foo');
        $client = $this->app->make('Matthewbdaly\Postcode\Contracts\Client');
        $this->assertInstanceOf(\Matthewbdaly\Postcode\Client::class, $client);
    }

    public function testFacade()
    {
        $this->app['config']->set('postcode.api_key', 'foo');
        $mock = m::mock('Matthewbdaly\Postcode\Contracts\Client');
        $mock->shouldReceive('get')->with('ID1 1QD')->once()->andReturn(true);
        $this->app->instance('Matthewbdaly\Postcode\Contracts\Client', $mock);
        $this->assertTrue(Postcode::get('ID1 1QD'));
    }

    public function testInject()
    {
        $client = $this->app->make('Matthewbdaly\Postcode\Contracts\Client');
        $this->assertInstanceOf('Matthewbdaly\Postcode\Contracts\Client', $client);
        $this->assertInstanceOf('Matthewbdaly\Postcode\Client', $client);
    }
}
