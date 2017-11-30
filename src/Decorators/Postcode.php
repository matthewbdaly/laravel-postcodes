<?php

namespace Matthewbdaly\LaravelPostcodes\Decorators;

use Matthewbdaly\Postcode\Contracts\Client;
use Illuminate\Contracts\Cache\Repository as Cache;

/**
 * Caching decorator for postcodes
 */
class Postcode implements Client
{
    /**
     * Postcode client
     *
     * @var $client
     */
    protected $client;

    /**
     * Cache
     *
     * @var $cache
     */
    protected $cache;

    /**
     * Constructor
     *
     * @param Client $client The underlying client instance.
     * @param Cache  $cache  The cache instance.
     * @return void
     */
    public function __construct(Client $client, Cache $cache)
    {
        $this->client = $client;
        $this->cache = $cache;
    }

    /**
     * Get base URL
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->client->getBaseUrl();
    }

    /**
     * Get API key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->client->getKey();
    }

    /**
     * Set API key
     *
     * @param string $key The API key.
     * @return Client
     */
    public function setKey(string $key)
    {
        $this->client->setKey($key);
        return $this;
    }

    /**
     * Make the HTTP request
     *
     * @param string $postcode The postcode to look up.
     * @return mixed
     */
    public function get(string $postcode)
    {
        return $this->cache->tags('postcodes')->rememberForever($postcode, function () use ($postcode) {
            return $this->client->get($postcode);
        });
    }
}
