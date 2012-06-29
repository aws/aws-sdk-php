<?php

namespace Aws\Tests\Common\Client;

use Aws\Common\Signature\SignatureV4;
use Aws\Common\Client\SignatureOptionResolver;
use Guzzle\Common\Collection;

/**
 * @covers Aws\Common\Client\SignatureOptionResolver
 */
class SignatureOptionResolverTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException Aws\Common\Exception\InvalidArgumentException
     * @expectedExceptionMessage An explicitly provided "signature" option must implement SignatureInterface
     */
    public function testEnsuresProvidedSignatureIsValid()
    {
        $resolver = new SignatureOptionResolver();
        $resolver->resolve(new Collection(array(
            'signature' => new \stdClass()
        )));
    }

    public function testCreatesDefaultSignatureForConfig()
    {
        $config = new Collection();
        $resolver = new SignatureOptionResolver(function($config) {
            return new SignatureV4();
        });
        $resolver->resolve($config);
        $this->assertInstanceOf('Aws\Common\Signature\SignatureV4', $config->get('signature'));
    }

    public function testAppliesServiceAndRegionNameWhenUsingEndpointSignatures()
    {
        $config = new Collection(array(
            'service.name' => 'foo',
            'region.name'  => 'bar'
        ));
        $resolver = new SignatureOptionResolver(function($config) {
            return new SignatureV4();
        });

        $resolver->resolve($config);
        $this->assertEquals('foo', $this->readAttribute($config->get('signature'), 'serviceName'));
        $this->assertEquals('bar', $this->readAttribute($config->get('signature'), 'regionName'));
    }
}
