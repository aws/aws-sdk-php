<?php

namespace Aws\Tests\Common\Client;

use Aws\Common\Client\ExponentialBackoffOptionResolver;
use Aws\Common\InstanceMetadata\InstanceMetadataClient as Client;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Http\Plugin\ExponentialBackoffPlugin;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Message\RequestFactory;

/**
 * @covers Aws\Common\Client\ExponentialBackoffOptionResolver
 */
class ExponentialBackoffOptionResolverTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage client.backoff must be an instance of Guzzle\Http\Plugin\ExpontialBackoffPlugin
     */
    public function testEnsuresProvidedPluginIsValid()
    {
        $resolver = new ExponentialBackoffOptionResolver();
        $resolver->resolve(new Collection(array(
            Options::BACKOFF => new \stdClass()
        )));
    }

    public function testCreatesDefaultPluginForConfig()
    {
        list($config, $plugin, $resolver) = $this->getMocks();
        // Ensure that an ExponentialBackoff plugin is on the client
        $config->set('resolvers', array($resolver));
        $client = Client::factory();
        $resolver->resolve($config, $client);
        $this->assertTrue($this->hasSubscriber($client, $plugin));
    }

    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage client.backoff.logger must be set to `debug` or an instance of
     */
    public function testValidatesCorrectLogger()
    {
        list($config, $plugin, $resolver) = $this->getMocks();
        $config->set(Options::BACKOFF_LOGGER, 'foo');
        $resolver->resolve($config, $this->getMock('Aws\Common\Client\DefaultClient', array(), array(), '', false));
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage GET http://www.example.com/ - 503 Service Unavailable
     */
    public function testAddsDebugLoggerWhenSetToDebug()
    {
        list($config, $plugin, $resolver) = $this->getMocks();
        $config->set(Options::BACKOFF_LOGGER, 'debug');
        $client = $this->getMock('Aws\Common\Client\DefaultClient', array(), array(), '', false);
        $resolver->resolve($config, $client);
        $listeners = $plugin->getEventDispatcher()->getListeners();
        $this->assertArrayHasKey('plugins.exponential_backoff.retry', $listeners);

        $plugin->dispatch('plugins.exponential_backoff.retry', array(
            'request'  => RequestFactory::getInstance()->create('GET', 'http://www.example.com'),
            'response' => new Response(503),
            'retries'  => 3,
            'delay'    => 2
        ));
    }

    public function testSetsLoggerFormatWhenSpecified()
    {
        list($config, $plugin, $resolver) = $this->getMocks();
        $config->set(Options::BACKOFF_LOGGER, 'debug');
        $config->set(Options::BACKOFF_LOGGER_TEMPLATE, '[{ts}] {url}');
        $client = $this->getMock('Aws\Common\Client\DefaultClient', array(), array(), '', false);
        $resolver->resolve($config, $client);
        $listeners = $plugin->getEventDispatcher()->getListeners();
        $logger = $listeners['plugins.exponential_backoff.retry'][0][0];
        $this->assertEquals('[{ts}] {url}', $this->readAttribute($logger, 'template'));
    }

    private function getMocks()
    {
        $config = new Collection();
        $plugin = new ExponentialBackoffPlugin();
        $resolver = new ExponentialBackoffOptionResolver(function($config, $client = null) use ($plugin) {
            return $plugin;
        });

        return array($config, $plugin, $resolver);
    }
}
