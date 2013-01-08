<?php

namespace Aws\Tests\Common\Integration;

use Guzzle\Http\Client;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Signature\SignatureV2;

/**
 * @group integration
 */
class SignatureV2IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    protected function getClasses()
    {
        $client = new Client();
        $signature = new SignatureV2();
        $data = json_decode($this->getServiceBuilder()->serialize(), true);
        $default = $data['default_settings']['params'];
        $credentials = new Credentials($default['key'], $default['secret']);

        return array($client, $signature, $credentials);
    }

    public function testSignsGet2Requests()
    {
        list($client, $signature, $credentials) = $this->getClasses();
        $request = $client->get('https://sdb.amazonaws.com/?Action=ListDomains&Version=2009-04-15');
        $signature->signRequest($request, $credentials);
        $request->send();
        $this->assertNotNull($request->getQuery()->get('Signature'));
        $this->assertNotNull($request->getQuery()->get('Timestamp'));
        $this->assertInstanceOf('SimpleXMLElement', $request->getResponse()->xml());
    }

    public function testSignsPostRequests()
    {
        list($client, $signature, $credentials) = $this->getClasses();
        $request = $client->post('https://sdb.amazonaws.com');
        $request->addPostFields(array(
            'Action'  => 'ListDomains',
            'Version' => '2009-04-15'
        ));
        $signature->signRequest($request, $credentials);
        $request->send();
        $this->assertNotNull($request->getPostField('Signature'));
        $this->assertNotNull($request->getPostField('Timestamp'));
        $this->assertInstanceOf('SimpleXMLElement', $request->getResponse()->xml());
    }
}
