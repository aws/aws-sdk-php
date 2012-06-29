<?php

namespace Aws\Tests\Common\Client;

use Aws\Common\Client\ExponentialBackoffOptionResolver;
use Aws\Common\InstanceMetadata\InstanceMetadataClient as Client;
use Guzzle\Common\Collection;
use Guzzle\Http\Plugin\ExponentialBackoffPlugin;

/**
 * @covers Aws\Common\Client\ExponentialBackoffOptionResolver
 */
class ExponentialBackoffOptionResolverTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage client.exponential_backoff must be an instance of Guzzle\Http\Plugin\ExpontialBackoffPlugin
     */
    public function testEnsuresProvidedPluginIsValid()
    {
        $resolver = new ExponentialBackoffOptionResolver();
        $resolver->resolve(new Collection(array(
            'client.exponential_backoff' => new \stdClass()
        )));
    }

    public function testCreatesDefaultPluginForConfig()
    {
        $config = new Collection();
        $plugin = new ExponentialBackoffPlugin();
        $resolver = new ExponentialBackoffOptionResolver(function($config, $client = null) use ($plugin) {
            return $plugin;
        });

        // Ensure that an ExponentialBackoff plugin is on the client
        $config->set('resolvers', array($resolver));

        $client = Client::factory();
        $resolver->resolve($config, $client);
        $this->assertTrue($this->hasSubscriber($client, $plugin));
    }
}
