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
     * @expectedExceptionMessage An explicitly provided signature option must implement SignatureInterface
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
            'signature.service' => 'foo',
            'signature.region'  => 'bar'
        ));
        $resolver = new SignatureOptionResolver(function($config) {
            return new SignatureV4();
        });

        $resolver->resolve($config);
        $this->assertEquals('foo', $this->readAttribute($config->get('signature'), 'serviceName'));
        $this->assertEquals('bar', $this->readAttribute($config->get('signature'), 'regionName'));
    }
}
