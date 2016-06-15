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

use Aws\Common\Aws;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Aws\Common\Credentials\Credentials;
use Aws\DynamoDb\DynamoDbClient;
use Guzzle\Common\Collection;
use Guzzle\Plugin\Backoff\BackoffPlugin;
use Guzzle\Plugin\Backoff\TruncatedBackoffStrategy;

/**
 * Note: The tests for the build method do not mock anything
 *
 * @covers Aws\Common\Client\ClientBuilder
 */
class ClientBuilderTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected $dynamoDbDescription;
    protected $iamDescription;

    public function setUp()
    {
        $this->dynamoDbDescription = __DIR__ . '/../../../../../src/Aws/DynamoDb/Resources/dynamodb-2012-08-10.php';
        $this->iamDescription = __DIR__ . '/../../../../../src/Aws/Iam/Resources/iam-2010-05-08.php';
    }

    public function testBuild()
    {
        $client = ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfig(array())
            ->setConfigDefaults(array(
                'scheme'   => 'https',
                'region'   => 'us-east-1',
                'service'  => 'dynamodb',
                'service.description' => $this->dynamoDbDescription
            ))
            ->setConfigRequirements(array('scheme'))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->setIteratorsConfig(array('input_token' => 'foo'))
            ->build();

        $this->assertInstanceOf('Aws\DynamoDb\DynamoDbClient', $client);
    }

    public function testUsesGlobalEndpoint()
    {
        $client = ClientBuilder::factory('Aws\\Iam')
            ->setConfig(array())
            ->setConfigDefaults(array(
                'service' => 'iam',
                'service.description' => $this->iamDescription
            ))
            ->build();
        $this->assertInstanceOf('Aws\Iam\IamClient', $client);
        $this->assertEquals('https://iam.amazonaws.com', $client->getBaseUrl());

        $client = ClientBuilder::factory('Aws\\Iam')
            ->setConfig(array('region' => 'us-west-2'))
            ->setConfigDefaults(array(
                'service' => 'iam',
                'service.description' => $this->iamDescription
            ))
            ->build();
        $this->assertInstanceOf('Aws\Iam\IamClient', $client);
        $this->assertEquals('https://iam.amazonaws.com', $client->getBaseUrl());
        $this->assertEquals('us-east-1', $client->getConfig(Options::SIGNATURE_REGION));

        $client = ClientBuilder::factory('Aws\\Iam')
            ->setConfig(array('region' => 'cn-north-1'))
            ->setConfigDefaults(array(
                'service' => 'iam',
                'service.description' => $this->iamDescription
            ))
            ->build();
        $this->assertInstanceOf('Aws\Iam\IamClient', $client);
        $this->assertEquals('https://iam.cn-north-1.amazonaws.com.cn', $client->getBaseUrl());
    }

    public function testBuildAlternate()
    {
        $client = ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfigDefaults(array(
                'scheme'  => 'https',
                'region'  => 'us-west-1',
                'service' => 'dynamodb',
                'service.description' => $this->dynamoDbDescription,
                'credentials' => Credentials::factory(array('key' => 'foo', 'secret' => 'bar')),
                'client.backoff' => BackoffPLugin::getExponentialBackoff()
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
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A region is required
     */
    public function testEnsuresDescriptionsContainRegions()
    {
        ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfig(array('service.description' => array('signatureVersion' => 'v2')))
            ->build();
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The provided signature is not a signature version string or an instance of Aws\Common\Signature\SignatureInterface
     */
    public function testEnsuresSignatureIsProvided()
    {
        ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfig(array(
                'region'  => 'us-west-1',
                'service' => 'dynamodb',
                'scheme'  => 'http',
                'service.description' => array(
                    'regions' => array('us-west-1' => array('hostname' => 'foo', 'http' => true))
                )
            ))
            ->build();
    }

    public function signatureVersionProvider()
    {
        return array(
            array('v4', 'Aws\\Common\\Signature\\SignatureV4'),
            array('v2', 'Aws\\Common\\Signature\\SignatureV2'),
            array('v3https', 'Aws\\Common\\Signature\\SignatureV3Https'),
            array('foo', false)
        );
    }

    /**
     * @dataProvider signatureVersionProvider
     */
    public function testCanCreateSignaturesBasedOnSignatureStringIdentifier($str, $type)
    {
        try {
            $client = ClientBuilder::factory()
                ->setConfig(array(
                    'service' => 'foo',
                    'region' => 'us-east-1',
                    'signature' => $str,
                    'service.description' => array(
                        'signatureVersion' => 'v2',
                        'regions' => array('us-east-1' => array('https' => true, 'hostname' => 'baz'))
                    )
                ))
                ->build();
            $this->assertInstanceOf($type, $client->getSignature());
        } catch (\InvalidArgumentException $e) {
            if ($type !== false) {
                throw $e;
            }
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A region is required
     */
    public function testEnsuresExceptionIsThrownWhenMissingRequiredRegion()
    {
        ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfig(array(
                'service' => 'dynamodb',
                'service.description' => array(
                    'signatureVersion' => 'v2',
                    'regions' => array('us-east-1' => array())
                )
            ))
            ->build();
    }

    public function testAddsDefaultCredentials()
    {
        $_SERVER['HOME'] = '/tmp';
        unset($_SERVER[Credentials::ENV_KEY], $_SERVER[Credentials::ENV_SECRET]);
        putenv('AWS_ACCESS_KEY_ID=');
        putenv('AWS_SECRET_KEY=');

        $creds = Credentials::factory(array('key' => 'foo', 'secret' => 'bar'));
        $config = array(
            'service' => 'dynamodb',
            'region'  => 'us-east-1',
            'credentials' => $creds,
            'service.description' => array(
                'signatureVersion' => 'v2',
                'regions' => array('us-east-1' => array('https' => true, 'hostname' => 'foo.com'))
            )
        );

        // Ensure that specific credentials can be used
        $client1 = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertSame($creds, $client1->getCredentials());

        // Ensure that the instance metadata service is called when no credentials are supplied
        $imc = $this->getMock(
            'Aws\Common\InstanceMetadata\InstanceMetadataClient',
            array('getInstanceProfileCredentials'),
            array($this->getMock('Guzzle\Common\Collection'))
        );
        $imc->expects($this->any())->method('getInstanceProfileCredentials')
            ->willThrowException(new \Aws\Common\Exception\InstanceProfileCredentialsException);
        unset($config['credentials']);
        $config['credentials.client'] = $imc;
        $client2 = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        try {
            $client2->getCredentials()->getAccessKeyId();
            $this->fail('An InstanceProfileCredentialsException should have been thrown.');
        } catch (\Exception $e) {
            $this->assertInstanceOf('Aws\Common\Exception\InstanceProfileCredentialsException', $e);
        }

        // Ensure that environment credentials are picked up if supplied via $_SERVER
        $_SERVER[Credentials::ENV_KEY] = 'server-key';
        $_SERVER[Credentials::ENV_SECRET] = 'server-secret';
        $client3 = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertEquals('server-key', $client3->getCredentials()->getAccessKeyId());
        $this->assertEquals('server-secret', $client3->getCredentials()->getSecretKey());

        // Ensure that environment credentials are picked up if supplied via AWS_SECRET_ACCESS_KEY
        $_SERVER[Credentials::ENV_KEY] = 'server-key';
        // Remove the old key name
        unset($_SERVER[Credentials::ENV_SECRET]);
        putenv(Credentials::ENV_SECRET);
        $_SERVER[Credentials::ENV_SECRET_ACCESS_KEY] = 'server-secret';
        $client4 = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertEquals('server-key', $client4->getCredentials()->getAccessKeyId());
        $this->assertEquals('server-secret', $client4->getCredentials()->getSecretKey());
        unset($_SERVER[Credentials::ENV_KEY], $_SERVER[Credentials::ENV_SECRET]);
        putenv(Credentials::ENV_SECRET_ACCESS_KEY);

        // Ensure that environment credentials are picked up if supplied via putenv
        putenv(Credentials::ENV_KEY . '=env-key');
        putenv(Credentials::ENV_SECRET . '=env-secret');
        $client5 = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertEquals('env-key', $client5->getCredentials()->getAccessKeyId());
        $this->assertEquals('env-secret', $client5->getCredentials()->getSecretKey());
        putenv(Credentials::ENV_KEY); putenv(Credentials::ENV_SECRET);
    }

    public function testAddsCredentialsFromArray()
    {
        $config = array(
            'service' => 'dynamodb',
            'region'  => 'us-east-1',
            'credentials' => array(
                'key'    => 'foo',
                'secret' => 'bar'
            ),
            'service.description' => array(
                'signatureVersion' => 'v2',
                'regions' => array('us-east-1' => array('https' => true, 'hostname' => 'foo.com'))
            )
        );
        $client = ClientBuilder::factory('Aws\\DynamoDb')
            ->setConfig($config)
            ->build();
        $creds = $client->getCredentials();
        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
    }

    public function testAddsDefaultBackoffPluginIfNeeded()
    {
        $config = array(
            'service' => 'dynamodb',
            'region'  => 'us-east-1',
            'service.description' => array(
                'signatureVersion' => 'v2',
                'regions' => array('us-east-1' => array('https' => true, 'hostname' => 'foo.com'))
            )
        );

        // Ensure that a default plugin is set
        $client = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertInstanceOf('Guzzle\Plugin\Backoff\BackoffPlugin', $client->getConfig(Options::BACKOFF));
        // Ensure that the plugin is set
        $this->assertTrue($this->hasSubscriber($client, $client->getConfig(Options::BACKOFF)));

        // Ensure that a specific plugin can be used
        $plugin = BackoffPlugin::getExponentialBackoff();
        $config[Options::BACKOFF] = $plugin;
        $client = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertSame($plugin, $client->getConfig(Options::BACKOFF));
        // Ensure that the plugin is set
        $this->assertTrue($this->hasSubscriber($client, $plugin));
    }

    public function testUsesBackoffLoggerWithDebug()
    {
        $config = array(
            'service' => 'dynamodb',
            'region'  => 'us-east-1',
            'service.description' => array(
                'signatureVersion' => 'v2',
                'regions' => array('us-east-1' => array('https' => true, 'hostname' => 'foo.com'))
            ),
            Options::BACKOFF_LOGGER => 'debug',
            Options::BACKOFF_LOGGER_TEMPLATE => '[{ts}] {url}'
        );
        $client = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $plugin = $client->getConfig(Options::BACKOFF);
        $this->assertInstanceOf('Guzzle\Plugin\Backoff\BackoffPlugin', $plugin);
        $subscribers = $plugin->getEventDispatcher()->getListeners('plugins.backoff.retry');
        $this->assertInstanceOf('Guzzle\Plugin\Backoff\BackoffLogger', $subscribers[0][0]);
        $logger = $subscribers[0][0];
        $formatter = $this->readAttribute($logger, 'formatter');
        $this->assertEquals('[{ts}] {url}', $this->readAttribute($formatter, 'template'));
    }

    public function testAllowsValidationToBeDisabled()
    {
        $config = array(
            'service' => 'dynamodb',
            'region'  => 'us-east-1',
            'service.description' => array(
                'signatureVersion' => 'v2',
                'regions' => array('us-east-1' => array('https' => true, 'hostname' => 'foo.com'))
            ),
            'validation' => false
        );

        $client = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $params = $client->getConfig('command.params');
        $this->assertTrue($params['command.disable_validation']);
    }

    public function testAllowsBackoffDisabling()
    {
        $config = array(
            'service' => 'dynamodb',
            'region'  => 'us-east-1',
            'service.description' => array(
                'signatureVersion' => 'v2',
                'regions' => array('us-east-1' => array('https' => true, 'hostname' => 'foo.com'))
            ),
            'client.backoff' => false
        );

        $client = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertFalse($client->getConfig('client.backoff'));
    }

    public function testDefaultBackoffMaxRetries()
    {
        $config = array(
            'service' => 'dynamodb',
            'region'  => 'us-east-1',
            'service.description' => array(
                'signatureVersion' => 'v2',
                'regions' => array('us-east-1' => array('https' => true, 'hostname' => 'foo.com'))
            ),
        );

        $client = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertNull($client->getConfig(Options::BACKOFF_RETRIES));
        $plugin = $client->getConfig(Options::BACKOFF);
        $this->assertInstanceOf('Guzzle\Plugin\Backoff\BackoffPlugin', $plugin);
        $strategy = $this->readAttribute($plugin, 'strategy');
        $this->assertInstanceOf('Guzzle\Plugin\Backoff\TruncatedBackoffStrategy', $strategy);
        $retries = $this->readAttribute($strategy, 'max');
        $this->assertEquals(3, $retries);
    }

    public function testAllowsBackoffMaxRetries()
    {
        $config = array(
            'service' => 'dynamodb',
            'region'  => 'us-east-1',
            'service.description' => array(
                'signatureVersion' => 'v2',
                'regions' => array('us-east-1' => array('https' => true, 'hostname' => 'foo.com'))
            ),
            'client.backoff.retries' => 6
        );

        $client = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertEquals(6, $client->getConfig(Options::BACKOFF_RETRIES));
        $plugin = $client->getConfig(Options::BACKOFF);
        $this->assertInstanceOf('Guzzle\Plugin\Backoff\BackoffPlugin', $plugin);
        $strategy = $this->readAttribute($plugin, 'strategy');
        $this->assertInstanceOf('Guzzle\Plugin\Backoff\TruncatedBackoffStrategy', $strategy);
        $retries = $this->readAttribute($strategy, 'max');
        $this->assertEquals(6, $retries);
    }

    public function testInjectsVersionIntoServiceDescriptionFileName()
    {
        $config = array(
            'service' => 'dynamodb',
            'region'  => 'us-east-1',
            'version' => DynamoDbClient::LATEST_API_VERSION,
            'service.description' => __DIR__ . '/../../../../../src/Aws/DynamoDb/Resources/dynamodb-%s.php'
        );

        $client = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertNotNull($client->getDescription());
    }

    public function testCanCreateNullCredentials()
    {
        $client = ClientBuilder::factory()
            ->setConfig(array(
                'service' => 'foo',
                'region' => 'us-east-1',
                'credentials' => false,
                'service.description' => array(
                    'signatureVersion' => 'v4',
                    'regions' => array('us-east-1' => array('https' => true, 'hostname' => 'foo.com'))
                )
            ))
            ->build();
        $this->assertInstanceOf('Aws\\Common\\Signature\\SignatureV4', $client->getSignature());
        $this->assertInstanceOf('Aws\\Common\\Credentials\\NullCredentials', $client->getCredentials());
    }

    public function testCanUseCnNorth1AndIam()
    {
        $sdk = Aws::factory();
        $c = $sdk->get('iam', array('region' => 'cn-north-1'));
        $this->assertEquals('https://iam.cn-north-1.amazonaws.com.cn', $c->getBaseUrl());
    }

    public function testCanUseVersionOfLatestForForwardsCompatibility()
    {
        $config = array(
            'service' => 'dynamodb',
            'region'  => 'us-east-1',
            'version' => 'latest',
            'service.description' => __DIR__ . '/../../../../../src/Aws/DynamoDb/Resources/dynamodb-%s.php'
        );

        $client = ClientBuilder::factory('Aws\\DynamoDb')->setConfig($config)->build();
        $this->assertEquals($client->getApiVersion(), DynamoDbClient::LATEST_API_VERSION);
    }

    /**
     * @expectedException \Guzzle\Common\Exception\RuntimeException
     * @expectedExceptionMessage Invalid option passed to ssl.certificate_authority
     */
    public function testHandlesHttpSslOption()
    {
        ClientBuilder::factory()
            ->setConfig(array(
                'service' => 'foo',
                'region' => 'us-east-1',
                'credentials' => false,
                'service.description' => array('signatureVersion' => 'v4'),
                'http' => array('verify' => '/does/not/exist/here')
            ))
            ->build();
    }
}
