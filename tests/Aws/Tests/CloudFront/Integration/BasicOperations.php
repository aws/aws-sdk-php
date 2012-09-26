<?php

namespace Aws\Tests\CloudFront\Integration;

use Aws\CloudFront\CloudFrontClient;

/**
 * @group integration
 */
class BasicOperationsTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var CloudFrontClient
     */
    public $client;
    protected static $originId;

    public function setUp()
    {
        $this->client = self::getServiceBuilder()->get('cloudfront');
    }

    public function testCreatesOrigins()
    {
        $command = $this->client->createCloudFrontOriginAccessIdentity(array(
            'CallerReference' => 'foo',
            'Comment' => 'Hello!'
        ));
        $result = $command->getResult();
        $this->assertArrayHasKey('Id', $result);
        self::$originId = $result['Id'];
        $this->assertArrayHasKey('S3CanonicalUserId', $result);
        $this->assertArrayHasKey('CloudFrontOriginAccessIdentityConfig', $result);
        $this->assertEquals(array(
            'CallerReference' => 'foo',
            'Comment' => 'Hello!'
        ), $result['CloudFrontOriginAccessIdentityConfig']);
        $this->assertArrayHasKey('Location', $result);
        $this->assertArrayHasKey('ETag', $result);
        $this->assertEquals($result['Location'], (string) $command->getResponse()->getHeader('Location'));
        $this->assertEquals($result['ETag'], (string) $command->getResponse()->getHeader('ETag'));
    }

    /**
     * @depends testCreatesOrigins
     */
    public function testCreatesDistribution()
    {
        if (!self::$originId) {
            $this->fail('No originId was set');
        }

        self::log("Creating a distribution");

        $this->client->addSubscriber(
            new \Guzzle\Plugin\Log\LogPlugin(
                new \Guzzle\Log\ClosureLogAdapter(function ($m) { echo $m; }),
                '{request}{response}'
            )
        );

        $result = $this->client->createDistribution(array(
            'Aliases' => array('Quantity' => 0),
            'CacheBehaviors' => array('Quantity' => 0),
            'Comment' => 'Testing... 123',
            'Enabled' => true,
            'CallerReference' => 'BazBar',
            'DefaultCacheBehavior' => array(
                'MinTTL' => 10,
                'ViewerProtocolPolicy' => 'allow-all',
                'TargetOriginId' => self::$originId,
                'TrustedSigners' => array(
                    'Enabled' => false,
                    'Quantity' => 0
                ),
                'ForwardedValues' => array(
                    'QueryString' => false
                )
            ),
            'DefaultRootObject' => 'index.html',
            'Logging' => array(
                'Enabled' => false,
                'Bucket' => '',
                'Prefix' => ''
            ),
            'Origins' => array(
                'Quantity' => 1,
                'Items' => array(
                    array(
                        'Id' => self::$originId,
                        'DomainName' => 'foo.example.com',
                        'CustomOriginConfig' => array(
                            'HTTPPort' => 80,
                            'HTTPSPort' => 443,
                            'OriginProtocolPolicy' => 'http-only'
                        )
                    )
                )
            )
        ))->execute();

        $this->assertArrayHasKey('Id', $result);
        $this->assertArrayHasKey('Status', $result);
        $this->assertArrayHasKey('Location', $result);
        $this->assertArrayHasKey('ETag', $result);
        $this->assertEquals(1, $result['DistributionConfig']['Origins']['Quantity']);
        $this->assertArrayHasKey(0, $result['DistributionConfig']['Origins']['Items']);
        $this->assertEquals('foo.example.com', $result['DistributionConfig']['Origins']['Items'][0]['DomainName']);
        $id = $result['Id'];

        $result = $this->client->listDistributions()->execute();
        $this->assertGreaterThan(0, $result['Quantity']);
        $found = false;
        foreach ($result['Items'] as $item) {
            if ($item['Id'] == $id) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found);
    }
}
