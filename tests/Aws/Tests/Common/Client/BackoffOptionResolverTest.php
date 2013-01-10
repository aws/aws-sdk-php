<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Tests\Common\Client;

use Aws\Common\Client\BackoffOptionResolver;
use Aws\Common\InstanceMetadata\InstanceMetadataClient as Client;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Plugin\Backoff\BackoffPlugin;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Message\RequestFactory;

/**
 * @covers Aws\Common\Client\BackoffOptionResolver
 */
class BackoffOptionResolverTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage client.backoff must be an instance of Guzzle\Plugin\Backoff\BackoffPlugin
     */
    public function testEnsuresProvidedPluginIsValid()
    {
        $resolver = new BackoffOptionResolver();
        $resolver->resolve(new Collection(array(
            Options::BACKOFF => new \stdClass()
        )));
    }

    public function testCreatesDefaultPluginForConfig()
    {
        list($config, $plugin, $resolver) = $this->getMocks();
        // Ensure that an backoff plugin is on the client
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
        $this->assertArrayHasKey('plugins.backoff.retry', $listeners);

        $plugin->dispatch('plugins.backoff.retry', array(
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
        $logger = $listeners['plugins.backoff.retry'][0][0];
        $this->assertEquals('[{ts}] {url}', $this->readAttribute($this->readAttribute($logger, 'formatter'), 'template'));
    }

    private function getMocks()
    {
        $config = new Collection();
        $plugin = BackoffPlugin::getExponentialBackoff();
        $resolver = new BackoffOptionResolver(function($config, $client = null) use ($plugin) {
            return $plugin;
        });

        return array($config, $plugin, $resolver);
    }
}
