<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

use Aws\Common\Client\ClientBuilder;
use Aws\DynamoDb\DynamoDbClient;
use Aws\Common\Signature\SignatureV4;
use Aws\Common\Client\BackoffOptionResolver;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Aws\Common\Client\CredentialsOptionResolver;
use Aws\Common\Client\SignatureOptionResolver;
use Aws\Common\Credentials\Credentials;
use Guzzle\Common\Collection;
use Guzzle\Plugin\Backoff\BackoffPlugin;

/**
 * Note: The tests for the build method do not mock anything
 *
 * @covers Aws\Common\Client\ClientBuilder
 */
class ClientBuilderTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testBuild()
    {
        $client = ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfig(array())
            ->setConfigDefaults(array(
                'scheme'   => 'https',
                'region'   => 'us-east-1',
                'service'  => 'dynamodb',
            ))
            ->setConfigRequirements(array('scheme'))
            ->setSignature(new SignatureV4())
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->setIteratorsConfig(array('token_param' => 'foo'))
            ->build();

        $this->assertInstanceOf('Aws\DynamoDb\DynamoDbClient', $client);
    }

    public function testBuildAlternate()
    {
        $client = ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfigDefaults(array(
                'scheme'  => 'https',
                'region'  => 'us-west-1',
                'service' => 'dynamodb'
            ))
            ->setCredentialsResolver(new CredentialsOptionResolver(function (Collection $config) {
                return Credentials::factory($config->getAll(array_keys(Credentials::getConfigDefaults())));
            }))
            ->setSignatureResolver(new SignatureOptionResolver(function () {
                return new SignatureV4();
            }))
            ->addClientResolver(new BackoffOptionResolver(function() {
                return BackoffPlugin::getExponentialBackoff();
            }))
            ->build();

        $this->assertInstanceOf('Aws\DynamoDb\DynamoDbClient', $client);
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testBuildThrowsExceptionWithoutSignature()
    {
        $client = ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfigDefaults(array(
                'region'  => 'us-east-1',
                'service' => 's3'
            ))
            ->build();

        $this->assertInstanceOf('Aws\DynamoDb\DynamoDbClient', $client);
    }

    public function getDataForProcessArrayTest()
    {
        return array(
            array(
                array('foo' => 'bar', 'bar' => 'baz'),
                array('foo' => 'bar', 'bar' => 'baz'),
            ),
            array(
                new Collection(array('foo' => 'bar', 'bar' => 'baz')),
                array('foo' => 'bar', 'bar' => 'baz'),
            ),
            array(
                'foo',
                null
            )
        );
    }

    /**
     * @dataProvider getDataForProcessArrayTest
     */
    public function testProcessArrayProcessesCorrectly($input, $expected)
    {
        $builder = ClientBuilder::factory('Aws\\DynamoDb');

        try {
            $builder->setConfig($input);
            $actual = $this->readAttribute($builder, 'config');
        } catch (\InvalidArgumentException $e) {
            $actual = null;
        }

        $this->assertEquals($expected, $actual);
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage You must specify a [base_url] or a [region, service, and optional scheme]
     */
    public function testEnsuresBaseUrlOrServiceAndRegionAreSet()
    {
        $builder = ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfig(array('region'  => 'us-west-1'))
            ->build();
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage A signature has not been provided
     */
    public function testEnsuresSignatureIsProvided()
    {
        $builder = ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfig(array(
                'region'  => 'us-west-1',
                'service' => 'dynamodb',
                'scheme'  => 'http'
            ))
            ->build();
    }
}
