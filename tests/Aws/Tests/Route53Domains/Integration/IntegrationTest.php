<?php

namespace Aws\Tests\Route53Domains\Integration;

use Aws\Common\Exception\ServiceResponseException;
use Aws\Route53Domains\Route53DomainsClient;

/**
 * @group integration
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var Route53DomainsClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('route53domains');
    }

    public function testSimpleOperation()
    {
        $result = $this->client->checkDomainAvailability(array(
            'DomainName'  => 'amazon.com',
            'IdnLangCode' => 'eng',
        ));

        $this->assertEquals('UNAVAILABLE', $result['Availability']);
    }

    public function testErrorHandling()
    {
        try {
            $this->client->checkDomainAvailability(array(
                'DomainName'  => 'amazon.com',
                'IdnLangCode' => 'zzz',
            ));
            $this->fail('An exception should have been thrown.');
        } catch (ServiceResponseException $e) {
            $this->assertInstanceOf('Aws\Route53Domains\Exception\Route53DomainsException', $e);
            $this->assertEquals('InvalidInput', $e->getExceptionCode());
        }
    }
}
